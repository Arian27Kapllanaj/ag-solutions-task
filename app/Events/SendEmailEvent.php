<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendEmailEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $email;
    public $text;
    public $datetime;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($email, $text, $datetime)
    {
        $this->email = $email;
        $this->text = $text;
        $this->datetime = $datetime;
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
