<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class course_booking extends Model
{
    protected $table = "course_bookings";

    protected $fillable = [
        'name', 'gender' , 'degree', 'phone', 'goal', 'course_id', 'user_id'
    ];
}
