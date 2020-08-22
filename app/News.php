<?php

namespace App;

use App\BaseModel;
use Spatie\Translatable\HasTranslations;
class News extends BaseModel
{
    use HasTranslations;
    
    public $translatable = ['name', 'description'];

    protected $fillable = [
        'name', 'description', 'image', 'author_id', 'comments_status', 'news_status', 'category_id'
    ];

    public function author() {
        return $this->belongsTo('App\User', 'author_id');
    }

    public function category() {
        return $this->belongsTo('App\Category', 'category_id');
    }
}
