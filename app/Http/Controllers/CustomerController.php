<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function displayNewUserPage() {

        return view('users.newUser');
    }

    public function addUser(UserRequest $request){

        Customer::create($request->merge(['password'=>Hash::make($request->password)])->toArray());
        return redirect('/dashboard/usersList');
    }

    public function usersList(){

        $user = Customer::select('id','firstName','lastName','email','phoneNumber','city')->get();
        return view('users.usersList' , ['users'=>$user]);
    }

    public function delete(Customer $customer){

        $customer->delete();
        return back();
    }

    public function displayEditPage(Customer $customer){

        return view('users.editUser' , ['user'=>$customer]);
    }

    public function edit(UserRequest $request , Customer $customer){

        $customer->update($request->except(['_method' , '_token']));
        return redirect('/dashboard/usersList');

    }
}
