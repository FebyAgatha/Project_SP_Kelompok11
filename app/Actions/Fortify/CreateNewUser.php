<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'min:4', 'max:50'],
            'email' => ['required', 'string', 'max:50', 'unique:users', 'email:rfc,dns'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            'address' => ['required', 'string', 'min:10', 'max:150'],
            'phonenum'=> ['required', 'regex:/^08\d{9,10}$/', 'numeric', 'digits_between:3,15'],
            'postalcode' => ['required', 'digits_between:5,6', 'numeric'],
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'address' => $input['address'],
            'phonenum' => $input['phonenum'],
            'postalcode' => $input['postalcode'],
        ]);
    }
}
