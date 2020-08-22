<?php

namespace App;

use App\BaseModel;
use Spatie\Translatable\HasTranslations;
class Slider extends BaseModel
{
    use HasTranslations;
    
    public $translatable = ['title', 'description'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'image', 'viewable'
    ];
}
