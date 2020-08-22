<?php

namespace App;

use App\BaseModel;
use Spatie\Translatable\HasTranslations;
class Work extends BaseModel
{
    use HasTranslations;
    
    public $translatable = ['name', 'description'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'image', 'category_id'
    ];

    public function category() {
        return $this->belongsTo('App\Category');
    }
}
