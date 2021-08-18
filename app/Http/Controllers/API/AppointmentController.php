<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Schedule;

class AppointmentController extends Controller
{
    public function getAppointments(Request $request){

        if($request->when == 'anytime'){
            $schedules = Schedule::with('user')->get();
            return response()->json($schedules, 200);
        }


    }
}
