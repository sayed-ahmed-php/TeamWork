<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name', 'leader'];

    public function user()
    {
        return $this->hasMany('App\Models\UserTeam');
    }
}
