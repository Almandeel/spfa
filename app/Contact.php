<?php

namespace App;

use App\BaseModel;
use Spatie\Translatable\HasTranslations;
class Contact extends BaseModel
{
    use HasTranslations;
    public const TYPES = ['address', 'phone', 'fax', 'email'];
    public const ICONS = [
        'address' => 'map-marker',
        'phone' => 'phone',
        'fax' => 'phone',
        'email' => 'at'
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
