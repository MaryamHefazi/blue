<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Evryn\LaravelToman\Facades\Toman;

class PayController extends Controller
{
    public function pay(Request $request)
    {
        $amount = $request->amount;
        // dd($amount);
        
        $request = Toman::amount($amount)
        ->description('Subscribing to Plan A')
        ->callback(route('callBack'))
        ->mobile('09350000000')
        ->email('amirreza@example.com')
        ->request();

        // dd($request);


        if ($request->successful()) {
            $transactionId = $request->transactionId();
            
        
            return $request->pay(); 
        }
    }



    public function callback(CallbackRequest $request)
    {
    
        $payment = $request->amount(1000)->verify();

        if ($payment->successful()) {
            dd('payment');
            $referenceId = $payment->referenceId();
        }

        if ($payment->failed()) {
            dd('failed');
        }
    }
}

