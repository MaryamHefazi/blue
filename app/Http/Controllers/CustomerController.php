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
        return redirect()->route('usersList');
    }

    public function usersList(Request $request){

        $query = Customer::query();

        if ($request->has('firstName')){
         $query->where('firstName' , 'like' , '%'. $request->input('firstName') . '%');
        }

        if ($request->has('lastName')) {
            $query->where('lastName', 'like', '%' . $request->input('lastName') . '%');
        }

        if ($request->has('orders')) {
            $ordersFilter = $request->input('orders');

            if ($ordersFilter == 'has') {
                $query->has('orders');
            } elseif ($ordersFilter == 'does_not_have') {
                $query->doesntHave('orders');
            }
        }

        $users = $query->with('orders')->select('id', 'firstName', 'lastName', 'email', 'phoneNumber', 'city')->get();

//        $users = Customer:Customer:select('id','firstName','lastName','email','phoneNumber','city')->get();
        return view('users.usersList' , ['users'=>$users]);
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
        return redirect()->route('usersList');

    }
}
