<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Traits\UsesUuid;
use Carbon\Carbon;
use App\Rating;


class User extends Authenticatable
{
    use Notifiable,UsesUuid,HasApiTokens;

    protected $with = ['notifications','cards','transactions','doctors','schedules','ratings'];
    protected $keyType = 'string';
    public $incrementing = false;

    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','username','phone','dob','gender','country',
        'state','address','plan','role','about','active','picture','group','status','session_id'
    ];


    // public function getPictureAttribute($value)
    // {
    //     return file_exists(asset('images/'.$value)) && $value !== null ? asset('images/'.$value) : false;
    // }

    //Methods
    public function getCreatedAtNameAttribute($value)
    {
        return Carbon::createFromFormat('H:i:s',$value);
    }
    
    //Get firstname
    public function firstname(){

        $first_name = explode(' ', $this->name)[0];
        return $first_name;

    }
    
    //Get Rating Average
    public function rating(User $user){
        return Rating::where('user_id', $user->id)->avg('rating');
    }
    
    //Rating for doctor for a particular user
    public function ratingForUser(User $user){

        return $this->ratings()->where('user_id', $user->id)->value('rating');
    }

    // Return Role
    public function isRole(){
        return $this->role;
    }

    //Relationships
    public function notifications(){
        return $this->hasOne(Notification::class);
    }
    public function doctors(){
        return $this->hasOne(Doctor::class);
    }
    public function cards(){
        return $this->hasMany(Card::class);
    }
    public function transactions(){
        return $this->hasMany(Transaction::class);
    }
    public function schedules(){
        return $this->hasMany(Schedule::class);
    }
    public function consultations(){
        return $this->hasMany(Consultation::class);
    }
    public function ratings(){
        return $this->hasMany(Rating::class, 'doctor_id');
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
