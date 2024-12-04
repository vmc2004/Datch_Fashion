<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostLoginRequest;
use App\Mail\SendOtpMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
   public function login() {
    return view('login');
   }

   public function postLogin(PostLoginRequest $request) {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ]);
    
    if(Auth::attempt([
        'email' => $request->email,
        'password' => $request->password

    ])){
        
        if(Auth::user()->role == 'admin'){
            return redirect()->route('admin.index')->with(['message' => 'Đăng nhập thành công',
            'message_type' => 'success']);

        }else{
            Auth::logout(); 
            return redirect()->back()->with([
                'message' => 'Bạn không có quyền truy cập vào trang admin',
                'message_type' => 'error'
            ]);

        }
        
    }else{
        return redirect()->back()->with(['message' => 'Email hoặc password không đúng', 'message_type' => 'error']);

    }

   }

   public function logout() {
        Auth::logout();
        return redirect()->route('login')->with(['message' => 'Đăng xuất thành công', 'message_type' => 'success']);
   }

   public function register(){
    return view('register');
   }

   public function postRegister(Request $request){
    

    $check = User::where('email', $request->email)->exists();
    if($check){
        return redirect()->back()->with([
            'message' => 'Tài khoản email đã tồn tại', 'message_type' => 'error' 
        ]);
    }else{
        $otp = rand(100000, 999999); 
        $data = [
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' =>Hash::make($request->password),
           
        ];
        session(['otp' => $otp]);

        $newUser = User::create($data);
        Mail::to($newUser->email)->send(new SendOtpMail($otp, $request->fullname));
        return redirect()->route('otp.confirm', ['email' => $newUser->email, 'otp' => $otp])
        ->with('message', 'Đăng kí thành công. Vui lòng kiểm tra email để nhận mã OTP.')
        ->with('message_type', 'success');

    }

   }

   // Hiển thị form yêu cầu reset password
   public function showForgotPasswordForm()
   {
       return view('forgot-password');
   }

   // Xử lý form yêu cầu reset password
   public function sendResetLinkEmail(Request $request)
   {
       $request->validate(['email' => 'required|email']);

       $status = Password::sendResetLink(
           $request->only('email')
       );

       return $status === Password::RESET_LINK_SENT
           ? back()->with('status', 'Chúng tôi đã gửi email liên kết đặt lại mật khẩu cho bạn.')
           : back()->withErrors(['email' => __($status)]);
   }

   // Hiển thị form nhập mật khẩu mới
   public function showResetPasswordForm($token)
   {
       return view('reset-password', ['token' => $token]);
   }

   // Xử lý form nhập mật khẩu mới
   public function resetPassword(Request $request)
   {
       $request->validate([
           'token' => 'required',
           'email' => 'required|email',
           'password' => 'required|min:8|confirmed',
       ]);

       $status = Password::reset(
           $request->only('email', 'password', 'password_confirmation', 'token'),
           function ($user, $password) {
               $user->forceFill([
                   'password' => Hash::make($password),
               ])->save();

               $user->setRememberToken(Str::random(60));
           }
       );

       return $status === Password::PASSWORD_RESET
           ? redirect()->route('login')->with('status', __($status))
           : back()->withErrors(['email' => [__($status)]]);
   }

   public function showOtpConfirmationForm(Request $request)
    {
        // Lấy email từ query string
        $email = $request->input('email');
        
        return view('otp.otp-confirmation', compact('email'));
    }

   public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'otp' => 'required|digits:6',
        ]);

        $sessionOtp = session('otp');

             if ($sessionOtp && $request->otp == $sessionOtp) {
                return redirect()->route('login')->with([
                    'message' => 'Xác nhận thành công! Bạn có thể đăng nhập.',
                    'message_type' => 'success'
                ]);
                } else {
                    return redirect()->back()->with([
                        'message' => 'Mã OTP không hợp lệ hoặc đã hết hạn.',
                        'message_type' => 'error'
                ]);
                }
}

}
