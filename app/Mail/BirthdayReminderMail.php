<?php

namespace App\Mail;

use App\Models\Nasabah;
use Illuminate\Mail\Mailable;

class BirthdayReminderMail extends Mailable
{
    public $receiver;
    public $customer;


    public function __construct($receiver, Nasabah $customer)
    {
        $this->receiver = $receiver;
        $this->customer = $customer;
    }


public function build()
{
    return $this->subject('Reminder Ulang Tahun Nasabah')
        ->view('emails.birthday_reminder');
}
}