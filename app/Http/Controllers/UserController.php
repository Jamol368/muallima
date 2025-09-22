<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\Subject;
use App\Models\TeacherCategory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function edit(int $user_id)
    {
        return view('user.update', [
            'user' => User::query()->findOrFail($user_id),
            'subjects' => Subject::query()->orderBy('name')->get(),
            'teacher_categories' => TeacherCategory::query()->orderBy('name')->get(),
        ]);
    }

    public function update(UpdateUserRequest $request)
    {
        $validated = $request->validated();
        $user = User::query()->where(['id' => Auth::id()])->update($validated);

        return redirect()->route('profile.edit', [
            'user_id' => Auth::id(),
        ]);
    }
}
