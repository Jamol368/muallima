<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  array<string, mixed>  $input
     */
    public function update(User $user, array $input): void
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'integer', Rule::unique('users')->ignore($user->id)],
//            'province_id' => ['required', 'integer'],
//            'town_id' => ['required', 'integer'],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if ($input['phone'] !== $user->phone &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
//            $user->userInfo->forceFill([
//                'province_id' => $input['province_id'],
//                'town_id' => $input['town_id'],
//            ])->save();

            $user->forceFill([
                'name' => $input['name'],
                'phone' => $input['phone'],
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  array<string, string>  $input
     */
    protected function updateVerifiedUser(User $user, array $input): void
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
