<?php

namespace App\Factories\Reports;

use App\Factories\Reports\Contracts\ReportContract;

class ReportFactory
{
    public static function make(string $report, string $filename, array $filters): ReportContract
    {
        return new $report($filename, $filters);
    }
}
