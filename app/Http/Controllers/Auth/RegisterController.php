<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Province;
use App\Models\School;
use App\Models\Subject;
use App\Models\TeacherCategory;
use App\Models\Town;
use App\Models\User;
use App\Models\UserBalance;
use App\Models\UserInfo;
use App\Models\UserPupil;
use App\Models\UserTeacher;
use App\Models\UserType;
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
        $provinces = Province::query()->get();
        $towns = Town::query()->get();
        $user_types = UserType::query()->orderBy('id')->get();
        $teacher_types = TeacherCategory::query()->get();
        $subjects = Subject::query()->get();
        $schools = School::query()->get();

        return view('auth.register', [
            'provinces' => $provinces,
            'towns' => $towns,
            'user_types' => $user_types,
            'teacher_types' => $teacher_types,
            'subjects' => $subjects,
            'schools' => $schools,
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
                'password' => Hash::make($validated['password']),
            ]);

            UserBalance::create([
                'user_id' => $user->id,
            ]);

            $userInfo = UserInfo::create([
                'user_id' => $user->id,
                'province_id' => $validated['province'],
                'town_id' => $validated['town'],
                'user_type_id' => $validated['type'],
            ]);

            if ($userInfo->user_type_id == 1) {
                UserTeacher::create([
                    'user_info_id' => $userInfo->id,
                    'teacher_category_id' => $validated['teacher_category'],
                    'subject_id' => $validated['subject'],
                ]);
            } else if ($userInfo->user_type_id == 2) {
                UserPupil::create([
                    'user_info_id' => $userInfo->id,
                    'school_id' => $validated['school'],
                    'school_grade' => $validated['pupil_grade'],
                ]);
            }

            auth()->login($user);

            DB::commit();

            return redirect()->route('home');
        } catch (Throwable $throwable) {
            DB::rollBack();
            throw $throwable;
        }
    }
}
