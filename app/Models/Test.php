<?php

namespace App\Models;

use App\Enums\TestTypeEnum;
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
        'topic_id',
        'degree',
        'part',
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
     * Get the topic that owns the test.
     *
     * @return BelongsTo
     */
    public function topic(): BelongsTo
    {
        return $this->belongsTo(Topic::class, 'topic_id', 'id')
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

    public static function check(int $subject_id, TestType $test_type): object|int
    {
        if($test_type->id == 1) {
            $test_type->questions += 10;
            $tests = Test::getAttestationQuestions($subject_id, $test_type);
        } else {
            $tests = Test::getQuestions($subject_id, $test_type);
        }

        return Test::ckeckQuestionsCount($tests, $test_type->questions);
    }

    public static function getAttestationQuestions(int $subject_id, TestType $test_type): object|int
    {
        $tests = Test::where('subject_id', $subject_id)
            ->where(function ($query) use ($test_type) {
                $query->where('test_type_id', $test_type->id)
                    ->orWhere('test_type_id', TestTypeEnum::TEST_TYPE_TOPIC->value);
            })
            ->inRandomOrder()
            ->take($test_type->questions-15)
            ->get();

        $tests = $tests->concat(Test::where(['subject_id' => 12, 'test_type_id' => 2])
            ->inRandomOrder()
            ->take(15)
            ->get()
        );

        return $tests;
    }

    public static function getQuestions(int $subject_id, TestType $test_type): object|int
    {
        $tests = Test::where(['subject_id' => $subject_id, 'test_type_id' => $test_type->id])
            ->inRandomOrder()
            ->take($test_type->questions)
            ->get();

        return $tests;
    }

    public static function checkForTopic(int $topic_id, int $subject_id, TestType $test_type): object|int
    {
        $tests = self::getTopicQuestions($topic_id, $subject_id, $test_type);

        return self::ckeckQuestionsCount($tests, $test_type->questions);
    }

    public static function getTopicQuestions(int $topic_id, int $subject_id, TestType $test_type): object|int
    {
        $tests = Test::where(['topic_id' => $topic_id, 'subject_id' => $subject_id, 'test_type_id' => $test_type->id])
            ->inRandomOrder()
            ->take($test_type->questions)
            ->get();

        return $tests;
    }

    public static function checkForNaturalScience(int $subject_id, TestType $test_type, int $degree, int $part): object|int
    {
        $tests = self::getNaturalScienceQuestions($subject_id, $test_type, $degree, $part);

        return self::ckeckQuestionsCount($tests, $test_type->questions);
    }

    public static function getNaturalScienceQuestions(int $subject_id, TestType $test_type, int $degree, int $part): object|int
    {
        $tests = Test::where(['subject_id' => $subject_id, 'test_type_id' => $test_type->id, 'degree' => $degree, 'part' => $part])
            ->inRandomOrder()
            ->take($test_type->questions)
            ->get();

        return $tests;
    }

    public static function storeMixedQuize(int $subject_id, TestType $test_type): object|int
    {
        return self::where(['subject_id' => $subject_id, 'test_type_id' => $test_type->id])
            ->inRandomOrder()
            ->take($test_type->questions)
            ->get();
    }

    public static function ckeckQuestionsCount($questions, $expectedQuestionCount)
    {
        return count($questions)==$expectedQuestionCount?$questions:0;
    }
}
