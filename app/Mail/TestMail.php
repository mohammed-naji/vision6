<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    // public $name, $email, $image;
    public $name;
    public $age;
    public $image;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $age, $image)
    {
        $this->name = $name;
        $this->age = $age;
        $this->image = $image;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New Data')->view('emails.test_mail')->attach(public_path('uploads/images/').$this->image);
    }
}
