<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyPortfolio extends Model
{
    //
    protected $fillable = ['company_id', 'title', 'image', 'description', 'category', 'url'];
}
