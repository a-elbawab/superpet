<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Input;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laraeast\LaravelSettings\Facades\Settings;
use Illuminate\Auth\Access\HandlesAuthorization;

class InputPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any inputs.
     *
     * @param \App\Models\User|null $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.inputs');
    }

    /**
     * Determine whether the user can view the input.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Input $input
     * @return mixed
     */
    public function view(User $user, Input $input)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.inputs');
    }

    /**
     * Determine whether the user can create inputs.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.inputs');
    }

    /**
     * Determine whether the user can update the input.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Input $input
     * @return mixed
     */
    public function update(User $user, Input $input)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.inputs'))
            && ! $this->trashed($input);
    }

    /**
     * Determine whether the user can delete the input.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Input $input
     * @return mixed
     */
    public function delete(User $user, Input $input)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.inputs'))
            && ! $this->trashed($input);
    }

    /**
     * Determine whether the user can view trashed inputs.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewAnyTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.inputs'))
            && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can view the trashed input.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Input $input
     * @return mixed
     */
    public function viewTrash(User $user, Input $input)
    {
        return $this->view($user, $input)
            && $input->trashed();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Input $input
     * @return mixed
     */
    public function restore(User $user, Input $input)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.inputs'))
            && $this->trashed($input);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Input $input
     * @return mixed
     */
    public function forceDelete(User $user, Input $input)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.inputs'))
            && $this->trashed($input)
            && Settings::get('delete_forever');
    }

    /**
     * Determine wither the given input is trashed.
     *
     * @param $input
     * @return bool
     */
    public function trashed($input)
    {
        return $this->hasSoftDeletes() && method_exists($input, 'trashed') && $input->trashed();
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
            array_keys((new \ReflectionClass(Input::class))->getTraits())
        );
    }
}
