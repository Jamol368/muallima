<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTestTypeRequest;
use App\Http\Requests\UpdateTestTypeRequest;
use App\Models\TestType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TestTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (Auth::user()->userBalance->balance < 1000) {
            return redirect()->route('user-balance.edit');
        }

        Session::put('user_id_' . Auth::user()->getAuthIdentifier(), $request->name);
        $testType = TestType::orderBy('order')->get();

        return view('test_type.index', [
            'testType' => $testType,
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
    public function store(StoreTestTypeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TestType $testType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TestType $testType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTestTypeRequest $request, TestType $testType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TestType $testType)
    {
        //
    }
}
