<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Option;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laraeast\LaravelSettings\Facades\Settings;
use Illuminate\Auth\Access\HandlesAuthorization;

class OptionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any options.
     *
     * @param \App\Models\User|null $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.options');
    }

    /**
     * Determine whether the user can view the option.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Option $option
     * @return mixed
     */
    public function view(User $user, Option $option)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.options');
    }

    /**
     * Determine whether the user can create options.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.options');
    }

    /**
     * Determine whether the user can update the option.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Option $option
     * @return mixed
     */
    public function update(User $user, Option $option)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.options'))
            && ! $this->trashed($option);
    }

    /**
     * Determine whether the user can delete the option.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Option $option
     * @return mixed
     */
    public function delete(User $user, Option $option)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.options'))
            && ! $this->trashed($option);
    }

    /**
     * Determine whether the user can view trashed options.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewAnyTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.options'))
            && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can view the trashed option.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Option $option
     * @return mixed
     */
    public function viewTrash(User $user, Option $option)
    {
        return $this->view($user, $option)
            && $option->trashed();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Option $option
     * @return mixed
     */
    public function restore(User $user, Option $option)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.options'))
            && $this->trashed($option);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Option $option
     * @return mixed
     */
    public function forceDelete(User $user, Option $option)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.options'))
            && $this->trashed($option)
            && Settings::get('delete_forever');
    }

    /**
     * Determine wither the given option is trashed.
     *
     * @param $option
     * @return bool
     */
    public function trashed($option)
    {
        return $this->hasSoftDeletes() && method_exists($option, 'trashed') && $option->trashed();
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
            array_keys((new \ReflectionClass(Option::class))->getTraits())
        );
    }
}
