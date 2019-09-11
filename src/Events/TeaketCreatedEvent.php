<?php

namespace Donkovah\Teaket\Events;

use Donkovah\Teaket\Model\Teaket;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TeaketCreatedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $teaket;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Teaket $teaket)
    {
        $this->teaket = $teaket;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
