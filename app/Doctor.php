<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = ['user_id','residency','fellowship','specialty','license_country','license_state','license','expiration','degree'];



    public function user(){
        return $this->belongsTo('App\User');
    }

}
