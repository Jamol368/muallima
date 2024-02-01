<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class School extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'town_id',
        'name',
        'slug',
    ];

    /**
     * Get the town associated with the school.
     */
    public function town(): HasOne
    {
        return $this->hasOne(Town::class, 'id', 'town_id');
    }
}
