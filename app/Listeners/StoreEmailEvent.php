<?php

namespace App\Listeners;

use App\Events\SendEmailEvent;
use App\Models\EmailEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StoreEmailEvent
{
    public EmailEvent $emailEvent;

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
     * @param  \App\Events\SendEmailEvent  $event
     * @return void
     */
    public function handle(SendEmailEvent $event)
    {
        $this->emailEvent = new EmailEvent();
        $this->emailEvent->email = $event->email;
        $this->emailEvent->text = $event->text;
        $this->emailEvent->datetime = $event->datetime;
        $result = $this->emailEvent->save();
        return $result;
    }
}