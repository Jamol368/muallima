<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserBalanceRequest;
use App\Http\Requests\UpdateUserBalanceRequest;
use App\Models\User;
use App\Models\UserBalance;
use App\Models\UserPupil;
use App\Models\UserTeacher;
use Illuminate\Support\Facades\Auth;

class UserBalanceController extends Controller
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
    public function store(StoreUserBalanceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserBalance $userBalance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $user_model = User::query()->with(['userBalance', 'subject', 'teacherCategory'])->find(Auth::id());
        $user = $user_model->toArray();
        $user['phone'] = $user_model->formatPhone();
        $user['user_balance']['balance'] = $user_model->userBalance->formatMoney();

        return view('user_balance.update', [
            'user' => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserBalanceRequest $request)
    {
        return redirect()->route('pay', [
            'paysys' => 'click',
            'key' => Auth::user()->getAuthIdentifier(),
            'amount' => $request->post('amount'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserBalance $userBalance)
    {
        //
    }
}
