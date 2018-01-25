<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Company extends Authenticatable
{
    //
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'country', 'field', 'address', 'url',
        'overview', 'image'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function portfolio()
    {
        return $this->hasMany('App\Models\CompanyPortfolio');
    }

    public function contact()
    {
        return $this->hasMany('App\Models\CompanyContact');
    }
}
