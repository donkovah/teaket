<?php

namespace Donkovah\Teaket\Listeners;

use App\Events\TeaketCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Donkovah\Teaket\Events\TeaketCreatedEvent;
use Donkovah\Teaket\Notifications\NewTeaketNotification;
use Illuminate\Support\Facades\Notification;

class SendNewTeaketNotification
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
     * @param  TeaketCreated  $event
     * @return void
     */
    public function handle(TeaketCreatedEvent $event)
    {
        $users = $event->teaket->users->merge(collect([$event->teaket->user]));
        Notification::send($users, new NewTeaketNotification($event->teaket));
    }
}
