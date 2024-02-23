<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
     * Get the province that owns the user info.
     */
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'province_id', 'id');
    }

    /**
     * Get the town that owns the user info.
     */
    public function town(): BelongsTo
    {
        return $this->belongsTo(Town::class, 'town_id', 'id');
    }

    /**
     * Get the user type that owns the user info.
     */
    public function userType(): BelongsTo
    {
        return $this->belongsTo(UserType::class, 'user_type_id', 'id');
    }

    /**
     * Get the user that owns the user info.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the user pupil associated with the user info.
     *
     * @return HasOne
     */
    public function userPupil(): HasOne
    {
        return $this->hasOne(UserPupil::class);
    }

    /**
     * Get the user teacher associated with the user info.
     *
     * @return HasOne
     */
    public function userTeacher(): HasOne
    {
        return $this->hasOne(UserTeacher::class);
    }

    /**
     * Get the user student associated with the user info.
     *
     * @return HasOne
     */
    public function userStudent(): HasOne
    {
        return $this->hasOne(UserStudent::class);
    }
}
