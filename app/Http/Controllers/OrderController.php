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
        $products = $request->products;
         foreach ($products as $product){
             $order->products()->attach($product);
         }
        return redirect()->route('ordersList');
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
        $users = Customer::select(['id' , 'firstName' , 'lastName'])->get();
        $products = Product::select(['id' , 'productName' , 'price'])->get();
        $selectedProducts = $order->products()->pluck('id')->toArray();
        return view('orders.editOrder' , compact('order', 'users' , 'products' , 'selectedProducts'));
    }

    public function editOrder(OrderRequest $request , $id){

        Order::find($id)->update($request->except(['_method','_token']));
        return redirect()->route('ordersList');
    }
}
