<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lead extends Model
{
    //use SoftDeletes;

    protected $fillable = [
         'name',
            'email',
            'gender',
           'dob',
            'phone',
            'comment',
            'source',
            'lead_status',
            'assign_user',
        
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
