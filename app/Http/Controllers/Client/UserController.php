<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function homeClient()
    {
        // Lấy danh sách danh mục từ cơ sở dữ liệu
        $brands = Brand::query()->limit(5)->get();
        $category = Category::query()->limit(5)->get();
        $newPro = Product::query()->latest('id')->limit(5)->get();
        $Proview = Product::query()->orderBy('views', 'desc')->limit(5)->get();
        return view('Client.home', compact('category', 'newPro','brands', 'Proview'));
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



public function profile()
{
   
    $user = Auth::user();

   
    return view('Client.account.profile', compact('user'));
}

public function updateProfile(Request $request,  User $user)
{
    $request->validate([
        'fullname' => 'required|string|max:255',
        'gender' => 'required|string',
        'birthday' => 'required|date',
        'language' => 'required|string',
        'address' => 'nullable|string|max:255',
        'introduction' => 'nullable|string',
    ]);

    $user = auth()->user();
    $user->fullname = $request->input('fullname');
    $user->gender = $request->input('gender');
    $user->birthday = $request->input('birthday');
    $user->language = $request->input('language');
    $user->address = $request->input('address');
    $user->introduction = $request->input('introduction');
    // Cập nhật avatar nếu có
    $data = $request->except('avatar');
    if ($request->hasFile('avatar')) {
        $oldAvatar = $user->avatar;
        if ($oldAvatar && Storage::exists($oldAvatar)) {
            Storage::delete($oldAvatar);
        }
        $user['avatar'] = Storage::put('uploads/users',$request->file('avatar'));
    }
    $user->save();

    return response()->json([
        'success' => true,
        'user' => [
            'fullname' => $user->fullname,
            'gender' => $user->gender,
            'birthday' => $user->birthday,
            'language' => $user->language,
            'address' => $user->address,
            'introduction' => $user->introduction,
           'avatar_url' => $user->avatar ? asset('storage/' . $user->avatar) . '?' . time() : null,  // Đường dẫn ảnh mới
        ]
    ]);
}



public function logout() {
    Auth::logout();
    return redirect()->route('Client.home')->with(['message' => 'Đăng xuất thành công', 'message_type' => 'success']);
}
}
