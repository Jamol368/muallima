<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Subject;
use App\Models\TeacherCategory;
use App\Models\User;
use App\Models\UserBalance;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Throwable;

class RegisterController extends Controller
{
    /**
     * Show the registration form.
     */
    public function showRegistrationForm(): View
    {
        $teacher_types = TeacherCategory::query()->get();
        $subjects = Subject::query()->get();

        return view('auth.register', [
            'teacher_types' => $teacher_types,
            'subjects' => $subjects,
        ]);
    }

    /**
     * Handle a registration request.
     * @throws Throwable
     */
    public function register(RegisterRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        try {
            DB::beginTransaction();
            $user = User::create([
                'name' => $validated['name'],
                'phone' => $validated['phone'],
                'teacher_category_id' => $validated['teacher_category'],
                'subject_id' => $validated['subject'],
                'password' => Hash::make($validated['password']),
            ]);

            UserBalance::create([
                'user_id' => $user->id,
            ]);

            auth()->login($user);

            DB::commit();

            return redirect()->route('user-balance.edit');
        } catch (Throwable $throwable) {
            DB::rollBack();
            throw $throwable;
        }
    }
}
