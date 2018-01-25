<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserEducation extends Model
{
    //
    protected $fillable = ['user_id', 'school', 'start', 'end', 'degree'];
}
