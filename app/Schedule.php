<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = ['user_id','start_date','end_date','start_time','end_time','days','duration','slot'];


    public function user(){
        return $this->belongsTo('App\User');
    }


    protected $casts = [
        'days' => 'array',
        'slot' => 'array',
    ];
}
