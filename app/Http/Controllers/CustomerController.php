<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function newCustomer(UserRequest $request)
    {
        $customer = Customer::create($request->merge(['password'=>Hash::make($request->password)])->toArray());
        return response()->json($customer );
    }

    public function customersList(Request $request , string $id = null){

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

        $users = $query->with('orders:id,customer_id')->select('id', 'firstName', 'lastName', 'email', 'phoneNumber', 'city');

        if($id){
            $customers = Customer::findOrFail($id);
        }
        else
        {
            $customers = Customer::all();
        }

        return response()->json($customers);
    }

//    mixed this method with customer list using optional variable

//    public function show(Customer $customer)
//    {
//        return response()->json($customer);
//    }

    public function delete(string $id)
    {
        Customer::destroy($id);
        return response()->json([
            'message'=>'Delete Customer Successfully'
        ]);
    }


    public function update(Request $request , string $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->update($request->toArray());
        return response()->json($customer) ;
    }
}
