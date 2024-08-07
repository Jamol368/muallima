<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreResultRequest;
use App\Http\Requests\UpdateResultRequest;
use App\Models\Answer;
use App\Models\Result;
use App\Models\ResultSession;
use App\Models\Subject;
use App\Models\Test;
use App\Models\TestType;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $results = Result::where('user_id', Auth::user()->getAuthIdentifier())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('result.index', [
            'results' => $results,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreResultRequest $request, string $test_type)
    {
        $user = User::find(Auth::user()->getAuthIdentifier());

        DB::beginTransaction();

        try {

            if ($subject = Subject::where(['slug' => Session::get('user_id_' . $user->id)])->first() and
                $test_type_model = TestType::where(['slug' => $test_type])->first()) {

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

    /**
     * Display the specified resource.
     */
    public function show(Result $result)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Result $result)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateResultRequest $request, Result $result)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Result $result)
    {
        //
    }
}
