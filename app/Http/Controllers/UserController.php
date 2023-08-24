<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
     public function displayRegisterPage(){

         return view('auth.register');
     }

    public function displayLoginPage(){

        return view('auth.login');
    }

    public function login(Request $request){

       $credentials = $request->validate([
           'email' => ['required', 'email'],
           'password' => ['required'],
       ]);

       if (Auth::attempt($credentials)){
           $request->session()->regenerate();

           return redirect('/');
       }
       return back()->withErrors([ 'email' => 'The provided credentials do not match our records.'])
                    ->onlyInput('email');

    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('displayLoginPage');
    }
}
