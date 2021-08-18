<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class transaction extends Model
{
    protected $fillable = ['user_id','amount','paymenttype','txref','status'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function scopeThisYear($query){
        return $query->where('created_at', '>=' , Carbon::now()->firsOfYear());
    }
}
