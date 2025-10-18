<?php

namespace App\Mail;

use App\Models\Event;
use App\Models\Guest;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $guest;
    public $event;
    public $view;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Guest $guest, Event $event, string $view)
    {
        $this->guest = $guest;
        $this->event = $event;
        $this->view = $view;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->view == 'dashboard.emails.welcome') {
            $subject = 'Welcome To '.$this->event->title;
        } elseif ($this->view == 'dashboard.emails.confirm') {
            $subject = $this->event->title." Confirmation";
        }

        return $this
            ->to($this->guest->email)
            ->subject($subject)
            ->view($this->view);
    }
}
