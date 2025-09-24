<?php

namespace App\Http\Controllers;

use App\Enums\TestTypeEnum;
use App\Http\Requests\StoreResultRequest;
use App\Models\Answer;
use App\Models\Result;
use App\Models\ResultSession;
use App\Models\Subject;
use App\Models\Test;
use App\Models\TestType;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ResultController extends Controller
{

    public function index()
    {
        $results = Result::where(['user_id' => Auth::id()])->get();

        return view('result.index', compact('results'));
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

                    $question_ids = $questions->pluck('id')->toArray();

                    $answers = Answer::whereIn('test_id', $question_ids)->where('is_true', true)->get();
                    $answers = $answers->sortby(function ($answer) use ($question_ids) {
                        return array_search($answer->test_id, $question_ids);
                    });

                    $true_answers = $answers->pluck('id');

                    $result = new Result([
                        'user_id' => $user->id,
                        'test_type_id' => $test_type_model->id,
                        'subject_id' => $subject->id,
                    ]);
                    $result->save();

                    $result_session = new ResultSession([
                        'result_id' => $result->id,
                        'questions' => $question_ids,
                        'true_answers' => $true_answers,
                    ]);
                    $result_session->save();

                    DB::commit(); // Commit the transaction if all operations are successful

                    return view('test.index', [
                        'questions' => $questions,
                        'test_type' => $test_type_model,
                        'subject' => $subject,
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

                    $question_ids = $questions->pluck('id')->toArray();

                    $answers = Answer::query()->whereIn('test_id', $question_ids)->where('is_true', true)->get();
                    $answers = $answers->sortby(function ($answer) use ($question_ids) {
                        return array_search($answer->test_id, $question_ids);
                    });

                    $true_answers = $answers->pluck('id');

                    $result = new Result([
                        'user_id' => $user->id,
                        'test_type_id' => $test_type->id,
                        'subject_id' => $subject->id,
                    ]);
                    $result->save();

                    $result_session = new ResultSession([
                        'result_id' => $result->id,
                        'questions' => $question_ids,
                        'true_answers' => $true_answers,
                    ]);
                    $result_session->save();

                    DB::commit();

                    return view('test.index', [
                        'questions' => $questions,
                        'test_type' => $test_type,
                        'subject' => $subject,
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
