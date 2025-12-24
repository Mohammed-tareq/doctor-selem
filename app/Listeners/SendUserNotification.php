<?php

namespace App\Listeners;

use App\Events\NewAddEvent;
use App\Models\Subscribe;
use App\Notifications\NewDataCreatedNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendUserNotification implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Handle the event.
     */
    public function handle(NewAddEvent $event): void
    {
        $users = Subscribe::all();
        if ($users->isEmpty()) return;

        foreach ($users as $user) {
            $user->notify(new NewDataCreatedNotification($event->data));
        }
    }
}
