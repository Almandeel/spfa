<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Teacher extends Model
{
    use HasTranslations;

    public $translatable = ['name', 'description'];

    
    protected $fillable = [
        'name', 'description', 'image'
    ];
}
