<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CallRequest extends Mailable
{
    use Queueable, SerializesModels;

    protected $number, $text;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($number, $text)
    {
        $this->number = $number;
        $this->text = $text;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.call')
                    ->subject('Новый запрос на звонок')
                    ->with([
                        'number' => $this->number,
                        'text' => $this->text,
                    ]);
    }
}
