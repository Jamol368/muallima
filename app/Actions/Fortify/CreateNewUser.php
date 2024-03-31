<?php

namespace App\Actions\Fortify;

use App\Models\Team;
use App\Models\User;
use App\Models\UserBalance;
use App\Models\UserInfo;
use App\Models\UserPupil;
use App\Models\UserTeacher;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        $input['phone'] = $input['code'].$input['phone'];

        Validator::make($input, [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'surname' => ['required', 'string', 'min:5', 'max:255'],
            'middle_name' => ['required', 'string', 'min:5', 'max:255'],
            'phone' => ['required', 'numeric', 'digits:9', 'unique:users'],
            'code' => ['required', 'numeric', 'digits:2'],
            'type' => ['required', 'integer'],
            'province' => ['required', 'integer'],
            'town' => ['required', 'integer'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        return DB::transaction(function () use ($input) {
            return tap(User::create([
                'name' => $input['name'],
                'phone' => $input['phone'],
                'surname' => $input['surname'],
                'middle_name' => $input['middle_name'],
                'password' => Hash::make($input['password']),
            ]), function (User $user) use ($input) {
                UserBalance::create([
                    'user_id' => $user->id,
                ]);
                tap(UserInfo::create([
                    'user_id' => $user->id,
                    'province_id' => $input['province'],
                    'town_id' => $input['town'],
                    'user_type_id' => $input['type'],
                ]), function (UserInfo $userInfo) use ($input) {
                    if ($userInfo->user_type_id == 1) {
                        UserTeacher::create([
                            'user_info_id' => $userInfo->id,
                            'teacher_category_id' => $input['teacher_category'],
                            'subject_id' => $input['subject'],
                        ]);
                    } else if ($userInfo->user_type_id == 2) {
                        UserPupil::create([
                            'user_info_id' => $userInfo->id,
                            'school_id' => $input['school'],
                            'school_grade' => $input['pupil_grade'],
                        ]);
                    }
                });
            });
        });
    }

    /**
     * Create a personal team for the user.
     */
    protected function createTeam(User $user): void
    {
        $user->ownedTeams()->save(Team::forceCreate([
            'user_id' => $user->id,
            'name' => explode(' ', $user->name, 2)[0]."'s Team",
            'personal_team' => true,
        ]));
    }
}
