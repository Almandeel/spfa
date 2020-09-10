<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'phone', 'name', 'graduation_Date', 'university', 'country', 'adjective','status', 'image'
    ];
    /**
     * The attributes that should be hidden for arrays.
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

    public function employee(){
        return $this->belongsTo('App\Employee', 'employee_id');
    }

    public function commits() {
        return $this->hasMany('App\Comment');
    }

    public function courseBooking() {
        return $this->hasMany('App\course_booking');
    }


}
