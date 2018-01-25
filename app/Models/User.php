<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname', 'lname', 'email', 'password', 'phone', 'country', 'field', 'skill', 'degree',
        'state', 'overview', 'image', 'show'
    ];

    protected $appends = ['name'];

    public function getNameAttribute(){
        $name = $this -> fname . ' ' .$this -> lname;
        return $name;
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function certification()
    {
        return $this->hasMany('App\Models\UserCertification');
    }

    public function portfolio()
    {
        return $this->hasMany('App\Models\UserPortfolio');
    }

    public function education()
    {
        return $this->hasMany('App\Models\UserEducation');
    }

    public function skill()
    {
        return $this->hasMany('App\Models\UserSkill');
    }

    public function test()
    {
        return $this->hasMany('App\Models\UserTest');
    }

    public function contact()
    {
        return $this->hasMany('App\Models\UserContact');
    }

    public function team()
    {
        return $this->hasMany('App\Models\UserTeam');
    }

    public function post()
    {
        return $this->hasMany('App\Models\Post');
    }

    public function comment()
    {
        return $this->hasMany('App\Models\Comment');
    }
}
