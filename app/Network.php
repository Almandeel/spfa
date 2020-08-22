<?php

namespace App;

use App\BaseModel;
use Spatie\Translatable\HasTranslations;
class Network extends BaseModel
{
    use HasTranslations;
    public const TYPES = [
        'facebook', 
        'twitter',     
        'youtube',     
        'instagram',     
        'whatsapp',
        'address', 
        'phone',
        'email'
    ];
    
    public $translatable = ['value'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'type', 'value'
    ];
}
