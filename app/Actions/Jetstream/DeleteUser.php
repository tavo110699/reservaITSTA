<?php

namespace App\Actions\Jetstream;

use App\Models\User;

use Laravel\Jetstream\Contracts\DeletesUsers;

class DeleteUser implements DeletesUsers
{
    /**
     * Delete the given user.
     *
     * @param  mixed  $user
     * @return void
     */
    public function delete($user)
    {
        $user->getPersonalDates()->delete();
        $user->getProfesionalDates()->delete();
        $user->deleteProfilePhoto();
        $user->tokens->each->delete();
        $user->delete();
    }
}
