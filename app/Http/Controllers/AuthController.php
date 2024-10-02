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
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function register(){
        return view('auth/register');
    }

    public function registerSave(Request $request){
        Validator::make($request->all(), [
            'fullname' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
            
        ])->validate();

        User::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => "0"

        ]);
        return redirect()->route('login');
    }
    public function login(){
        return view('auth/login');
    }

    public function loginAction(Request $request){
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();

        if (!Auth::attempt($request->only('email', 'password'))){
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')

            ]);
    }
    $request->session()->regenerate();
 
    if (auth()->user()->role == 'admin') {
        return redirect()->route('admin/home');
    } else {
        return redirect()->route('home');
    }
     
    return redirect()->route('admin/home');
}

    public function logout(Request $request){
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        return redirect('/login');
    }
}
