<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainSkill extends Model
{
    //
    protected $fillable = ['cat_id', 'name', 'overview'];

    public function cat()
    {
        return $this->belongsTo('App\Models\MainCategory');
    }
}
