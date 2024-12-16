<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Permisson;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::paginate(3);
        return view('Admin.roles.index', compact('roles'));
       
    }
    public function create()
    {
        $permission = Permission::all()->groupBy('group');
        return view('Admin.roles.create', compact('permission'));
    }

    public function store(Request $request)
    {
        $dataCreate = $request->all();
        $dataCreate['guard_name'] = 'web';
        $role = Role::create($dataCreate);
        if (isset($dataCreate['permission_ids'])) {
            // Gắn quyền vào role
            $role->permission()->attach($dataCreate['permission_ids']);
        }
        return redirect()->route('roles.index');
    
       
    }
    public function edit()
    {
        
    }


    
    public function destroy()
    {
    }

}
