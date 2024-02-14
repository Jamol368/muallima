<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Result extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'test_type_id',
        'subject_id',
        'true_answers',
        'wrong_answers',
        'score',
    ];

    /**
     * Get the user that owns the result.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the test type that owns the result.
     */
    public function testType(): BelongsTo
    {
        return $this->belongsTo(TestType::class);
    }

    /**
     * Get the subject that owns the result.
     */
    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    /**
     * Get the result session associated with the result.
     */
    public function resultSession(): HasOne
    {
        return $this->hasOne(ResultSession::class);
    }
}
