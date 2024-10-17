<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::query()->latest()->paginate(8);
        return response()->json($users);
    }

    public function store(StoreUserRequest $request)
    {
        $user = $request->except('avatar');
        if ($request->hasFile('avatar')) {
            $user['avatar'] = Storage::put('uploads/users',$request->file('avatar'));
        }
        $data = User::query()->create($user);
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return response()->json($user);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->except('avatar');
        if ($request->hasFile('avatar')) {
            $oldAvatar = $user->avatar;
            if (Storage::exists($oldAvatar)) {
                Storage::delete($oldAvatar);
            }
            $user['avatar'] = Storage::put('uploads/users',$request->file('avatar'));
        }

        $user->update($data);
        return response()->json($user);
    }

    
}
