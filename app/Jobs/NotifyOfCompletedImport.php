<?php

namespace App\Jobs;

use App\Models\User;
use App\Notifications\ImportCompletedNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class NotifyOfCompletedImport implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(
        public User $user,
        public string $title,
    ) {
    }

    public function handle(): void
    {
        $this->user->notify(new ImportCompletedNotification($this->user, $this->title));
        Log::log('info', 'An import has been generated by the user: Name=' . $this->user->name . ' id=' . $this->user->id);
    }
}
