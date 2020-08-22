<?php

namespace App;

use App\BaseModel;
use Spatie\Translatable\HasTranslations;
class Team extends BaseModel
{
    use HasTranslations;
    
    public $translatable = ['name', 'job'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'job', 'image',
    ];
}
