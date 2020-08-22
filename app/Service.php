<?php

namespace App;

use App\BaseModel;
use Spatie\Translatable\HasTranslations;
class Service extends BaseModel
{
    use HasTranslations;
    
    public $translatable = ['name', 'description'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'icon'
    ];
}
