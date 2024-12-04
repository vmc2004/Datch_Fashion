<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
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
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function homeClient()
    {
        // Lấy danh sách danh mục từ cơ sở dữ liệu
        $banners = Banner::where('is_active', 1)->where('location', 1)->get();
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
    
    public function showLoginForm(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();

    
    if ($user && password_verify($request->password, $user->password)) {
      
        Auth::login($user);
        

        if ($user->role === 'member') {
            // Chuyển hướng tới trang dành cho member
            return redirect()->route('Client.home')->with([
                'message' => 'Đăng nhập thành công với quyền Member',
                'message_type' => 'success',
            ]);
        }

        // Nếu không phải là member, trả về lỗi
        return back()->withErrors([
            'role' => 'Bạn không có quyền truy cập vào hệ thống.',
        ]);
    }

    // Trả về lỗi nếu đăng nhập thất bại
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
    $getAddress = Province::all();
    $user = Auth::user();

   
    return view('Client.account.profile',[
        'user' => $user,
        'getAddress'=> $getAddress,
    ]);
}
public function updateProfile(Request $request)
{
    // $da = $request->all();
    // dd($da);
    // Validate dữ liệu từ request
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

// public function updateProfile(Request $request,  User $user)
// {
//     $request->validate([
//         'fullname' => 'required|string|max:255',
//         'gender' => 'required|string',
//         'birthday' => 'required|date',
//         'language' => 'required|string',
//         'address' => 'nullable|string|max:255',
//         'introduction' => 'nullable|string',
//     ]);

//     $user = auth()->user();
//     $user->fullname = $request->input('fullname');
//     $user->gender = $request->input('gender');
//     $user->birthday = $request->input('birthday');
//     $user->language = $request->input('language');
//     $user->address = $request->input('address');
//     $user->introduction = $request->input('introduction');
//     // Cập nhật avatar nếu có
//     $data = $request->except('avatar');
//     if ($request->hasFile('avatar')) {
//         $oldAvatar = $user->avatar;
//         // Kiểm tra và xóa avatar cũ
//         if ($oldAvatar && Storage::disk('public')->exists($oldAvatar)) {
//             Storage::disk('public')->delete($oldAvatar);
//         }
//         // Lưu ảnh mới
//         $user->avatar = $request->file('avatar')->store('uploads/users', 'public');
//     }
    
//     $user->save();

//     return response()->json([
//         'success' => true,
//         'user' => [
//             'fullname' => $user->fullname,
//             'gender' => $user->gender,
//             'birthday' => $user->birthday,
//             'language' => $user->language,
//             'address' => $user->address,
//             'introduction' => $user->introduction,
//            'avatar_url' => $user->avatar ? asset('storage/' . $user->avatar) . '?' . time() : null,  // Đường dẫn ảnh mới
//         ]
//     ]);
// }



public function logout() {
    Auth::logout();
    return redirect()->route('Client.home')->with(['message' => 'Đăng xuất thành công', 'message_type' => 'success']);
}
public function getDistricts($provinceId)
{
    $districts = District::where('province_id', $provinceId)->get();
    return response()->json($districts);
}
public function getCommunes($districtId)
{
    $communes = Commune::where('district_id', $districtId)->get();
    return response()->json($communes);
}
public function saveAdd(Request $request) {
    dd($request->all());
    $user = Auth::user();

    // Lấy thông tin từ request
    $province_id = $request->province_id;
    $district_id = $request->district_id;
    $commune_id = $request->commune_id;
    $address = $request->address;

    $province = Province::find($province_id);
    $district = District::find($district_id);
    $commune = Commune::find($commune_id);

    // Kiểm tra nếu các thông tin không tồn tại
    if (!$province || !$district || !$commune) {
        return response()->json(['error' => 'Thông tin địa chỉ không hợp lệ.'], 400);
    }

    // Cộng chuỗi địa chỉ
    $fullAddress = $address . ', ' . $commune->name . ', ' . $district->name . ', ' . $province->name;

    // Lưu thông tin vào bảng user
    $userData= ['address'=>$fullAddress];
    $user->update($userData);

    // Trả về thông báo thành công
    return response()->json(['success' => 'Địa chỉ đã được lưu thành công!']);
}


}
