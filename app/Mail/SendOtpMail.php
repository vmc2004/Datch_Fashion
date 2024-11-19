<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendOtpMail extends Mailable
{
    use Queueable, SerializesModels;

    public $otp;
    public $fullname; // Thêm biến fullname

    public function __construct($otp, $fullname) // Cập nhật constructor
    {
        $this->otp = $otp;
        $this->fullname = $fullname; // Gán biến fullname
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'Your OTP Code',
        );
    }

    public function content()
    {
        return new Content(
            view: 'emails.otp',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
