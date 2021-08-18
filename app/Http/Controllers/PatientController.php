<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index(){
      return view('patient.app');
		}
		public function message(){
      return view('patient.message');
    }
    public function appointments(){
      return view('patient.appointments');
    }
    public function transactions(){
      return view('patient.transactions');
    }
    public function doctors(){
      return view('patient.doctors');
    }
    public function profile(){
      return view('patient.profile');
    }
    public function medical_records(){
      return view('patient.medical');
    }
    public function consultations(){
      return view('patient.consultations');
    }
}
