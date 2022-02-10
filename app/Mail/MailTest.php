<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailTest extends Mailable
{
    use Queueable, SerializesModels;

    public $mail_text;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->mail_text = "aaaa";
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('from_address@example.com')
                    ->view('test')
                    ->subject('メールテストタイトル');
    }
}
