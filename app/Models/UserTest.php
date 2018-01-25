<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTest extends Model
{
    protected $fillable = ['user_id', 'name', 'category', 'time', 'degree'];
}
