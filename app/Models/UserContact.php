<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserContact extends Model
{
    protected $fillable = ['user_id', 'contact_id'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
