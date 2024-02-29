<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserBalanceRequest;
use App\Http\Requests\UpdateUserBalanceRequest;
use App\Models\UserBalance;
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
        return view('user_balance.update', [
            'userBalance' => Auth::user()->userBalance,
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
