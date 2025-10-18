<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Manager;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Access\HandlesAuthorization;

class ManagerPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any managers.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Managers list');
    }

    /**
     * Determine whether the user can view the manager.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Manager $manager
     * @return mixed
     */
    public function view(User $user, Manager $manager)
    {
        return $user->isAdmin() || $user->is($manager) || $user->hasPermissionTo('Managers show');
    }

    /**
     * Determine whether the user can create managers.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Managers create');
    }

    /**
     * Determine whether the user can update the manager.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Manager $manager
     * @return mixed
     */
    public function update(User $user, Manager $manager)
    {
        return ($user->isAdmin() || $user->is($manager) || $user->hasPermissionTo('Managers update')) && ! $this->trashed($manager);
    }

    /**
     * Determine whether the user can update the type of the manager.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Manager $manager
     * @return mixed
     */
    public function updateType(User $user, Manager $manager)
    {
        return $user->isAdmin() && $user->isNot($manager) || $user->hasPermissionTo('Managers update');
    }

    /**
     * Determine whether the user can delete the manager.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Manager $manager
     * @return mixed
     */
    public function delete(User $user, Manager $manager)
    {
        return ($user->isAdmin() && $user->isNot($manager) || $user->hasPermissionTo('Managers delete')) && ! $this->trashed($manager);
    }

    /**
     * Determine whether the user can view trashed managers.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('Managers delete')) && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Manager $manager
     * @return mixed
     */
    public function restore(User $user, Manager $manager)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('Managers delete')) && $this->trashed($manager);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Manager $manager
     * @return mixed
     */
    public function forceDelete(User $user, Manager $manager)
    {
        return ($user->isAdmin() && $user->isNot($manager) || $user->hasPermissionTo('Managers delete')) && $this->trashed($manager);
    }

    /**
     * Determine wither the given manager is trashed.
     *
     * @param $manager
     * @return bool
     */
    public function trashed($manager)
    {
        return $this->hasSoftDeletes() && method_exists($manager, 'trashed') && $manager->trashed();
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
            array_keys((new \ReflectionClass(Manager::class))->getTraits())
        );
    }
}
