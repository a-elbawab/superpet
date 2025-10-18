<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Variation;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laraeast\LaravelSettings\Facades\Settings;
use Illuminate\Auth\Access\HandlesAuthorization;

class VariationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any Variations.
     *
     * @param \App\Models\User|null $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Variations list');
    }

    /**
     * Determine whether the user can view the Variation.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Variation $variation
     * @return mixed
     */
    public function view(User $user, Variation $variation)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Variations show');
    }

    /**
     * Determine whether the user can create Variations.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Variations create');
    }

    /**
     * Determine whether the user can update the Variation.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Variation $variation
     * @return mixed
     */
    public function update(User $user, Variation $variation)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('Variations update'))
            && ! $this->trashed($variation);
    }

    /**
     * Determine whether the user can delete the Variation.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Variation $variation
     * @return mixed
     */
    public function delete(User $user, Variation $variation)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('Variations delete'))
            && ! $this->trashed($variation);
    }

    /**
     * Determine whether the user can view trashed Variations.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewAnyTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('Variations delete'))
            && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can view the trashed Variation.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Variation $variation
     * @return mixed
     */
    public function viewTrash(User $user, Variation $variation)
    {
        return $this->view($user, $variation)
            && $variation->trashed();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Variation $variation
     * @return mixed
     */
    public function restore(User $user, Variation $variation)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.Variations'))
            && $this->trashed($variation);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Variation $variation
     * @return mixed
     */
    public function forceDelete(User $user, Variation $variation)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.Variations'))
            && $this->trashed($variation)
            && Settings::get('delete_forever');
    }

    /**
     * Determine wither the given Variation is trashed.
     *
     * @param $variation
     * @return bool
     */
    public function trashed($variation)
    {
        return $this->hasSoftDeletes() && method_exists($variation, 'trashed') && $variation->trashed();
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
            array_keys((new \ReflectionClass(Variation::class))->getTraits())
        );
    }
}
