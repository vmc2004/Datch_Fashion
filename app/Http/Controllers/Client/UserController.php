<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function homeClient()
    {
        // Lấy danh sách danh mục từ cơ sở dữ liệu
        $category = Category::query()->limit(5)->get();
        $newPro = Product::query()->latest('id')->limit(5)->get();
        $Proview = Product::query()->Orderby('views')->limit(5)->get();
        return view('Client.home', compact('category', 'newPro', 'Proview'));
    }
    public function login() {
        return view('Client.account.login');
       }

    public function register(){
        return view('Client.account.register');
       }
    
    public function showLoginForm(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();

    
    if ($user && password_verify($request->password, $user->password)) {
      
        Auth::login($user);

       
        return redirect()->route('Client.home')->with(['message' => 'Đăng nhập thành công',
        'message_type' => 'success']); 
    }

  
    return back()->withErrors([
        'email' => 'Thông tin đăng nhập không khớp với hồ sơ của chúng tôi.',
    ]);
}

public function showRegisterForm(Request $request)
{
    
    $validator = Validator::make($request->all(), [
        'fullname' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed', 
    ]);

    if ($validator->fails()) {
        return redirect()->back()
                         ->withErrors($validator)
                         ->withInput();
    }

   
    User::create([
        'fullname' => $request->fullname,
        'email' => $request->email,
        'password' => Hash::make($request->password), 
    ]);

    return redirect()->route('Client.account.login')->with(['message' => 'Đăng ký thành công. Bạn có thể đăng nhập ngay bây giờ.', 'message_type' => 'success']);
}
}
