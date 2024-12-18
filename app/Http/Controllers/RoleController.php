<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRolerequest;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Permission;
use App\Models\Permisson;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::latest('id')->paginate(3);
        return view('Admin.roles.index', compact('roles'));
       
    }
    public function create()
    {
        $permissions = Permission::all()->groupBy('group');
        return view('Admin.roles.create', compact('permissions'));
    }

    public function store(StoreRoleRequest $request)
    {
        $dataCreate = $request->all();
        $dataCreate['guard_name'] = 'web';
        $role = Role::create($dataCreate);
       
        if (isset($dataCreate['permission_ids'])) {
        $role->permissions()->attach($dataCreate['permission_ids']);
          }
        return redirect()->route('roles.index')->with('message','Thêm mới quyền thành công');
    
       
    }
    public function show($id){

    }
    public function edit($id)
    {
        $role = Role::with('permissions')->findOrfail($id);
        $permissions = Permission::all()->groupBy('group');
        return view('Admin.Roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrfail($id);
        $dataUpdate = $request->all();
        $role->update($dataUpdate);
        $role->permissions()->sync($dataUpdate['permission_ids']);
        return redirect()->route('roles.index')->with('message','Cập nhật quyền thành công');

    }
    
    public function destroy($id)
    {
        Role::destroy($id);
        return redirect()->route('roles.index')->with('message','Xóa quyền thành công');
    }

}
