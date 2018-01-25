<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainCategory extends Model
{
    //
    protected $fillable = ['name', 'overview'];

    public function skill()
    {
        return $this->hasMany('App\Models\MainSkill');
    }
}
