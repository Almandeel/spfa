<?php

namespace App;

use App\BaseModel;
use Spatie\Translatable\HasTranslations;
class Page extends BaseModel
{
    use HasTranslations;
    
    public $translatable = ['title', 'description'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'image', 'page_order'
    ];

    public static function show($name){
        return self::where('name', $name)->first();
    }
}
