<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    protected $fillable = ['occupation','lmp','bp','weight',
    'complaint','hc','past_medical','surgical_history','drug_history','treatment_plan'];

    public function doctor(){
        return $this->belongsTo('App\User', 'doctor_id');
    }

    public function patient(){
        return $this->belongsTo('App\User', 'patient_id');
    }
}
