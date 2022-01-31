<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract class Filter
{
    /**
     * Applicable conditions to filter entity.
     */
    protected array $applicableConditions = [];

    /**
     * The name of the filter's corresponding model.
     */
    protected string $model;
    protected Builder $query;
    protected array $conditions;

    public function __construct(array $conditions = [])
    {
        $this->query = $this->newModel()->newQuery();
        $this->conditions($conditions);
    }

    private function newModel(): Model
    {
        $modelClass = $this->model;
        return new $modelClass();
    }

    public function apply(): Builder
    {
        $this->select()->joins()->where();
        return $this->query;
    }

    public function conditions(array $conditions = []): self
    {
        $this->conditions = array_filter($conditions);
        return $this;
    }

    protected function where(): self
    {
        $applicableConditionsArray = array_intersect_key($this->conditions, $this->applicableConditions);
        foreach ($applicableConditionsArray as $condition => $value) {
            $conditionClass = $this->getCondition($condition);
            $conditionClass::append($this->query, new Criteria($value));
        }
        return $this;
    }

    private function getCondition(string $condition): Condition
    {
        $conditionClassName = $this->applicableConditions[$condition];
        return new $conditionClassName();
    }

    protected function joins(): self
    {
        return $this;
    }

    protected function select(): self
    {
        return $this;
    }
}
