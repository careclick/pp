<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Transaction;
use App\Consultation;
use Illuminate\Support\Str;
use App\Exports\UsersExport;
use App\Exports\DoctorsExport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use DB;
use Carbon\Carbon;
use App\Jobs\RegisterAPI;
use Zttp\Zttp;





class AdminController extends Controller
{
    // 
    public function index(){
			$subscribers = User::where('role','patient')->where('active', '1')->count();
			$transactions = Transaction::sum('amount');
			$consultations = Consultation::count();
      return view('app')->with([
				'subscribers'=>$subscribers,
				'transactions'=>$transactions,
				'consultations'=>$consultations,
				]);
    }
    
    public function profile(){
        return view('/profile');
    }
    public function patients(){
        return view('/patients');
    }
    public function doctors(){
        return view('/doctors');
    }
    public function schedules(){
        return view('/schedules');
    }
    public function reports(){
        return view('/reports');
    }
    public function search(){
        return view('/search');
    }
    public function message(){
        return view('/message');
    }



    //Get
    public function allpatient(){
        $patients = User::where('role','patient')->orderBy('status', 'desc')->paginate(40);
        return response()->json($patients, 200);
    }
    public function alldoctor(){
        $doctors = User::where('role','doctor')->orderBy('status', 'desc')->paginate(20);
        return response()->json($doctors, 200);
    }
    public function getAllDoctor(){
        $doctors = User::where('role','doctor')->get();
        return response()->json($doctors, 200);
    }
    public function patient(User $user){
        return view('patient')->with('user', $user);
    }
    public function doctor(User $user){
        return view('doctor')->with('user', $user);
    }


    //Post Patient from admin dashboard

    public function addpatient(Request $request){
        $request->validate([
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required|email',
            'phone'=>'required|numeric',
            'gender'=>'required',
            'dob'=>'required',
            'country'=>'required',
            'state'=>'required',
            'address'=>'required'
        ]);
        $dob = Carbon::parse($request->dob)->toDateString();
        $user = User::create([
            'name'=>$request->firstname.' '.$request->lastname,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'gender'=>$request->gender,
            'dob'=> $dob,
            'country'=>$request->country['name'],
            'state'=>$request->state['name'],
            'address'=>$request->address,
            'username'=>Str::random(8),
            'password'=>bcrypt(Str::random(10)),
            'plan'=>'Free',
            'role'=>'patient',

        ]);
        return response()->json('Patient added successfully', 200);
    }

    //Post doctor to admin
    public function adddoctor(Request $request){
        
        $dob = Carbon::parse($request->dob)->toDateString();
        User::create([
            'name'=>$request->firstname.' '.$request->lastname,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'gender'=>$request->gender,
            'dob'=>$dob,
            'country'=>$request->country['name'],
            'state'=>$request->state['name'],
            'address'=>$request->address,
            'role'=>'doctor',
            'password'=>bcrypt($request->phone),
        ])->doctors()->create([
            'residency'=>$request->residency,
            'fellowship'=>$request->fellowship,
            'license_country'=>$request->license_country['name'],
            'license_state'=>$request->license_state['name'],
            'license'=>$request->license,
            'expiration'=>$request->expiration,
            'specialty'=>$request->specialty,
            'degree'=>$request->degree,

        ]);
        return response()->json('Doctor added successfully', 200);

        
    }


    public function formatUsername($uname){
        
        $firstChar = ['/'];
        $secondChar = ['~'];
        $firstString = str_replace($firstChar,'',$uname);
        $secondString = str_replace($secondChar, '-', $firstString);
        
        if(strpos($uname, '~') !== false){
            return $secondString;
        }else{
            return $firstString;
        }

    }

    public function formatFirstname($fname){

        $getFirstInArray = explode(' ', $fname)[0]; 
        return $getFirstInArray;
    }

    
    public function formatNewUsername($fname){

        $getFirstInArray = explode(' ', $fname)[0]; 
        $uuname =  $getFirstInArray.Str::random(3) ;
        return strtolower($uuname);
    }

    public function formatLastname($fname){

        $getFirstInArray = explode(' ', $fname)[1]; 
        if($getFirstInArray){
            return $getFirstInArray;
        }else{
            return "Lastname";
        }
    }

    public function lowerCase($value){
        return strtolower($value);
    }


    public function importpatient(Request $request){

        $request->validate([
            'file'=>'required|mimes:xls,xlsx'
        ]);
        
       $data = Excel::toCollection(new UsersImport(), $request->file('file'));

        foreach($data[0] as $user){
            
            // $gender = rand(0,1) ? 'Male' : 'Female';
            // $new_fname = $this->formatFirstname($user[1]);
            // $new_lname = $this->formatLastname($user[2]);
            $email = $this->lowerCase($user[0]);
            $new_uname = $this->formatUsername($user[3]);


             $user_data = [
                'password'=>'Ca12345678@',
                'email'=>$email,
                'firstname'=>$user[1],
                'lastname'=>$user[2],
                'username'=>$new_uname,
                'dateOfBirth'=>'2020-02-13T00:00:00.000-05:00',
                'gender'=>strtolower($user[4]),
                'phonenumber'=>$user[5],
                'street'=>$user[6],
                'city'=>$user[7],
                'state'=>$user[8],
                'country'=>$user[9],
              ];
            //   dd($user_data);
            $job = new RegisterAPI($user_data);
            dispatch($job);
             
        //   User::create([
        //     'name' => $user[0],
        //     'email'=> $user[1],
        //     'username' => Str::random(8),
        //     'password' => bcrypt($user[2]),
        //     'phone' =>  $user[2],
        //     // 'group' =>  $user[3],
        //     'role'  =>  'patient',
        //     'active' => '1',
        //   ]);
        }

       return response()->json('Patient upload was successful', 200);
    }


    public function exportpatient() 
    {
        return Excel::download(new UsersExport, time().'.xlsx');
    }
    public function exportdoctor() 
    {
        return Excel::download(new DoctorsExport, time().'.xlsx');
    }

    public function changepassword(Request $request){
        $user = User::find($request->id);
        $user->update([
            'password'=>bcrypt($request->password)
        ]);
        return response()->json('User password have been updated', 200);
    }

    public function deletepatient(Request $request){
        $user = User::find($request->id);
        $user->delete();
        return response()->json('Patient deleted successfully', 200);
    }

}
