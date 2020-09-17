<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Membership extends Model
{
   // use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'caste',
        'cost',
        'total_profile_limit',
        'daily_profile_limit',
        'total_contact_limit',
        'daily_contact_limit',
    ];

  
}
