<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //i1iwo@naver.com
        $address = 'sosaeodn@naver.com';
        $subject = $this->data['subject'];
        $name = $this->data['name'];

        return $this->view('emails.test')
            ->from($address, $name)
            ->subject($subject)
            ->with($this->data);
    }
}
