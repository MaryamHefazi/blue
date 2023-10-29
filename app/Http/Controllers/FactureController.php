<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class FactureController extends Controller
{
    public function displayFactore($id)
    {
        $order = Order::find($id);
        $customer_id = $order->customer_id;

        $customer = Customer::find($customer_id);
        
        $products = $order->products;

        $totalPrice = 0;
        
        foreach($products as $product)
        {
            $totalPrice += $product->price;
        }

        return view("Facture.newFacture" , compact("order","products","customer" , "totalPrice"));
    }

}
