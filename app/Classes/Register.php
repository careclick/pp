<?php

namespace App\Classes;
use Zttp\Zttp;

class Register {
  
  public function RegisterAPI($user_data){
    $url = "https://new-anywhere.careclix.com/backend/api/v1/auth/signup";
   
    $response = Zttp::withHeaders(['Content-Type' => 'application/json'])->post($url, [
        'username'=>$user_data['username'],
        'password'=>$user_data['password'],
        'email'=>$user_data['email'],
        'clinicIds'=>['cclicks'],
        'firstName'=>$user_data['firstname'],
        'lastName'=>$user_data['lastname'],
        'language'=>["English"],
        'confirmPassword'=>$user_data['password'],
        'gender'=>$user_data['gender'],
        'dateOfBirth'=>$user_data['dateOfBirth'],
        'phoneNumber'=>[
            "type"=> "Phone",
            "countryCode"=> "234",
            "number"=> $user_data['phonenumber'],
        ],
        'address'=>[
            "street"=> $user_data['street'],
            "city"=> $user_data['city'],
            "state"=> $user_data['state'],
            "zipCode"=> "23401",
            "country"=> $user_data['country'],
            "countryCode"=> "234"
        ]
    ]);
    $result = $response->json();
    if($result['status' == 'ok']){
      
    }
  }

}