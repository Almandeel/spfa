<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Course extends Model
{
    use HasTranslations;

    public $translatable = ['name', 'description'];

    
    protected $fillable = [
        'name', 'description', 'intro', 'teacher_id', 'price', 'from_date', 'to_date', 'time', 'discount', 'max_student'
    ];

    public function teacher() {
        return $this->belongsTo('App\Teacher', 'teacher_id');
    }

    public function students() {
        return $this->hasMany('App\course_booking');
    }
    
}
