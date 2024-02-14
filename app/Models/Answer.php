<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Answer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'test_id',
        'option',
        'is_true',
    ];

    /**
     * Get the test that owns the answer.
     */
    public function test(): BelongsTo
    {
        return $this->belongsTo(Test::class);
    }
}
