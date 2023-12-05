<?php

namespace App\Actions\Fortify;
<<<<<<< HEAD
 
=======

>>>>>>> f8bb313e88bb214f9768cae625425b51b8dff16d
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();
    
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'NumDocumento' => $input['NumDocumento'],
            'TipoDocumento' => $input['TipoDocumento'],
            'Telefono' => $input['Telefono'],
            'Direccion' => $input['Direccion'],
            'FechaNacimiento' => $input['FechaNacimiento'],
            'apellidos' => $input['apellidos'],
            'rol' => $input['rol'],
        ]);
    
        // Asignar el rol al usuario después de crearlo
        $user->assignRole('User');
    
        return $user;
    }
}
