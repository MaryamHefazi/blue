<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category(){
        $category = Category::select( ['name']);
        return ['categories'=>$category];
    }


    public function test(){
//        $u = Customer::find(10)
//             ->orders()->get();
//        return $u;

//        $ors = Order::find(10)->
//               products()->get();
//        return $ors;

//        $order = Order::has('products', '>' , 3)->get();
//        return $order;

//        $customer = Customer::has('orders.products')->get();
//        return $customer;

        $customer = Customer::doesntHave('orders')->get();
        return $customer;

    }

}
