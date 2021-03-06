<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

    protected $fillable = ['consultation','message','offer','sms'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
