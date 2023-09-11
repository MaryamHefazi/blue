<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{

    public function newCustomer(UserRequest $request)
    {
        $customer = Customer::create($request->merge(['password'=>Hash::make($request->password)])->toArray());
        return $customer;
    }

    public function customerList(Request $request){

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

        $users = $query->select('id', 'firstName', 'lastName', 'email', 'phoneNumber', 'city')->get();

        return $users;
    }


    public function show(Customer $customer)
    {
        return response()->json($customer);
    }

    public function delete(Customer $customer)
    {
        $customer->delete();
        return response()->json([
            'message'=>'Delete Customer Successfully'
        ]);
    }


    public function update(UserRequest $request , Customer $customer)
    {
        $customer->update($request->toArray());
        return response()->json($customer) ;
    }
}
