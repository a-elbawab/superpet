<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('Pages list'));
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function view(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('Pages show'));
    }

    /**
     * Determine whether the user can create models.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('Pages create'));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function update(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('Pages update'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function delete(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('Pages delete'));
    }
}
