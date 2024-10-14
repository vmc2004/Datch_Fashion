<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
   public function login() {
    return view('login');
   }

   public function postLogin(Request $request) {
    $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);
    
    if(Auth::attempt([
        'email' => $request->email,
        'password' => $request->password

    ])){
        
        if(Auth::user()->role == 'admin'&& Auth::user()->status == 1){
            return redirect()->route('admin.index')->with(['message' => 'Đăng nhập thành công']);
        }elseif (Auth::user()->role == 'member'&& Auth::user()->status == 1) {
            return redirect()->route('home')->with(['message' => 'Đăng nhập thành công']);
        }else{
            return redirect()->back()->with(['message' => 'Email hoặc password không đúng']);
        } 
    }

   }

   public function logout() {
        Auth::logout();
        return redirect()->route('login')->with(['message' => 'Đăng xuất thành công']);
   }

   public function register(){
    return view('register');
   }

   public function postRegister(Request $request){
    $check = User::where('email', $request->email)->exists();
    if($check){
        return redirect()->back()->with([
            'message' => 'Tài khoản email đã tồn tại'
        ]);
    }else{
        $data = [
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' =>Hash::make($request->password)
        ];
        $newUser = User::create($data);
        return redirect()->route('login')->with([
            'message' => 'Đăng kí thành công. Vui lòng đăng nhập'
        ]);
    }


   }
}
