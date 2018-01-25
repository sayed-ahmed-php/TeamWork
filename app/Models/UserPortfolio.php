<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPortfolio extends Model
{
    //
    protected $fillable = ['user_id', 'title', 'image', 'description', 'category', 'url'];
}
