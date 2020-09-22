<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'alternate_email',
        'gender',
        'dob',
        'marital_status',
        'phone',
        'alternate_phone',
        'family_phone_number',
        'landline',
        'whatsup',
        'password',
        'status',
        'is_vip',
        'role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userProfile(): HasOne
    {
        return $this->hasOne(\App\Models\UserProfile::class);
    }

    public function swyamber()
    {
        return $this->belongsToMany('App\Models\Swyamber');
    }
}
