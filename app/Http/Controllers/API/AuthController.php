<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\API\ResponseController as ResponseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use Validator;

class AuthController extends ResponseController
{
    //create user
    public function signup(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'username' => 'required|string',
            'phone' => 'required|numeric',
            'dob' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'plan' => 'required',
            'country'=>'required',
            'state'=>'required',
            'email' => 'required|string|email|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }

				$dob = Carbon::parse($request->dob)->toDateString();

        $input = [
            'name'=>$request->firstname.' '.$request->lastname,
            'username'=>$request->username,
            'password'=>bcrypt($request->password),
            'email'=>$request->email,
            'dob'=>$dob,
            'gender'=>$request->gender,
            'country'=>$request->country,
            'phone'=>$request->phone,
            'state'=>$request->state,
            'plan'=>$request->plan,
            'street'=>$request->street,
            'role'=>'patient',
            'password'=>bcrypt($request->password),
				];
				
        $user = User::create($input)->notifications()->create([
                'consultation'=>'1',
                'message'=>'1',
                'offer'=>'1',
                'sms'=>'1'
							]);

        if($user){
            $success['token'] =  $user->createToken('token')->accessToken;
            return $this->sendResponse($success);
            $success['message'] = "Registration successfull..";
        }
        else{
            $error = "Sorry! Registration is not successfull.";
            return $this->sendError($error, 401); 
        }
        
    }
    
    //login
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }

        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials)){
            $error = "Invalid Credentials";
            return $this->sendError($error, 401);
        }
        $user = $request->user();
        $user->update(['status'=>'1']);
        $success['token'] =  $user->createToken('token')->accessToken;
        return $this->sendResponse($success);
    }

    //logout
    public function logout(Request $request)
    {
        $request->user()->update(['status'=>'0']);
        $isUser = $request->user()->token()->revoke();
        if($isUser){
            $success['message'] = "Successfully logged out.";
            return $this->sendResponse($success);
        }
        else{
            $error = "Something went wrong.";
            return $this->sendResponse($error);
        }
            
        
    }

    //getuser
    public function getUser(Request $request)
    {
        //$id = $request->user()->id;
        $user = $request->user();
        if($user){
            return $this->sendResponse($user);
        }
        else{
            $error = "user not found";
            return $this->sendResponse($error);
        }
    }
}