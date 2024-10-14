<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendCoupon extends Mailable
{
    use Queueable, SerializesModels;

    public $couponCode;

    public function __construct($couponCode)
    {
        $this->couponCode = $couponCode;
    }

    public function build()
    {
        return $this->subject('Mã Giảm Giá Mới')
                    ->view('email.coupon'); // Đảm bảo view tồn tại
    }
}
