<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;

class Diary extends Model
{
    protected $table = 'diaries';

    protected $fillable = ['user_id', 'title', 'content', 'access_range', 'reaction_like'];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }
    public function diaryView()
    {
        return $this->hasOne('App\Models\DiaryView', 'diary_id', 'id');
    }
    public function reactionDiary()
    {
        return $this->hasMany('App\Models\ReactionDiary', 'diary_id', 'id');
    }    

    public static function filterDiary()
    {
        $diaries = app(Pipeline::class)
        ->send(Diary::query())
        ->through([
            \App\QueryFilters\Active::class,
            \App\QueryFilters\Title::class,
            \App\QueryFilters\Sort::class,
        ])
        ->thenReturn()
        ->get();

        // dd($diaries);
        return $diaries;
    }
}
