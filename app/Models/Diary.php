<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Diary extends Model
{
    protected $table = 'diaries';

    protected $fillable = ['user_id', 'title', 'content', 'access_range', 'reaction_like', 'image'];

    public $timestamps = true;

    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'diary_id', 'id');
    }
    public function diaryView()
    {
        return $this->hasOne('App\Models\DiaryView', 'diary_id', 'id');
    }
    public function reactionDiary()
    {
        return $this->hasMany('App\Models\ReactionDiary', 'diary_id', 'id');
    }
    public function profile()
    {
        return $this->belongsTo('App\Models\Profile', 'user_id', 'user_id');
    }
}
