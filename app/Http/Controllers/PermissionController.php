<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function permissions()
    {
        $permissions = Permission::all();
        return response()->json($permissions);
    }

    public function newPermission(Request $request)
    {
        $permission = Permission::create($request->toArray());
        return response()->json($permission);
    }

    public function update(string $id , Request $request)
    {
        $permission = Permission::findById($id);
        $permission->update($request->toArray());
        return response()->json($permission , [
            'message'=> "Updated!"
        ]);
    }

    public function delete(string $id)
    {
        Permission::destroy($id);
        return response()->json([
            'message'=>'Went To Fucking Hell'
        ]);
    }
}
