<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            // 'name' => ['required', 'string', 'max:255'],
            'fname' => ['required', 'string', 'max:255'],
            'lname' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'phno' => [ 'required' , 'regex:/^((\+92)|(0092))-{0,1}\d{3}-{0,1}\d{7}$|^\d{11}$|^\d{4}-\d{7}$/' ],
            // 'pfp' => ['required|mimes:jpg,jpeg,png'],
        ])->validate();

        // $file_name= time.('_').$input->file->getCLientOriginalName();
        // $file_path= $input->file('file') ->storeAs('uploads', $file_name,'public');

        return User::create([
            // 'name' => $input['name'],
            'fname' => $input['fname'],
            'lname' => $input['lname'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'phno' => $input['phno'],
            // 'pfp' => $file_name,
            // 'pfpname' => time().'_'.$input->file->getCLientOriginalName(),
            // $input['pfpname'],
            // 'pfppath' => '/storage/'.$file_path,

        ]);
    }
}
