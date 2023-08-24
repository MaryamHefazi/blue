<?php

namespace App\Http\Controllers;

use App\Mail\TestMail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail(){

        Mail::to('maryamhefazi@gmail.com')->send(new TestMail('maryam' , 1381));
    }

}
