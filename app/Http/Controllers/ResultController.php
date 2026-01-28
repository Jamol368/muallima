<?php

namespace App\Http\Controllers;

use App\Enums\SubjectEnum;
use App\Enums\TestTypeEnum;
use App\Http\Requests\StoreResultRequest;
use App\Models\Answer;
use App\Models\Result;
use App\Models\ResultSession;
use App\Models\Subject;
use App\Models\Test;
use App\Models\TestType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ResultController extends Controller
{

    public function index()
    {
        $results = Result::where(['user_id' => Auth::id()])->latest()->limit(10)->get();

        return view('result.index', compact('results'));
    }

    public function detailedResult(Request $request, $resultId)
    {
        $result = Result::with('resultSession')
            ->where('id', $resultId)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $test_type = $result->testType()->first();
        $subject = $result->subject()->first();

        $session = $result->resultSession;

        if (!$session || $result->status !== 'completed') {
            abort(403, 'Test not finished yet or access denied');
        }

        $questions = Test::with('answers')
            ->whereIn('id', $session->questions ?? [])
            ->get()
            ->keyBy('id');

        $detailed_questions = collect();

        foreach ($session->true_answers as $questionId => $correctOptionId) {
            $question = $questions->get($questionId);
            if (!$question) continue;

            $selectedOptionId = $session->answers[$questionId] ?? null;

            $orderedOptionIds = $session->options[$questionId] ?? [];

            $options = collect($orderedOptionIds)->map(function ($optionId) use ($question, $selectedOptionId) {
                $option = $question->answers->firstWhere('id', $optionId);

                if (!$option) {
                    return null;
                }

                $isSelected = $option->id == $selectedOptionId;

                return [
                    'id'          => $option->id,
                    'option'      => $option->option,
                    'is_true'     => (bool) $option->is_true && $isSelected,
                    'is_selected' => $isSelected,
                ];
            })->filter()->values();

            $isCorrect = $selectedOptionId !== null && $selectedOptionId == $correctOptionId;

            $detailed_questions->push([
                'id'          => $question->id,
                'question'    => $question->question ?? '—',
                'options'     => $options,
                'is_correct'  => $isCorrect,
            ]);
        }

        return view('result.detailed', [
            'detailed_questions' => $detailed_questions,
            'test_type' => $test_type,
            'subject' => $subject,
        ]);
    }

    public function store(StoreResultRequest $request, string $test_type, string $subject)
    {
        $user = User::find(Auth::user()->getAuthIdentifier());

        DB::beginTransaction();

        try {

            if ($subject = Subject::findOrFail($subject) and
                $test_type_model = TestType::findOrFail($test_type)) {

                if ($user->userBalance->check($test_type_model->price) and
                    $questions = Test::check($subject->id, $test_type_model)) {

                    $trueAnswers = $questions->mapWithKeys(function ($question) {
                        $correct = $question->answers
                            ->where('is_true', true)
                            ->first();

                        return [
                            $question->id => $correct ? $correct->id : null
                        ];
                    })->filter();

                    $preparedQuestions = $questions->map(function ($question) {
                        $allOptions = $question->answers->shuffle();

                        return [
                            'id' => $question->id,
                            'question' => $question->question,
                            'options' => $allOptions->map(fn($opt) => [
                                'id' => $opt->id,
                                'option' => $opt->option,
                            ])->toArray(),
                            'display_order' => $allOptions->pluck('id')->toArray(),
                        ];
                    });

                    $result = new Result([
                        'user_id' => $user->id,
                        'test_type_id' => $test_type_model->id,
                        'subject_id' => $subject->id,
                    ]);
                    $result->save();

                    $result_session = new ResultSession([
                        'result_id' => $result->id,
                        'questions' => $questions->pluck('id')->toArray(),
                        'true_answers' => $trueAnswers,
                        'options' => $preparedQuestions->pluck('display_order', 'id')->toArray(),
                    ]);
                    $result_session->save();

                    DB::commit();

                    return view('test.index', [
                        'questions' => $preparedQuestions,
                        'test_type' => $test_type_model,
                        'subject' => $subject,
                        'result_session_id' => $result_session->id,
                    ]);
                }
                abort(404, 'Balansingiz yoki testlar soni yetarli emas.');
            }
            abort(404, 'Fan yoki test turi noto\'g\'ri tanlangan.');
        } catch (\Exception $e) {
            DB::rollback(); // Roll back the transaction if an error occurs
            throw $e;
        }
    }

    public function storeForTopic(StoreResultRequest $request, int $subject_id, int $topic_id)
    {
        $user = User::query()->find(Auth::user()?->getAuthIdentifier());

        DB::beginTransaction();

        try {
            if ($subject = Subject::query()->find($subject_id) and
                $test_type = TestType::query()->find(TestTypeEnum::TEST_TYPE_TOPIC->value)) {

                if ($user->userBalance->check($test_type->price) and
                    $questions = Test::checkForTopic($topic_id, $subject->id, $test_type)) {

                    $trueAnswers = $questions->mapWithKeys(function ($question) {
                        $correct = $question->answers
                            ->where('is_true', true)
                            ->first();

                        return [
                            $question->id => $correct ? $correct->id : null
                        ];
                    })->filter();

                    $preparedQuestions = $questions->map(function ($question) {
                        $allOptions = $question->answers->shuffle();

                        return [
                            'id' => $question->id,
                            'question' => $question->question,
                            'options' => $allOptions->map(fn($opt) => [
                                'id' => $opt->id,
                                'option' => $opt->option,
                            ])->toArray(),
                            'display_order' => $allOptions->pluck('id')->toArray(),
                        ];
                    });

                    $result = new Result([
                        'user_id' => $user->id,
                        'test_type_id' => $test_type->id,
                        'subject_id' => $subject->id,
                    ]);
                    $result->save();

                    $result_session = new ResultSession([
                        'result_id' => $result->id,
                        'questions' => $questions->pluck('id')->toArray(),
                        'true_answers' => $trueAnswers,
                        'options' => $preparedQuestions->pluck('display_order', 'id')->toArray(),
                    ]);
                    $result_session->save();

                    DB::commit();

                    return view('test.index', [
                        'questions' => $preparedQuestions,
                        'test_type' => $test_type,
                        'subject' => $subject,
                        'result_session_id' => $result_session->id,
                    ]);
                }
                abort(404, 'Balansingiz yoki testlar soni yetarli emas.');
            }
            abort(404, 'Fan yoki test turi noto\'g\'ri tanlangan.');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function storeForNaturalScience(StoreResultRequest $request)
    {
        $user = User::query()->find(Auth::user()?->getAuthIdentifier());

        DB::beginTransaction();

        try {
            if ($subject = Subject::query()->find(SubjectEnum::NATURAL_SCIENCE->value) and
                $test_type = TestType::query()->find(TestTypeEnum::TEST_TYPE_TOPIC->value)) {

                if ($user->userBalance->check($test_type->price) and
                    $questions = Test::checkForNaturalScience($subject->id, $test_type, $request->degree, $request->part)) {

                    $trueAnswers = $questions->mapWithKeys(function ($question) {
                        $correct = $question->answers
                            ->where('is_true', true)
                            ->first();

                        return [
                            $question->id => $correct ? $correct->id : null
                        ];
                    })->filter();

                    $preparedQuestions = $questions->map(function ($question) {
                        $allOptions = $question->answers->shuffle();

                        $correctIds = $question->answers
                            ->where('is_true', true)
                            ->pluck('id')
                            ->toArray();

                        return [
                            'id' => $question->id,
                            'question' => $question->question,
                            'options' => $allOptions->map(fn($opt) => [
                                'id' => $opt->id,
                                'option' => $opt->option,
                            ])->toArray(),
                            'display_order' => $allOptions->pluck('id')->toArray(),
                        ];
                    });

                    $result = new Result([
                        'user_id' => $user->id,
                        'test_type_id' => $test_type->id,
                        'subject_id' => $subject->id,
                    ]);
                    $result->save();

                    $result_session = new ResultSession([
                        'result_id' => $result->id,
                        'questions' => $questions->pluck('id')->toArray(),
                        'true_answers' => $trueAnswers,
                        'options' => $preparedQuestions->pluck('display_order', 'id')->toArray(),
                    ]);
                    $result_session->save();

                    DB::commit();

                    return view('test.index', [
                        'questions' => $preparedQuestions,
                        'test_type' => $test_type,
                        'subject' => $subject,
                        'result_session_id' => $result_session->id,
                    ]);
                }
                abort(404, 'Balansingiz yoki testlar soni yetarli emas.');
            }
            abort(404, 'Fan yoki test turi noto\'g\'ri tanlangan.');
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }
}
