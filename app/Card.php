<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $fillable = ['cardnumber','cardtype','brand','expmon','expyr'];


    public function user(){
        return $this->belongsTo(User::class);
    }


}
