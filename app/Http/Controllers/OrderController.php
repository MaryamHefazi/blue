<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Customer;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function displayNewOrderPage(){

        $users = Customer::select(['id' , 'firstName' , 'lastName'])->get();
        $products = Product::select(['id' , 'productName' , 'price'])->get();

        return view('orders.newOrder' , compact( 'products', 'users'));
    }

    public function addOrder(OrderRequest $request){

        $order = Order::create($request->toArray());
        $last_id  = $order->id;
        $last_order = Order::find($last_id);
        $products = $request->products;
         foreach ($products as $product){
             $last_order->products()->attach($product);
         }
        return redirect('/dashboard/ordersList');
    }

    public function ordersList(){

        $order = Order::with('products')->select(['id','customer_id','description'])->get();
        return view('orders.ordersList' , ['orders'=>$order]);

    }

    public function deleteOrder($id){
        Order::destroy($id);
        return back();
    }

    public function displayEditOrderPage($id){
        $order = Order::find($id);
        return view('orders.editOrder' , ['order'=>$order]);
    }

    public function editOrder(OrderRequest $request , $id){

        Order::find($id)->update($request->except(['_method','_token']));
        return redirect('/dashboard/ordersList');
    }
}
