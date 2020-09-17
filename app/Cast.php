<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cast extends Model
{
     protected $fillable = [
        'name',
        'parent_id',
       
    ];
}
