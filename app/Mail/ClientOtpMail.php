<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ClientOtpMail extends Mailable
{
    use Queueable, SerializesModels;

    public $otp;
    public $fullname;

    public function __construct($otp, $fullname)
    {
        $this->otp = $otp;
        $this->fullname = $fullname;
    }

    public function envelope()
    {
        return new Envelope(
            subject: 'Client OTP Code',
        );
    }

    public function content()
    {
        return new Content(
            view: 'Client.email.otp', // View cho Client
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
?>