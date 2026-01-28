<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTestRequest;
use App\Http\Requests\UpdateTestRequest;
use App\Models\ResultSession;
use App\Models\Test;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreTestRequest $request)
    {
        $result_session_id = $request->post('result_session_id');
        $result_session = ResultSession::find($result_session_id);

        $result = $result_session->result;


        $array = [];
        $true_answers = 0;

        foreach ($result_session->true_answers as $key => $item) {
            $value = $request->post('mat-radio-group-' . $key);
            $array[$key] = $value;

            if ($value == $item) {
                $true_answers++;
            }
        }

        $result_session->answers = $array;
        $result->true_answers = $true_answers;
        $result->wrong_answers = sizeof($result_session->questions) - $true_answers;
        $result->score = $result->testType->score * $true_answers;
        $result->status = 'completed';
        $result->finished_at = now();

        $result->update();
        $result_session->update();

        Session::flash('preventBack', true);

        return redirect()
            ->route('result.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Test $test)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Test $test)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTestRequest $request, Test $test)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Test $test)
    {
        //
    }
}
