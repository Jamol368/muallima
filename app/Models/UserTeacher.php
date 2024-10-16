<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserTeacher extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_info_id',
        'teacher_category_id',
        'subject_id',
    ];

    /**
     * Get the user info that owns the user teacher.
     */
    public function userInfo(): BelongsTo
    {
        return $this->belongsTo(UserInfo::class);
    }

    /**
     * Get the subject that owns the user teacher.
     */
    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    /**
     * Get the teacher category that owns the user teacher.
     */
    public function teacherCategory(): BelongsTo
    {
        return $this->belongsTo(TeacherCategory::class);
    }
}
