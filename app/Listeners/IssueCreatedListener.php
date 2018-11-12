<?php

namespace App\Listeners;

use App\Events\IssueCreatedEvent;
use App\Notifications\IssueCreatedNotification;
use App\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class IssueCreatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  IssueCreatedEvent  $event
     * @return void
     */
    public function handle(IssueCreatedEvent $event)
    {
        $issue = $event->issue;
        $user = User::find($issue->owner_user_id);
        $users = User::where('id', '!=', $user->id)->where('team_id', '=', $user->team->id)->get();
        Notification::send($users, new IssueCreatedNotification($issue));
    }
}
