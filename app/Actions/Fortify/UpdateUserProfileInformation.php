<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'phno' => [ 'required' , 'regex:/^((\+92)|(0092))-{0,1}\d{3}-{0,1}\d{7}$|^\d{11}$|^\d{4}-\d{7}$/' ],

        ])->validateWithBag('updateProfileInformation');
        // $img = time().'.'.$input->pfp->extension();
        // $input->pfp->move(public_path('images'),$img);
        // $input->image->storeAs('images', $img);

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'fname' => $input['fname'],
                'lname' => $input['lname'],
                'email' => $input['email'],
                'phno' => $input['phno'],
                // 'pfp' => $input['pfp'],
                'balance' => $input['balance'],
            ])->save();
        }

        return 'User Profile updated';
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'fname' => $input['fname'],
            'lname' => $input['lname'],
            'email' => $input['email'],
            'phno' => $input['phno'],
            // 'pfp' => $input['pfp'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
