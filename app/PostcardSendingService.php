<?php

namespace App;

use Illuminate\Support\Facades\Mail;

class PostcardSendingService
{
    private $length;
    private $width;
    private $address;

    public function __construct(int $length, int $width, string $address)
    {
        $this->length = $length;
        $this->width = $width;
        $this->address = $address;
    }

    public function sendPostcard($message, $email)
    {
        Mail::raw($message, function ($message) use ($email) {
            $message->to($email);
        });
        dump('Postcard Sent with message: ' . $message);
    }
}
