<?php

namespace App;

use App\BaseModel;
use Spatie\Translatable\HasTranslations;


class Category extends BaseModel
{
    use HasTranslations;
    
    public $translatable = ['name'];

    protected $fillable = [
        'name', 'description'
    ];


    public function news() {
        return $this->hasMany('App\News');
    }
}
