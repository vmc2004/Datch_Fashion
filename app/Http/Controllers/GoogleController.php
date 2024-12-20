<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
       try {
        $user = Socialite::driver('google')->user();
        $findUser = User::where('email', $user->getEmail())->first();
        if($findUser){
            Auth::login($findUser);
        }else{
            $userNew = User::create([
                'fullname' => $user->getName(),
                'email' => $user->getEmail(),
                'password' => bcrypt(Str::random(16)), // Mật khẩu ngẫu nhiên
                'google_id' => $user->getId(),
                'role' => 'admin',
            ]);
            Auth::login($userNew);
        }
        return redirect()->route('admin.index');
       } catch (\Throwable $th) {
        return redirect()->route('google.login')->with('error', 'Đăng nhập google thất bại');
       }

    }
}
