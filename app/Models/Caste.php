<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caste extends Model
{
    protected $fillable = [
        'name',
        'parent_id',

    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subCastes()
    {
        return $this->hasMany(Caste::class, 'parent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function Caste()
    {
        return $this->belongsTo(Caste::class, 'parent_id');
    }
}
