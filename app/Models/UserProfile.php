<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserProfile extends Model
{
    protected $fillable = [
        'user_id',
        'height',
        'religion',
        'cast_id',
        'sub_cast_id',
        'folio_no',
        'mother_tongue',
        'country',
        'state',
        'city',
        'annual_income',
        'profile_picture1',
        'profile_picture2',
        'weight',
        'personal_detail',
        'body_type',
        'complexion',
        'challanged',
        'education',
        'higher_education',
        'college',
        'school',
        'about_career',
        'employed_in',
        'occupation',
        'organization_name',
        'birth_time',
        'birth_place',
        'mangalik_status',
        'non_veg',
        'drink',
        'smoke',
        'own_house',
        'own_car',
        'father_name',
        'mother_name',
        'father_occupation',
        'mother_occupation',
        'gothra',
        'family_income',
        'living_with_parents',
        'abroad_willing',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}


