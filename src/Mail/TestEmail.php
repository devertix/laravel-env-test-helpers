<?php

namespace Devertix\EnvTestHelpers\Mail;

use Carbon\Carbon;
use Illuminate\Mail\Mailable;

class TestEmail extends Mailable
{
    public $time;

    /**
     * Create a new message instance.
     *
     * @param $email
     * @param $name
     */
    public function __construct($email, $name)
    {
        $this->to[] = ['address' => $email, 'name' => $name,];
        $this->time = Carbon::now();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('env-test-helpers::emails.test_email')
            ->subject('Email test')
            ->from(config('mail.from.address'), config('mail.from.name'));
    }
}
