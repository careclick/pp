<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
          if(auth()->user()->role == 'admin'){
            return response()->json('/', 200);
          }elseif(auth()->user()->role == 'doctor'){
            return response()->json('/doctor',200);
          }else{
            return response()->json('/user',200);
          }
        }
        
        return response()->json('Invalid Credentials', 422);
		}
		
		public function logout(){
			Auth::logout();
			return response()->json('/login', 200);
		}
}
