<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserPupil extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_info_id',
        'school_id',
        'school_grade',
    ];

    /**
     * Get the user info that owns the user pupil.
     */
    public function userInfo(): BelongsTo
    {
        return $this->belongsTo(UserInfo::class);
    }
}
