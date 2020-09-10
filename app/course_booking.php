<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class course_booking extends Model
{
    protected $table = "course_bookings";

    protected $fillable = [
        'name', 'gender' , 'degree', 'phone', 'goal', 'course_id', 'price','user_id'
    ];

    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
