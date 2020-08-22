<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'news_id', 'comment', 'user_id'
    ];

    public function news() {
        return $this->belongsTo('App\News', 'news_id');
    }
}
