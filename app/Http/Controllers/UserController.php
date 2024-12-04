<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
    public function profile(){
        $user = Auth::user();
        return view('Admin.profile',
    [
        'user' => $user,
    ]);
    }
}
