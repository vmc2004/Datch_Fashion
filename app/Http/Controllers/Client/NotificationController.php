<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }


    public function getNotifications()
    {
        // Đánh dấu tất cả thông báo chưa đọc là đã đọc
        auth()->user()->unreadNotifications->markAsRead();

        // Lấy tất cả thông báo của người dùng
        $notifications = auth()->user()->notifications()->orderBy('created_at', 'desc')->get();

        // Lấy số lượng thông báo chưa đọc
        $unreadNotificationsCount = auth()->user()->unreadNotifications->count();

        // Truyền thông báo và số lượng chưa đọc vào view
        return view('Client.notifications.index', compact('notifications', 'unreadNotificationsCount'));
    }



}
