<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Swyamber extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'title',
        'place',
        'swyamber_date',
        'swyamber_time',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }
}
