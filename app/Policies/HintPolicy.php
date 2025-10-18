<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Hint;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laraeast\LaravelSettings\Facades\Settings;
use Illuminate\Auth\Access\HandlesAuthorization;

class HintPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any hints.
     *
     * @param \App\Models\User|null $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.hints');
    }

    /**
     * Determine whether the user can view the hint.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Hint $hint
     * @return mixed
     */
    public function view(User $user, Hint $hint)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.hints');
    }

    /**
     * Determine whether the user can create hints.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.hints');
    }

    /**
     * Determine whether the user can update the hint.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Hint $hint
     * @return mixed
     */
    public function update(User $user, Hint $hint)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.hints'))
            && ! $this->trashed($hint);
    }

    /**
     * Determine whether the user can delete the hint.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Hint $hint
     * @return mixed
     */
    public function delete(User $user, Hint $hint)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.hints'))
            && ! $this->trashed($hint);
    }

    /**
     * Determine whether the user can view trashed hints.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewAnyTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.hints'))
            && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can view the trashed hint.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Hint $hint
     * @return mixed
     */
    public function viewTrash(User $user, Hint $hint)
    {
        return $this->view($user, $hint)
            && $hint->trashed();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Hint $hint
     * @return mixed
     */
    public function restore(User $user, Hint $hint)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.hints'))
            && $this->trashed($hint);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Hint $hint
     * @return mixed
     */
    public function forceDelete(User $user, Hint $hint)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.hints'))
            && $this->trashed($hint)
            && Settings::get('delete_forever');
    }

    /**
     * Determine wither the given hint is trashed.
     *
     * @param $hint
     * @return bool
     */
    public function trashed($hint)
    {
        return $this->hasSoftDeletes() && method_exists($hint, 'trashed') && $hint->trashed();
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
            array_keys((new \ReflectionClass(Hint::class))->getTraits())
        );
    }
}
