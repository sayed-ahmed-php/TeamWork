<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyContact extends Model
{
    protected $fillable = ['com_id', 'contact_id'];

    public function com()
    {
        return $this->belongsTo('App\Models\Company');
    }
}
