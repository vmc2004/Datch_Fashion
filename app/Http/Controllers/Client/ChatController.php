<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    //
    public function index()
    {
        $users = User::where('id', '!=', auth()->id())->get();
        return view('client.chat.index', compact('users'));
    }

    public function fetchMessages($receiverId)
    {
        $messages = Chat::where(function($query) use ($receiverId) {
            $query->where('sender_id', auth()->id())
                  ->where('receiver_id', $receiverId);
        })->orWhere(function($query) use ($receiverId) {
            $query->where('sender_id', $receiverId)
                  ->where('receiver_id', auth()->id());
        })->orderBy('created_at', 'asc')->get();

        return response()->json($messages);
    }

    public function sendMessage(Request $request)
{
    // Kiểm tra dữ liệu gửi đến
    $validated = $request->validate([
        'receiver_id' => 'required|integer',
        'message' => 'required|string',
    ]);

    // Lưu tin nhắn vào cơ sở dữ liệu (giả sử bạn có một mô hình Message)
    $message = new Chat();
    $message->sender_id = auth()->id(); // ID người gửi
    $message->receiver_id = $validated['receiver_id']; // ID người nhận
    $message->message = $validated['message'];
    $message->save();

    // Trả về dữ liệu (có thể trả về tin nhắn vừa gửi để hiển thị)
    return response()->json(['message' => $validated['message']]);
}


    public function getUnreadCount()
{
    $unreadCount = Chat::where('receiver_id', auth()->id())
                       ->where('is_read', false)
                       ->count();

    return response()->json(['unread_count' => $unreadCount]);
}

}
