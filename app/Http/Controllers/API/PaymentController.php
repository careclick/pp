<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Zttp\Zttp;

class PaymentController extends Controller
{

    public function getKey($seckey){
        $hashedkey = md5($seckey);
        $hashedkeylast12 = substr($hashedkey, -12);
    
        $seckeyadjusted = str_replace("FLWSECK-", "", $seckey);
        $seckeyadjustedfirst12 = substr($seckeyadjusted, 0, 12);
    
        $encryptionkey = $seckeyadjustedfirst12.$hashedkeylast12;
        return $encryptionkey;
      }

    public function encrypt3Des($data, $key){
      $encData = openssl_encrypt($data, 'DES-EDE3', $key, OPENSSL_RAW_DATA);
      return base64_encode($encData);
    }
      
    public function pay(Request $request){ 

        //Initialize payment   
        $data = array('PBFPubKey' => $request->PBFPubKey,
        'cardno' => $request->cardno,
        'currency' => 'NGN',
        'country' => 'NG',
        'cvv' => $request->cvv,
        'amount' => '10',
        'expiryyear' => $request->expiryyear,
        'expirymonth' => $request->expirymonth,
        'phonenumber'=>$request->phone,
        'firstname'=>$request->firstname,
        'lastname'=>$request->lastname,
        'email' => $request->email,
        'IP' => $_SERVER['REMOTE_ADDR'],
        'txRef' => $request->txRef,
        'payment_plan'=>'1133',
        'redirect_url'=>'https://bfb8021b.ngrok.io/receivepayment'
        );
        

        $SecKey = config('services.fl_secret.secret');

        $key = $this->getKey($SecKey); 
        
        $dataReq = json_encode($data);
        
        $post_enc = $this->encrypt3Des( $dataReq, $key );


        $postdata = array(
         'PBFPubKey' => $request->PBFPubKey,
         'client' => $post_enc,
         'alg' => '3DES-24');


        $url = "https://api.ravepay.co/flwv3-pug/getpaidx/api/charge";
        $response = Zttp::withHeaders(['Content-Type' => 'application/json'])->post($url, $postdata);
        $result = $response->json(); 
        $result_init = [];

        if($result['message'] == 'V-COMP' && $result['data']['authModelUsed'] == 'VBVSECURECODE'){
          $result_init = $result;
        }else{
          $result_init = $this->initialize($result, $request->all());
        }

        return response()->json($result_init, 200);
        }
        
        public function initialize($result, $request){
          $data1 = array('PBFPubKey' => $request['PBFPubKey'],
            'cardno' => $request['cardno'],
            'currency' => 'NGN',
            'country' => 'NG',
            'cvv' => $request['cvv'],
            'amount' => '10',
            'expiryyear' => $request['expiryyear'],
            'expirymonth' => $request['expirymonth'],
            'pin' => $request['pin'],
            'suggested_auth' => $result['data']['suggested_auth'],
            'phonenumber'=>$request['phone'],
            'firstname'=>$request['firstname'],
            'lastname'=>$request['lastname'],
            'email' => $request['email'],
            'IP' => $_SERVER['REMOTE_ADDR'],
            'txRef' => $request['txRef'],
            'payment_plan'=>'1133',
            'redirect_url'=>'https://bfb8021b.ngrok.io/receivepayment'
            ); 
            
            $SecKey = config('services.fl_secret.secret');
            $url = "https://api.ravepay.co/flwv3-pug/getpaidx/api/charge";
            $key1 = $this->getKey($SecKey);
            $dataReq1 = json_encode($data1);
            $post_enc1 = $this->encrypt3Des( $dataReq1, $key1 );
            $postdata1 = array(
                'PBFPubKey' => $request['PBFPubKey'],
                'client' => $post_enc1,
                'alg' => '3DES-24');
            
            $response1 = Zttp::withHeaders(['Content-Type' => 'application/json'])->post($url, $postdata1);
            $result1 = $response1->json(); 
            return $result1;

        }
}
