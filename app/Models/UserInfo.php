<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserInfo extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'province_id',
        'town_id',
        'user_type_id',
    ];

    /**
     * Get the province associated with the user info.
     */
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }

    /**
     * Get the town associated with the user info.
     */
    public function town(): BelongsTo
    {
        return $this->belongsTo(Town::class, 'town_id', 'id');
    }

    /**
     * Get the town associated with the user info.
     */
    public function userType(): BelongsTo
    {
        return $this->belongsTo(UserType::class, 'user_type_id', 'id');
    }
}
