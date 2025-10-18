<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Branch;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laraeast\LaravelSettings\Facades\Settings;
use Illuminate\Auth\Access\HandlesAuthorization;

class BranchPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any branches.
     *
     * @param \App\Models\User|null $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.branches');
    }

    /**
     * Determine whether the user can view the branch.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Branch $branch
     * @return mixed
     */
    public function view(User $user, Branch $branch)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.branches');
    }

    /**
     * Determine whether the user can create branches.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.branches');
    }

    /**
     * Determine whether the user can update the branch.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Branch $branch
     * @return mixed
     */
    public function update(User $user, Branch $branch)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.branches'))
            && ! $this->trashed($branch);
    }

    /**
     * Determine whether the user can delete the branch.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Branch $branch
     * @return mixed
     */
    public function delete(User $user, Branch $branch)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.branches'))
            && ! $this->trashed($branch);
    }

    /**
     * Determine whether the user can view trashed branches.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewAnyTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.branches'))
            && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can view the trashed branch.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Branch $branch
     * @return mixed
     */
    public function viewTrash(User $user, Branch $branch)
    {
        return $this->view($user, $branch)
            && $branch->trashed();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Branch $branch
     * @return mixed
     */
    public function restore(User $user, Branch $branch)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.branches'))
            && $this->trashed($branch);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Branch $branch
     * @return mixed
     */
    public function forceDelete(User $user, Branch $branch)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.branches'))
            && $this->trashed($branch)
            && Settings::get('delete_forever');
    }

    /**
     * Determine wither the given branch is trashed.
     *
     * @param $branch
     * @return bool
     */
    public function trashed($branch)
    {
        return $this->hasSoftDeletes() && method_exists($branch, 'trashed') && $branch->trashed();
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
            array_keys((new \ReflectionClass(Branch::class))->getTraits())
        );
    }
}
