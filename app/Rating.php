<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = ['user_id','rating','doctor_id'];


    public function user(){
        return $this->belongsTo('App\User','user_id');
    }

    public function doctor(){
        return $this->belongsTo('App\User','doctor_id');
    }
}
