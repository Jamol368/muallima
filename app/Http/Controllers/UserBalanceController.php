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
        $user = User::query()->with(['userBalance', 'userInfo' => function ($query) {
            $query->with('province', 'town');
        }])->find(Auth::id())?->toArray();
        $teacher = $pupil = null;

        if ($user['user_info']['user_type_id'] === 1) {
            $teacher = UserTeacher::query()
                ->with('subject', 'teacherCategory')
                ->where('user_info_id', $user['user_info']['id'])
                ->get()->toArray()[0];
        } else if ($user['user_info']['user_type_id'] === 2) {
            $pupil = UserPupil::query()
                ->with('school')
                ->where('user_info_id', $user['user_info']['id'])
                ->get()->toArray()[0];
        }

        return view('user_balance.update', [
            'user' => $user,
            'teacher' => $teacher,
            'pupil' => $pupil,
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
