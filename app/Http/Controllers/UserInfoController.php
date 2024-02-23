<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserInfoRequest;
use App\Http\Requests\UpdateUserInfoRequest;
use App\Models\UserInfo;
use App\Models\UserPupil;
use App\Models\UserStudent;
use App\Models\UserTeacher;
use function Termwind\render;

class UserInfoController extends Controller
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
    public function store(StoreUserInfoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UserInfo $userInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserInfo $userInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserInfoRequest $request, UserInfo $userInfo)
    {
        $validated = $request->validated();

        $userInfo->update([
            'province_id' => $validated['province'],
            'town_id' => $validated['town'],
            'user_type_id' => $validated['type'],
        ]);

        if ($validated['type'] == 1) {
            $userTeacher = UserTeacher::where(['user_info_id' => $userInfo->id])->first();
            $userTeacher->update([
                'teacher_category_id' => $validated['teacher_category'],
                'subject_id' => $validated['subject'],
            ]);
        } elseif ($validated['type'] == 2) {
            $userPupil = UserPupil::where(['user_info_id' => $userInfo->id])->first();
            $userPupil->update([
                'school_id' => $validated['school'],
                'school_grade' => $validated['pupil_grade'],
            ]);
        } else {
            $userStudent = UserStudent::where(['user_info_id' => $userInfo->id])->first();
            $userStudent->update([
                'university' => $validated['university'],
                'university_grade' => $validated['university_grade'],
            ]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserInfo $userInfo)
    {
        //
    }
}
