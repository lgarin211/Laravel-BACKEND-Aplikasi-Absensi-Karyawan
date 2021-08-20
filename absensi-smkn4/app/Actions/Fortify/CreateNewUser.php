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
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

            // dd($input);
        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'nip' => $input['nip'],
            'jabatan' => $input['Jabatan'],
            'jenis_kelamin' => $input['jenis_kelamin'],
            'tempat_l' => $input['tempat_l'],
            'tgl_l' => $input['tgl_l'],
            'notel' => $input['notel'],
            'jumlah_jam_kerja'=>0,
            'profile_photo_path'=>$input['profile_photo_path'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
