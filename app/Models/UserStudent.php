<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserStudent extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_info_id',
        'university',
        'university_grade',
    ];

    /**
     * Get the user info that owns the user student.
     */
    public function userInfo(): BelongsTo
    {
        return $this->belongsTo(UserInfo::class);
    }
}
