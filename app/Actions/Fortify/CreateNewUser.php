<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\PersonalDates;
use App\Models\ProfesionalDates;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
        ])->validate();

        $user =User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);

        PersonalDates::create([
            'idUser'=> $user->id,
            'name'=> $input['name'],
            'apPaterno'=> $input['apPaterno'],
            'apMaterno'=> $input['apMaterno'],
            'Telefono'=> $input['Telefono'],
            'RFC'=> $input['RFC'],
            'CURP'=> $input['CURP'],
            'fechaNacimiento'=> $input['fechaNacimiento'],
        ]);

        ProfesionalDates::create([
            'idUser'=> $user->id,
            'gradoAcademico' => $input['gradoAcademico'],
            'carreraProfesional'=> $input['carreraProfesional'],
            'puesto'=> $input['puesto'],

        ]);

        return $user;
    }
}
