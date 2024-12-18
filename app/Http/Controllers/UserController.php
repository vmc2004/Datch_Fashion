<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::query()->latest()->paginate(8);
        return view('Admin.Users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        // dd($request->all());
        $user = $request->except('avatar');
        if ($request->hasFile('avatar')) {
            $user['avatar'] = Storage::put('uploads/users',$request->file('avatar'));
        }
        User::query()->create($user);
        return redirect()->route('users.index')->with('message','Thêm mới người dùng thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('Admin.Users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->except('avatar');
        if ($request->hasFile('avatar')) {
            $oldAvatar = $user->avatar;
            if ($oldAvatar && Storage::exists($oldAvatar)) {
                Storage::delete($oldAvatar);
            }
            $user['avatar'] = Storage::put('uploads/users',$request->file('avatar'));
        }

        $user->update($data);
        return redirect()->route('users.index')->with('message','Cập nhật người dùng thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('message','Xóa người dùng thành công');
    }

    public function stateChange(User $user){
        if ($user) {
            $user->status = !$user->status;
            $user->save();
            return redirect()->route('users.index')->with('message',"Cập nhật trạng thái người dùng $user->fullname thành công");
        }
    }

    public function search(Request $request){
        $users = User::where('fullname', 'like', '%' .$request->input('fullname'). '%')->paginate(8);
        return view('Admin.users.index', compact('users'));
    }

    public function filter(Request $request)
    {
        $query = User::query();
        // Lọc theo trạng thái
        if (isset($request->status)) {
            $query->where('status', $request->input('status'));
        }

        // Sắp xếp theo A-Z hoặc Z-A
        if ($request->has('sort')) {
            $query->orderBy('fullname', $request->input('sort') == 'az' ? 'asc' : 'desc');
        }

        $users = $query->paginate(8);
        return view('Admin.users.index', compact('users'));
    }

    public function profile(){
        $user = Auth::user();
        return view('Admin.profile',
    [
        'user' => $user,
    ]);
    }
    public function updateProfile(Request $request){
        $data = $request->validate([
        'fullname' => 'required|max:200',
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
            'phone.required' => 'Số điện thoại không được để trống.',
            'phone.min' => 'Số điện thoại tối thiểu 10 số.',
            'phone.max' => 'Số điện thoại tối đa 11 số.',
            'phone.regex' => 'Số điện thoại chỉ được chứa số.',
            'address.required' => 'Địa chỉ là bắt buộc',


        ]);
        $user = User::findOrFail($request->id);
        $userData = [
            'fullname' => $data['fullname'],
            'address' => $data['address'],
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
        return redirect()->back()->with('success', 'Cập nhật thành công');
    }
}
