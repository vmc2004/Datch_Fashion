<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\SendOtpMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ]);

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            // Check user's role and return appropriate response
            if (Auth::user()->role == 'admin') {
                return response()->json([
                    'message' => 'Đăng nhập thành công',
                    'message_type' => 'success',
                    'user' => Auth::user()
                ], 200);
            } else {
                Auth::logout();
                return response()->json([
                    'message' => 'Bạn không có quyền truy cập vào trang admin',
                    'message_type' => 'error'
                ], 403);
            }
        } else {
            return response()->json([
                'message' => 'Email hoặc password không đúng',
                'message_type' => 'error'
            ], 401);
        }
    }

    // POST: /logout
    public function logout()
    {
        Auth::logout();
        return response()->json([
            'message' => 'Đăng xuất thành công',
            'message_type' => 'success'
        ], 200);
    }

    // POST: /register
    public function postRegister(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $otp = rand(100000, 999999); // Generate OTP

        $data = [
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        session(['otp' => $otp]);

        $newUser = User::create($data);
        Mail::to($newUser->email)->send(new SendOtpMail($otp, $request->fullname));

        return response()->json([
            'message' => 'Đăng ký thành công. Vui lòng kiểm tra email để nhận mã OTP.',
            'message_type' => 'success',
            'user' => $newUser
        ], 201);
    }
}
