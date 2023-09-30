<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function roles()
    {
        $roles = Role::all();
        return response()->json($roles);
    }

    public function newRole(Request $request)
    {
        $role = Role::create($request->toArray());
        return response()->json($role);
    }

    public function roleAssign(Request $request)
    {
        $role = Role::findById($request->role_id);
        $permissions = Permission::findById($request->permission_id);
        $role->givePermissionTo($permissions);
        return response()->json($role);
    }

    public function update(string $id , Request $request)
    {
        $role = Role::findById($id);
        $role->update($request->toArray());
        return response()->json($role , [
            'message'=> "Updated!"
        ]);
    }

    public function delete(string $id)
    {
        Role::destroy($id);
        return response()->json([
           'message'=>'Went To Fucking Hell'
        ]);
    }


}
