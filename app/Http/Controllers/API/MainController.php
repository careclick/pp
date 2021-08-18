<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller as Controller;
use Illuminate\Support\Facades\Auth;
use App\Country;
use App\State;
use App\User;
use App\Rating;
use App\Day;
use App\Schedule;
use Validator;
use Carbon\Carbon;


class MainController extends Controller
{
    public function getCountries(){

        $countries = Country::all();
        return response()->json($countries);
    }

    public function getStates(Request $request){

        $states = State::where('country_id', $request->country_id)->get();
        return response()->json($states);
    }

    public function username(Request $request){

        $username = User::where('username', $request->username)->exists();
        return response()->json($username);
    }
    public function email(Request $request){

        $email = User::where('email', '=', $request->email)->exists();
        return response()->json($email);
		}
		

		//Update User's Profile

    public function update(Request $request){
      $userId = auth()->user->id;

        $validator = Validator::make($request->all(), [
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'username' => 'required|string',
            'phone' => 'required|numeric',
            'address' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($userId)],
				]);

				if($request->hasFile('picture')){

            //Delete previous image
            $prevImagePath = public_path('images/'.auth()->user()->picture);
            if(file_exists($prevImagePath) && auth()->user()->picture != null){
                unlink($prevImagePath);
            }

            //Upload new image
            $image = $request->file('picture');
            $filename = time().$image->getClientOriginalName();
            $image->move('images', $filename);
        }
        if($validator->fails()){
            return response()->json($validator->errors(), 422);       
				}
				
				$user = User::find(auth()->id()); //Get User
        $user->update([
            'name'=>$request->firstname .' '. $request->lastname,
            'username'=>$request->username,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'email'=>$request->email,
            'about'=> $request->about ? $request->about : '',
            'picture'=>$filename ?? auth()->user()->picture,
				]);
				$user->notifications()->update([
            'consultation'=>$request->consultation,
            'message'=>$request->message,
            'offer'=>$request->offer,
            'sms'=>$request->sms,
        ]);

        return response()->json('Data updated successfully', 200);
     }

		//Get Days
		public function getDays(){
			$days = Day::all()->map->only(['id','name']);
			return response()->json($days,200);
		}

		//Get Doctor's Schedule

		public function getDoctorSchedule(Request $request){
     $schedules = Schedule::where('user_id', $request->id)->with('user')->get();
		 return response()->json($schedules, 200);
      }
        
        public function getSchedule(Request $request){
            $schedule = Schedule::where('id', $request->id)->where('user_id', $request->doctor_id)->first();
            return response()->json($schedule, 200);
        }

        //Update Schedule

        public function updateSchedule(Request $request){
					
				$validator = Validator::make($request->all(), [
					'schedule_id'=>'required',
					'doctor_id'=>'required',
					'start_date'=>'required',
					'end_date'=>'required',
					'start_time'=>'required',
					'end_time'=>'required',
					'duration'=>'required',
					'days'=>'required | array'
					]);
					
				if($validator->fails()){
          return response()->json($validator->errors(), 422);       
        }
        
        $slot = $this->splitTime($request->start_time, $request->end_time, $request->duration);

        $schedule = Schedule::where('id', $request->schedule_id)->where('user_id', $request->doctor_id)->first();
        $schedule->update([
        'user_id'=>$request->doctor_id,
				'start_date'=>$request->start_date,
				'end_date'=>$request->end_date,
        'start_time'=>$request->start_time,
        'days'=>$request->days,
				'end_time'=>$request->end_time,
        'duration'=>$request->duration,
        'slot'=>$slot,

            ]);
        return response()->json('Schedule updated successfully', 200);

        }

				//Search User

				public function searchUser(Request $request){
					$result = [];
					if($request->option == 'all' && $request->search !== null){
							$query = User::where('name','LIKE','%'.$request->search.'%')->where('role','!=','admin')->get();
							$result = $query;
						}elseif($request->option == 'doctor' && $request->search == null){
							$query = User::where('name','LIKE','%'.$request->search.'%')->where('role','=','doctor')->get();
							$result = $query;
            }else{
						$query = User::where('role', $request->option)->where('name','LIKE','%'.$request->search.'%')->where('role','!=','admin')->get();
						$result = $query;
					}
					return response()->json($result, 200);
				}


		//Post Doctor's Schedule
      public function postSchedule(Request $request){
            
			$validator = Validator::make($request->all(), [
				'start_date'=>'required | date_format:Y-m-d\TH:i:s.\0\0\0\Z',
				'end_date'=>'required | date_format:Y-m-d\TH:i:s.\0\0\0\Z',
				'start_time'=>'required',
				'end_time'=>'required',
				'duration'=>'required',
				'days'=>'required | array'
			]);
			if($validator->fails()){
				return response()->json($validator->errors(), 422);       
			}
			$start__date = Carbon::parse($request->start_date)->toDateString();
			$end__date = Carbon::parse($request->end_date)->toDateString();
			$start__time = Carbon::parse($request->start_time)->toTimeString();
			$end__time = Carbon::parse($request->end_time)->toTimeString();

      $slot = $this->splitTime($start__time, $end__time, $request->duration);
      
			$schedule = Schedule::create([
        'user_id'=>$request->user_id,
				'start_date'=>$start__date,
				'end_date'=>$end__date,
        'start_time'=>$start__time,
        'days'=>$request->days,
				'end_time'=>$end__time,
				'duration'=>$request->duration,
        'slot'=> $slot,
        ]);
        return response()->json('Schedule added successfully', 200);
    }

    //Time Slot function
    function splitTime($StartTime, $EndTime, $Duration="15"){
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

		//Delete Schedule
    public function deleteSchedule(Request $request){
        $schedule = Schedule::find($request->id);
        $schedule->delete();
        return response()->json('Schedule deleted',200);
    }


    //All Docotors
    public function allDoctors(){
        $doctors = User::where('role','doctor')->orderBy('status', 'desc')->paginate(20);
        return response()->json($doctors, 200);
    }

    //Get all users
    public function getUsers(){
        $users = User::all();
        return response()->json($users,200);
    }

    //Persist rating
    public function ratingStore(User $user){
      $validator = Validator::make(request()->all(), [
        'rating'=>'required | in:1,2,3,4,5'
      ]);

      if($validator->fails()){
				return response()->json($validator->errors(), 422);       
      }
      
     $count = Rating::where('user_id',auth()->id())->where('doctor_id',request('doctor_id'))->count();

     if($count > 0){
        Rating::where('user_id', auth()->id())
          ->where('doctor_id',request('doctor_id'))
          ->update(['rating'=> request('rating')]);
      }else{
        Rating::create([
          'user_id'=> auth()->id(),
          'rating'=> request('rating'),
          'doctor_id'=> request('doctor_id'),
        ]);
      }
      return response()->json('You have successfully rated a doctor');

    }

    public function getDoctorRating(){

      $rating = Rating::where('user_id',auth()->id)->where('doctor_id', request()->doctor_id)->value('rating');
      return response()->json($rating);

    }
}