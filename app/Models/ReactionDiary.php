<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReactionDiary extends Model
{
    protected $table = 'diary_react';

    protected $fillable = ['user_id', 'diary_id'];

    public $timestamps = true;
}
