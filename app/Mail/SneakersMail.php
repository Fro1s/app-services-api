<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SneakersMail extends Mailable
{
    use Queueable, SerializesModels;

    public $userId;
    public $subject;

    /**
     * Create a new message instance.
     *
     * @param int $userId
     * @param string $subject
    */
    public function __construct($userId, $subject)
    {
        $this->userId = $userId;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
    */
    public function build(){
        $user = User::find($this->userId);

        return $this->view('SneakersMail.SneakersMailView')->with('user', $user);
    }
}
