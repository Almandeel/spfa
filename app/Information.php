<?php

namespace App;

use App\BaseModel;
use Spatie\Translatable\HasTranslations;
class Information extends BaseModel
{
    use HasTranslations;
    
    public $translatable = ['title', 'description'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'informations';
    protected $fillable = [
        'title', 'description', 'image'
    ];
}
