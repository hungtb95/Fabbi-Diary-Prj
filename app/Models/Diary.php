<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diary extends Model
{
    protected $table = 'diaries';

    protected $fillable = ['user_id', 'title', 'content', 'access_range', 'reaction_like'];

    public $timestamps = true;

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
