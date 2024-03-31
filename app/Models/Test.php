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
        'primary_subject_id',
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
     * Get the subject if exists that owns the test.
     *
     * @return BelongsTo
     */
    public function primarySubject(): BelongsTo
    {
        return $this->belongsTo(Subject::class)->withDefault();
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
        if($subject_id == 1)
            return Test::checkForPrimaryTest($subject_id, $test_type);
        $test_indexes = Test::where(['subject_id' => $subject_id, 'test_type_id' => $test_type->id])->inRandomOrder()->take($test_type->questions)->pluck('id')->toArray();
        return count($test_indexes)==$test_type->questions?$test_indexes:0;
    }

    public static function checkForPrimaryTest(int $subject_id, TestType $test_type): array|int
    {
        $test_indexes_1 = Test::where(['subject_id' => $subject_id, 'test_type_id' => $test_type->id, 'primary_subject_id' => 1])
            ->inRandomOrder()
            ->take(10)
            ->pluck('id')
            ->toArray();

        $test_indexes_2 = Test::where(['subject_id' => $subject_id, 'test_type_id' => $test_type->id, 'primary_subject_id' => 2])
            ->inRandomOrder()
            ->take(5)
            ->pluck('id')
            ->toArray();

        $test_indexes_3 = Test::where(['subject_id' => $subject_id, 'test_type_id' => $test_type->id, 'primary_subject_id' => 3])
            ->inRandomOrder()
            ->take(5)
            ->pluck('id')
            ->toArray();

        $test_indexes_4 = Test::where(['subject_id' => $subject_id, 'test_type_id' => $test_type->id, 'primary_subject_id' => 4])
            ->inRandomOrder()
            ->take(5)
            ->pluck('id')
            ->toArray();

        $test_indexes_5 = Test::where(['subject_id' => $subject_id, 'test_type_id' => $test_type->id, 'primary_subject_id' => 5])
            ->inRandomOrder()
            ->take(2)
            ->pluck('id')
            ->toArray();

        $test_indexes_6 = Test::where(['subject_id' => $subject_id, 'test_type_id' => $test_type->id, 'primary_subject_id' => 6])
            ->inRandomOrder()
            ->take(3)
            ->pluck('id')
            ->toArray();

        $test_indexes_7 = Test::where(['subject_id' => $subject_id, 'test_type_id' => $test_type->id, 'primary_subject_id' => 7])
            ->inRandomOrder()
            ->take(5)
            ->pluck('id')
            ->toArray();

        $primary_indexes = Test::where(['subject_id' => 10, 'test_type_id' => 10, 'primary_subject_id' => 8])
            ->inRandomOrder()
            ->take(15)
            ->pluck('id')
            ->toArray();

        $result_1  = array_merge($test_indexes_1, $test_indexes_2);
        $result_2  = array_merge($test_indexes_3, $test_indexes_4);
        $result_3  = array_merge($test_indexes_5, $test_indexes_6);
        $result_5  = array_merge($result_1, $result_2);
        $result_6  = array_merge($result_3, $test_indexes_7);
        $test_indexes  = array_merge($result_5, $result_6);
        $result  = array_merge($test_indexes, $primary_indexes);

        return count($result)==$test_type->questions+10?$result:0;
    }
}
