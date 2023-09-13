<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Customer;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use http\Exception\InvalidArgumentException;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function newOrder(OrderRequest $request){

        $order = Order::create($request->toArray());
        $products = $request->products;
         foreach ($products as $product){
             $order->products()->attach($product);
         }

        return response()->json($order);
    }

    public function ordersList(string $id = null)
    {
        if ($id)
        {
           $order = Order::find($id);
        }
        else
        {
            $order = Order::select(['id','customer_id','description'])->get();
        }
        return response()->json($order);
    }

    public function delete($id){
        Order::destroy($id);
        return response()->json([
            'message'=>'Delete Order Successfully'
        ]);
    }


    public function update(OrderRequest $request , $id)
    {
       $order = Order::find($id);
       $order->update($request->toArray());
        return response()->json($order);
    }
}
