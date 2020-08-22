<?php

namespace App;


use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasTranslations;

    public $translatable = ['site_name', 'site_description', 'maintenance_message'];

    protected $fillable = [
        'site_name',
        'site_email',
        'site_email_password',
        'site_logo',
        'site_description',
        'maintenance',
        'maintenance_message'
    ];
}
