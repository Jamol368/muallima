<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ResultSession extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'result_id',
        'questions',
        'answers',
        'true_answers',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'questions' => 'array',
        'answers' => 'array',
        'true_answers' => 'array',
    ];

    /**
     * Get the result that owns the result session.
     */
    public function result(): BelongsTo
    {
        return $this->belongsTo(Result::class);
    }
}
