<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderPlaced extends Notification
{
    use Queueable;

    protected $notificationData;

    public function __construct($notificationData)
    {
        $this->notificationData = $notificationData;
    }

    public function via($notifiable)
    {
        return ['database'];  // Sử dụng database để lưu thông báo
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => $this->notificationData['message'],
            'order_code' => $this->notificationData['order_code'],
            'order_status' => $this->notificationData['order_status'],
            'details_url' => $this->notificationData['details_url'],
            'product_name' => $this->notificationData['product_name'],
        ];
    }
}
