<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    protected $fillable = ['user_id', 'diary_id', 'content'];

    public $timestamps = true;
    
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function diary()
    {
        return $this->belongsTo('App\Models\Diary');
    }
}
