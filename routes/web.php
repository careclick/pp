<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\User;
use App\Schedule;
use App\Rating;
use Carbon\Carbon;
use App\Events\RegisterUser;
use App\Classes\Register;
use App\Jobs\RegisterAPI;
use Zttp\Zttp;
// use Illuminate\Support\Str;



Route::get('/send-sms', function(){
  $url1 = 'http://goldsms247.com/components/com_spc/smsapi.php';

  $response1 = Zttp::asFormParams()->post($url1, [
      'username' => 'careclick',
      'password' => 'CClick123',
      'recipient'=>'08168696515',
      'sender'=> 'CareClick',
      'message'=>'You are welcome to the RedcareHMO Telemedicine Service. You can access a qualified medical doctors for GP consultations via video and voice calls 24/7.Please login to https://careclick.healthcare/redcare/ with username: to begin',
  ]);

  return 'sent';
});
Route::get('/registeruser', function(){
  $user_data = [
    'username'=>'mikoyo',
    'password'=>'Oluwaseun12@',
    'email'=>'okesm@yaho.com',
    'firstname'=>'Oke',
    'lastname'=>'Oluwaseun',
    'dateOfBirth'=>'2004-02-12T15:19:21+00:00',
    'gender'=>'Male',
    'phonenumber'=>'08168696515',
    'street'=>'Akute',
    'city'=>'Lagos',
    'state'=>'Lagos',
    'country'=>'Nigeria'
    ];
  $user = new Register();
  $user->RegisterAPI($user_data);
});

Route::get('/manipulate', function(){

    $name = '0ke';
    $string = ltrim($name, 'O');
    $firstCharacter = substr($name, 0, 1);
    
    return $firstCharacter == '0' ? $firstCharacter : 'null';

});
Route::get('/sendsms', function(){
  $user=[
  'username' => 'careclick',
  'password' => 'CClick123',
  'sender'=>'CareClick',
  'message'=>'Hello',
  'recipient'=> '08168696515'
  ];
  $url = 'https://goldsms247.com/components/com_spc/smsapi.php';

  $response = Zttp::asFormParams()->post($url,[
    'username' => 'careclick',
    'password' => 'CClick123',
    'sender'=>'CareClick',
    'message'=>'Hello',
    'recipient'=> '08168696515'
  ]);
  dd($response->json());
  return 'Done';
});
Route::get('/registerapi', function(){
  $user_data = [
    'username'=>'mikoyo',
    'password'=>'Oluwaseun12@',
    'email'=>'okesm@yahoo.com',
    'firstname'=>'Oke',
    'lastname'=>'Oluwaseun',
    'dateOfBirth'=>'2004-02-12T15:19:21+00:00',
    'gender'=>'Male',
    'phonenumber'=>'08168696515',
    'street'=>'Akute',
    'city'=>'Lagos',
    'state'=>'Lagos',
    'country'=>'Nigeria'
    ];
  dispatch(new RegisterAPI($user_data));
  return 'Finished';


});
Route::get('/all', function(){   $users = App\User::where('role', 'patient')->get();
  $users = User::where('role','1')->take('50')->count();
  dd($users);
 $input = array("Doctor", "Patient");
 $rand_keys = array_rand($input, 2);
   foreach($users as $user){
      $user->update([
      // 'role'=>$input[$rand_keys[0]]
      'role'=>'doctor'
     ]);    }
   return 'true';

 });

// Route::get('/logout', function(){
//   Auth::logout();
//   return redirect('/login');
// });

Route::get('/unlink', function(){
//   $dateOfBirth = '1993-12-15';
// $years = \Carbon\Carbon::parse($dateOfBirth)->age;
// $date = Carbon\Carbon::parse('2020-05-06T17:02:00.000Z')->toDateString();
// $user = User::take('20')->get();
// $user = User::where('created_at','>=', Carbon::now()->firstOfYear())
//         ->selectRaw('MONTH("%m", created_at) as month, sum(phone) as phone')
//         ->groupBy('month')
//         ->pluck('phone');

// $sche = User::find('543a0f69-2edb-442d-bc0d-64a7eaf28b6e');
// $schedule = Schedule::where('id', '6')->where('user_id', '5144e6ea-5c6c-4dbc-928d-6242911aa04c')->first();

dd(auth()->user()->firstname());
});
Route::get('/userss', function(){
  $users = User::where('role','patient')->where('status', null)->get();

  foreach($users as $user){
    $user->update(['status'=>'0']);
  }
  return 'Done';
});
Route::get('/handle_redirect', function () {
    
    return view('redirect');
});

/*
$starttime = '9:00';  // your start time
$endtime = '21:00';  // End time
$duration = '30';  // split by 30 mins

$array_of_time = array ();
$start_time    = strtotime ($starttime); //change to strtotime
$end_time      = strtotime ($endtime); //change to strtotime

$add_mins  = $duration * 60; // seconds

while ($start_time <= $end_time) // loop between time
{
 $array_of_time[] = date ("h:i", $start_time);
 $start_time += $add_mins; // to check endtie=me
}

// Here I am getting the indexes of the time slot which has appointment
$indexes_to_be_skipped = array();
foreach($appointments as $appointment) {
  for($i=0;$i<count($array_of_time); $i++) {
    if($array_of_time[$i] == date ("h:i", strtotime($appointment['appointment_time_start']))) {
      $indexes_to_be_skipped[$i] = $i;
    }
  }
}

$new_array_of_time = array ();
for($i = 0; $i < count($array_of_time) - 1; $i++)
{
  $new_array_of_time[] = '' . $array_of_time[$i] . ' - ' . $array_of_time[$i + 1];

  // check if current time slot has already appointment
  if(isset($indexes_to_be_skipped[$i])) {
    // then remove it
    unset($new_array_of_time[$i]);
  }
}

// resetting index
$narray_of_time = $new_array_of_time;
$new_array_of_time = array();
foreach($narray_of_time as $item) {
  $new_array_of_time[] = $item;
}
*/

Route::get('/receivepayment', function(){
   $resp = request()->all();
   $data = json_decode($resp['response']);
    broadcast(new RegisterUser($data));
    dd($data);
  });
function SplitTime($StartTime, $EndTime, $Duration="60"){
  $ReturnArray = array ();// Define output
  $StartTime    = strtotime ($StartTime); //Get Timestamp
  $EndTime      = strtotime ($EndTime); //Get Timestamp

  $AddMins  = $Duration * 60;

  while ($StartTime <= $EndTime) //Run loop
  {
      $ReturnArray[] = date ("G:i", $StartTime);
      $StartTime += $AddMins; //Endtime check
  }
  return $ReturnArray;
}

Route::get('/rating', function(){
  $user = Rating::where('doctor_id','095ff092-67b4-4fcd-8752-82c541f2c937')->avg('rating');
  $rating = $user;
  dd($rating);
});
Route::get('getapp', function(){
  $starttime = '8:00';  // your start time
  $endtime = '17:00';  // End time
  $duration = '15';  // split by 30 mins
  $data = SplitTime($starttime, $endtime, $duration);

  dd($data);
});
Route::get('appointment', function(){
  $starttime = '8:00';  // your start time
  $endtime = '17:00';  // End time
  $duration = '15';  // split by 30 mins
  $array_of_time = array ();
  $start_time    = strtotime ($starttime); //change to strtotime
  $end_time      = strtotime ($endtime); //change to strtotime

  $add_mins  = $duration * 60;

  while ($start_time <= $end_time) // loop between time
    {
       $array_of_time[] = date ("h:i", $start_time);
       $start_time += $add_mins; // to check endtie=me
    }
    $new_array_of_time = array ();
    for($i = 0; $i < count($array_of_time) - 1; $i++)
    {
        $new_array_of_time[] = '' . $array_of_time[$i] . ' - ' . $array_of_time[$i + 1];
    }

    dd($new_array_of_time);
});


Route::post('/logout', 'AuthController@logout')->middleware('auth');
Route::get('/login', 'PagesController@login')->middleware('guest')->name('login');
Route::get('/register', 'PagesController@register')->middleware('guest');
Route::post('/login', 'AuthController@authenticate')->middleware('guest');

//Admin Routes
Route::middleware(['auth', 'admin'])->group(function () {
  Route::get('/','AdminController@index' );
  Route::get('/profile','AdminController@profile' );
  Route::get('/patients','AdminController@patients' );
  Route::get('/doctors','AdminController@doctors' );
  Route::get('/schedules','AdminController@schedules' );
  Route::get('/reports','AdminController@reports' );
  Route::get('/search','AdminController@search' );
  Route::get('/message','AdminController@message' );


  Route::post('/add-patient', 'AdminController@addpatient');
  Route::post('/add-doctor', 'AdminController@adddoctor');
  Route::post('/import-patient', 'AdminController@importpatient');
  Route::post('/changepassword', 'AdminController@changepassword');
  Route::post('/deletepatient', 'AdminController@deletepatient');


  Route::get('/exportpatient','AdminController@exportpatient');
  Route::get('/exportdoctor','AdminController@exportdoctor');
  Route::get('/all-patients','AdminController@allpatient');
  Route::get('/all-doctors','AdminController@alldoctor' );
  Route::get('/getalldoctors','AdminController@getAllDoctor' );
  Route::get('/patients/{user}','AdminController@patient');
  Route::get('/doctors/{user}','AdminController@doctor');


});
//Doctor Routes
Route::prefix('doctor')->middleware(['auth', 'doctor'])->group(function () {
  Route::get('/','DoctorController@index' );
  Route::get('/message','DoctorController@message' );
});


//Patient Route
Route::prefix('user')->middleware(['auth', 'patient'])->group(function () {
  Route::get('/','PatientController@index' );
  Route::get('/message','PatientController@message' );
  Route::get('/appointments','PatientController@appointments');
  Route::get('/transactions','PatientController@transactions');
  Route::get('/doctors','PatientController@doctors');
  Route::get('/profile','PatientController@profile');
  Route::get('/medical-records','PatientController@medical_records');
  Route::get('/consultations','PatientController@consultations');
});

