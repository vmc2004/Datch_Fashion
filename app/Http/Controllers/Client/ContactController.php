<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contact(){
        return view('Client.contact');
    }

    public function updateContact(Request $request){
        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'required|string|max:255',
           'phone' => 'required|regex:/^[0-9]{10,11}$/',
            'content' => 'required|string',
        ]);
        

        // Lưu thông tin liên hệ vào bảng 'contacts'
        Contact::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'content' => $request->content,
        ]);

        // Gửi email thông báo 
        Mail::raw("Cảm ơn bạn đã liên hệ với chúng tôi!", function ($message) use ($request) {
            $message->to($request->email)
                ->subject('Xác nhận liên hệ từ Datch Fashion');
        });

        // Chuyển hướng kèm thông báo
        return redirect()->back()->with('success', 'Cảm ơn bạn đã liên hệ. Chúng tôi sẽ phản hồi sớm nhất có thể.');

    }
}
