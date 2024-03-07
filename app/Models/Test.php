<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Test extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'test_type_id',
        'subject_id',
        'question',
    ];

    /**
     * Get the test type that owns the test.
     *
     * @return BelongsTo
     */
    public function testType(): BelongsTo
    {
        return $this->belongsTo(TestType::class, 'test_type_id', 'id')
            ->orderBy('name');
    }

    /**
     * Get the subject that owns the test.
     *
     * @return BelongsTo
     */
    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id')
            ->orderBy('name');
    }

    /**
     * Get the answers for the test.
     */
    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }

    public static function check(int $subject_id, TestType $test_type): array|int
    {
        $test_indexes = Test::where(['subject_id' => $subject_id, 'test_type_id' => $test_type->id])->inRandomOrder()->take($test_type->questions)->pluck('id')->toArray();
        return count($test_indexes)==$test_type->questions?$test_indexes:0;
    }
}
