<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiaryView extends Model
{
    protected $table = 'diary_views';

    protected $fillable = ['diary_id', 'view'];

    public $timestamps = true;
    
    public function diary()
    {
        return $this->belongsTo('App\Models\Diary');
    }
}
