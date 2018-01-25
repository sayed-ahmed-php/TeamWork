<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['user_id', 'text'];

    public function comment()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function image()
    {
        return $this->hasMany('App\Models\PostImage');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
