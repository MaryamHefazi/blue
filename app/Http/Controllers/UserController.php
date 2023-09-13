<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Nette\Schema\ValidationException;

class UserController extends Controller
{

    public function login(Request $request)
    {
       $request->validate([
           'email'=>'required|email',
           'password'=>'required'
       ]);

       $user = User::where('email' , $request->email)->first();

       if(!$user) {
           throw \Illuminate\Validation\ValidationException::withMessages([
               'email'=>['the provided credentials incorrect!']
           ]);
       }
       if(!Hash::check($request->password , $user->password)) {
           throw \Illuminate\Validation\ValidationException::withMessages([
               'email'=>['the provided credentials incorrect!']
           ]);
       }

       $token = $user->createToken('api-token')->plainTextToken;

       return response()->json([
           'token'=>$token
       ]);
    }

    public function logout(Request $request)
    {
       $request->user()->tokens()->delete();
       return response()->json([
          'message' => 'Go To Hell!'
       ]);
    }
}
