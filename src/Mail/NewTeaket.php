<?php

namespace Donkovah\Teaket\Mail;

use Donkovah\Teaket\Model\Teaket;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewTeaket extends Mailable
{
    use Queueable, SerializesModels;

    public $teaket;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Teaket $teaket)
    {
        $this->teaket = $teaket;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('teaket::emails.new')->with(['teaket' => $this->teaket]);
    }

}
