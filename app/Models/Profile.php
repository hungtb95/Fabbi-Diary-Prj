<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $table = 'profiles';

    protected $fillable = ['user_id', 'first_name', 'last_name', 'address', 'phone_number', 'country', 'birthday', 'avatar'];

    protected $appends = ['full_name'];

    public function getFullNameAttribute()
    {
        return $this->first_name. ' ' .$this->last_name;
    }

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
