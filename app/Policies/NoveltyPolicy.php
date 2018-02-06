<?php

namespace App\Policies;

use App\User;
use App\Novelty;
use Illuminate\Auth\Access\HandlesAuthorization;

class NoveltyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the novelty.
     *
     * @param  \App\User  $user
     * @param  \App\Novelty  $novelty
     * @return mixed
     */
    public function view(User $user, Novelty $novelty)
    {
        //
    }

    /**
     * Determine whether the user can create novelties.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        return $user->role == 'admin';
    }

    /**
     * Determine whether the user can update the novelty.
     *
     * @param  \App\User  $user
     * @param  \App\Novelty  $novelty
     * @return mixed
     */
    public function update(User $user, Novelty $novelty)
    {
        //
    }

    /**
     * Determine whether the user can delete the novelty.
     *
     * @param  \App\User  $user
     * @param  \App\Novelty  $novelty
     * @return mixed
     */
    public function delete(User $user, Novelty $novelty)
    {
        //
    }
}
