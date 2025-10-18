<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any Roles.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can view the Role.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Role $role
     * @return mixed
     */
    public function view(User $user, Role $role)
    {
        return $user->isAdmin() || $user->is($role->user);
    }

    /**
     * Determine whether the user can create Roles.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can update the Role.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Role $role
     * @return mixed
     */
    public function update(User $user, Role $role)
    {
        return $user->isAdmin() || $user->is($role->user);
    }

    /**
     * Determine whether the user can delete the Role.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Role $role
     * @return mixed
     */
    public function delete(User $user, Role $role)
    {
        return $user->isAdmin() || $user->is($role->user);
    }

    /**
     * Determine whether the user can view trashed Roles.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('Roles delete')) && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Role $role
     * @return mixed
     */
    public function restore(User $user, Role $role)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('Roles delete')) && $this->trashed($role);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Role $role
     * @return mixed
     */
    public function forceDelete(User $user, Role $role)
    {
        return ($user->isAdmin() && $user->isNot($role) || $user->hasPermissionTo('Roles delete')) && $this->trashed($role);
    }

    /**
     * Determine wither the given Role is trashed.
     *
     * @param $role
     * @return bool
     */
    public function trashed($role)
    {
        return $this->hasSoftDeletes() && method_exists($role, 'trashed') && $role->trashed();
    }

    /**
     * Determine wither the model use soft deleting trait.
     *
     * @return bool
     */
    public function hasSoftDeletes()
    {
        return in_array(
            SoftDeletes::class,
            array_keys((new \ReflectionClass(Role::class))->getTraits())
        );
    }
}
