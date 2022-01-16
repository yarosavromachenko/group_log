<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FeedbackMail extends Mailable
{
    use Queueable, SerializesModels;

    public $student;
    public $items;

    /**
     * Create a new message instance.
     * @param $student
     * @param $items
     * @return void
     */
    public function __construct($student, $items)
    {
        $this->student = $student;
        $this->items = $items;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('group.email');
    }
}
