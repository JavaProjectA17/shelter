<?php

namespace App\Policies;

use App\User;
use App\Animal;
use Illuminate\Auth\Access\HandlesAuthorization;

class AnimalPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the animal.
     *
     * @param  \App\User  $user
     * @param  \App\Animal  $animal
     * @return mixed
     */
//    public function view(User $user, Animal $animal)
//    {
//        //
//    }

    /**
     * Determine whether the user can create animals.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role == 'admin';
    }

    /**
     * Determine whether the user can update the animal.
     *
     * @param  \App\User  $user
     * @param  \App\Animal  $animal
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->role == 'admin';
    }

    /**
     * Determine whether the user can delete the animal.
     *
     * @param  \App\User  $user
     * @param  \App\Animal  $animal
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->role == 'admin';
    }
}
