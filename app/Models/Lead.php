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
        'alternate_email',
        'phone',
        'alternate_phone',
        'comment',
        'source',
        'lead_status',
        'assign_user',
        'gender',
        'dob',
        'country',
        'state',
        'city',
        'hot',
        'facebook_url',
        'linkedin_url'
                  
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
