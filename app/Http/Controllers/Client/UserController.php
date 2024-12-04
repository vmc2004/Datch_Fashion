<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShowLoginFormRequest;
use App\Mail\SendOtpMail;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Commune;
use App\Models\District;
use App\Models\Product;
use App\Models\Province;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function homeClient()
    {
        // Lấy danh sách danh mục từ cơ sở dữ liệu
        $banners = Banner::where('is_active', 1)->where('location', 1)->get();
        // $banners = Banner::query()->get();
        $brands = Brand::query()->limit(5)->get();
        $category = Category::query()->limit(5)->get();
        $newPro = Product::query()->latest('id')->limit(5)->get();
        $Proview = Product::query()->orderBy('views', 'desc')->limit(5)->get();
        return view('Client.home', compact('category', 'newPro','brands', 'Proview', 'banners'));
    }
    public function login() {
        return view('Client.account.login');
       }

    public function register(){
        return view('Client.account.register');
       }
    
       public function showLoginForm(ShowLoginFormRequest $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        if (Auth::user()->role === 'member') {
            return redirect()->route('Client.home')->with([
                'message' => 'Đăng nhập thành công',
                'message_type' => 'success',
            ]);
        } else {
            Auth::logout();
            return redirect()->back()->with([
                'message' => 'Bạn không có quyền truy cập vào trang này.',
                'message_type' => 'error',
            ]);
        }
    }

    return redirect()->back()->withErrors([
        'email' => 'Email hoặc mật khẩu không đúng.',
    ]);
}

       
public function showRegisterForm(Request $request)
{
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
        return redirect()->route('Client.otp.confirm', ['email' => $newUser->email, 'otp' => $otp])
        ->with('message', 'Đăng kí thành công. Vui lòng kiểm tra email để nhận mã OTP.')
        ->with('message_type', 'success');

    }
}


public function showForgotPasswordForm(){
    return view('Client.account.forgot-password');
}
public function sendResetLinkEmail(Request $request)
{
    // Xác thực email
    $request->validate(['email' => 'required|email']);

    // Gửi liên kết đặt lại mật khẩu
    $status = Password::sendResetLink(
        $request->only('email')
    );

    // Kiểm tra kết quả và trả về thông báo
    if ($status === Password::RESET_LINK_SENT) {
        return back()->with('status', 'Chúng tôi đã gửi email liên kết đặt lại mật khẩu cho bạn.');
    } else {
        $errorMessage = $status === Password::INVALID_USER 
            ? 'Chúng tôi không tìm thấy người dùng nào với địa chỉ email này.' 
            : 'Đã xảy ra lỗi. Vui lòng thử lại sau.';

        return back()->withErrors(['email' => $errorMessage]);
    }
}

public function showResetPasswordForm($token)
{
    return view('Client.account.reset-password', ['token' => $token]);
}
public function resetPassword(Request $request)
{
    $request->validate(
        [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ],
        [
            'token.required' => 'Token không được để trống.',
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không hợp lệ.',
            'password.required' => 'Mật khẩu mới không được để trống.',
            'password.min' => 'Mật khẩu phải có ít nhất :min ký tự.',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp.',
        ]
    );

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
        ? redirect()->route('Client.account.login')->with('status', 'Mật khẩu đã được đặt lại thành công.')
        : back()->withErrors(['email' => ['Không tìm thấy người dùng với địa chỉ email này.']]);
}
public function showOtpConfirmationForm(Request $request)
    {
        // Lấy email từ query string
        $email = $request->input('email');
        
        return view('Client.otp.otp-confirmation', compact('email'));
    }

public function verifyOtp(Request $request)
{
    $request->validate([
        'email' => 'required|email|exists:users',
        'otp' => 'required|digits:6',
    ]);

    $sessionOtp = session('otp');

         if ($sessionOtp && $request->otp == $sessionOtp) {
            return redirect()->route('Client.account.login')->with([
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

public function profile()
{
    $user = Auth::user();

   
    return view('Client.account.profile',[
        'user' => $user,
    ]);
}
public function updateProfile(Request $request)
{
    $data = $request->validate([
        'fullname' => 'required|max:200',
        'gender' => 'required',
        'birthday' => 'required|date|before_or_equal:today',
        'email' => [
            'required',
            'regex:/^[\w.%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/',
            Rule::unique('users', 'email')->ignore($request->id),
        ],
        'phone' => [
            'required',
            'regex:/^\d+$/',
            'min:10',
            'max:11',
        ],
        'address' => 'required',
        'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

    ],[
        'avatar.mimes' => 'Ảnh đại diện chỉ được có định dạng: jpeg, png, jpg, gif, svg',
        'avatar.max' => 'Ảnh đại diện chỉ được có kích thước tối đa 2048KB',
        'fullname.required' => 'Tên người dùng là bắt buộc',
        'fullname.max' => 'Tên người dùng không được dài quá 200 ký tự',
        'gender.required' => 'Giới tính là bắt buộc',
        'email.required' => 'Email là bắt buộc',
        'email.regex' => 'Email không hợp lệ',
        'email.unique' => 'Email này đã được sử dụng',
        'birthday.required' => 'Vui lòng nhập ngày sinh.',
        'birthday.date' => 'Ngày sinh phải là một ngày hợp lệ.',
        'birthday.before_or_equal' => 'Ngày sinh không được vượt quá ngày hôm nay.',
        'phone.required' => 'Số điện thoại không được để trống.',
        'phone.min' => 'Số điện thoại tối thiểu 10 số.',
        'phone.max' => 'Số điện thoại tối đa 11 số.',
        'phone.regex' => 'Số điện thoại chỉ được chứa số.',
        'address.required' => 'Địa chỉ là bắt buộc',
    ]);
    
    $user = User::findOrFail($request->id);
    $userData = [
        'fullname' => $data['fullname'],
        'gender' => $data['gender'],
        'email' => $data['email'],
        'address' => $data['address'],
        'birthday' => $data['birthday'],
        'phone' => $data['phone'],
    ];
    if ($request->hasFile('avatar')) {
        if (!empty($user->avatar)) {
            $oldAvatarPath = public_path('uploads/avatars/' . $user->avatar);
            if (File::exists($oldAvatarPath)) {
                File::chmod($oldAvatarPath, 0775);
                File::delete($oldAvatarPath); 
            }
        }
        $avatarFile = $request->file('avatar');
        $avatarName = time() . '-' . $avatarFile->getClientOriginalName(); 
        $avatarFile->move(public_path('uploads/avatars'), $avatarName); 
        $userData['avatar'] = 'avatars/' . $avatarName; 
    }
    $user->update($userData);
    return redirect()->back()->with('success', 'Cập nhật hồ sơ shop thành công!');
}




public function logout() {
    Auth::logout();
    return redirect()->route('Client.home')->with(['message' => 'Đăng xuất thành công', 'message_type' => 'success']);
}
}
