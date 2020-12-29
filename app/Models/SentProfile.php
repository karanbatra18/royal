<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SentProfile extends Model
{
    protected $fillable = [
        'user_id',
        'receiver_id',
    ];

}
