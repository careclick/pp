<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\UserEmail;
use Mail;
use Zttp\Zttp;

class RegisterAPI implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user_data;
    public $timeout = 900;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user_data)
    {
        $this->user_data = $user_data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $user_d = $this->user_data;

        if($user_d['email'] && $user_d['email'] !== "retailenrollee2@hygeiahmo.com" && $user_d['email'] !== "accesscustomer@healthxtra.com" && $user_d['email'] !== "dummy@hygeiahmo.com"){
            Mail::to($user_d['email'])->send(new UserEmail($user_d));
        }


            // $url = "https://new-anywhere.careclix.com/backend/api/v1/auth/signup";
   
            // $response = Zttp::withHeaders(['Content-Type' => 'application/json'])->post($url, [
            //     'username'=>$this->user_data['username'],
            //     'password'=>$this->user_data['password'],
            //     'email'=> "hygeia@careclick.healthcare",
            //     'clinicIds'=>['cclicks'],
            //     'firstName'=>$this->user_data['firstname'],
            //     'lastName'=>$this->user_data['lastname'].' '.'|| Hygeia',
            //     'language'=>["English"],
            //     'confirmPassword'=>$this->user_data['password'],
            //     'gender'=>ucfirst($this->user_data['gender']),
            //     'dateOfBirth'=>$this->user_data['dateOfBirth'] ? $this->user_data['dateOfBirth'] : '2020-06-10T13:02:20Z',
            //     'phoneNumber'=>[
            //         "type"=> "Phone",
            //         "countryCode"=> "234",
            //         "number"=> substr($this->user_data['phonenumber'], 0, 1) == '0' ? $this->user_data['phonenumber'] : '8020202021',
            //     ],
            //     'address'=>[
            //         "street"=> $this->user_data['street'],
            //         "city"=> $this->user_data['city'],
            //         "state"=> $this->user_data['state'],
            //         "zipCode"=> "23401",
            //         "country"=> $this->user_data['country'],
            //         "countryCode"=> "234"
            //     ]
            // ]);
                
            $link = 'https://account.careclick.healthcare/api/register';

           	$respons = Zttp::withHeaders(['Content-Type'=>'application/json'])->post($link, [

               'username'=>strtolower($this->user_data['username']),
               'email'=> $this->user_data['email'] ? $this->user_data['email'] : 'hygeia@careclick.healthcare',
               'firstname'=>$this->user_data['firstname'],
               'lastname'=>$this->user_data['lastname'],
               'gender'=>$this->user_data['gender'],
               'dob'=>$this->user_data['dateOfBirth'],
               'phonenumber'=>substr($this->user_data['phonenumber'], 0, 1) == '0' ? $this->user_data['phonenumber'] : 'NULL',
               'account'=>'hygeiahmo',
               'user_identifier'=>'hygeiahmo-63'


           ]);

            // $url1 = 'https://www.bulksmsnigeria.com/api/v1/sms/create';

            //     $response1 = Zttp::asFormParams()->post($url1, [
            //         'api_token' => 'caW7cvpKJ2W9pUjqrukYDM59M4rqxv7oXfOgqrAbgSMvDScclbgOLaoBvBzB',
            //         'from' => 'CareClick',
            //         'to'=>$this->user_data['phonenumber'],
            //         'body'=>'Welcome to 24/7 Telemedicine Service. You can access qualified medical doctors for basic medical care consultations via video and voice calls 24/7. Please login to https://careclick.healthcare/hci/ with username:'.$this->user_data['username'].' and password: '.$this->user_data['password'].' to begin. For voice calls: 014483371',
            //     ]);

            //  $url1 = 'https://www.bulksmsnigeria.com/api/v1/sms/create';

            //   $response1 = Zttp::asFormParams()->post($url1, [
            //          'api_token' => 'caW7cvpKJ2W9pUjqrukYDM59M4rqxv7oXfOgqrAbgSMvDScclbgOLaoBvBzB',
            //          'from' => 'RedcareHMO',
            //          'to'=> substr($this->user_data['phonenumber'], 0, 1) == '0' ? $this->user_data['phonenumber'] : "0".$this->user_data['phonenumber'],
            //          'body'=>'You are welcome to the RedcareHMO Telemedicine Service. You can access a qualified medical doctors for GP consultations via video and voice calls 24/7. Please login to https://careclick.healthcare/redcare/ with username: '.$this->user_data['username'].' password: '.$this->user_data['password'].' to begin',
            //   ]);    

                // $url1 = 'https://goldsms247.com/components/com_spc/smsapi.php';

                //   Zttp::asFormParams()->post($url1, [
                //       'username' => 'careclick',
                //       'password' => 'CClick123',
                //       'sender'=>'CareClick',
                //       'message'=>'Welcome to 24/7 Telemedicine Service. You can access qualified medical doctors for basic medical care consultations via video and voice calls 24/7. Please login to https://careclick.healthcare/hci/ with username:'.$this->user_data['username'].' and password: '.$this->user_data['password'].' to begin.',
                //       'recipient'=> substr($this->user_data['phonenumber'], 0, 1) == '0' ? $this->user_data['phonenumber'] : "0".$this->user_data['phonenumber']
                //   ]);
                // // dd($response1->json());

	}
}
