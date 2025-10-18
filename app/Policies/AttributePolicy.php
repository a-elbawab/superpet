<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Attribute;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laraeast\LaravelSettings\Facades\Settings;
use Illuminate\Auth\Access\HandlesAuthorization;

class AttributePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any attributes.
     *
     * @param \App\Models\User|null $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Attributes list');
    }

    /**
     * Determine whether the user can view the attribute.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Attribute $attribute
     * @return mixed
     */
    public function view(User $user, Attribute $attribute)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Attributes show');
    }

    /**
     * Determine whether the user can create attributes.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('Attributes create');
    }

    /**
     * Determine whether the user can update the attribute.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Attribute $attribute
     * @return mixed
     */
    public function update(User $user, Attribute $attribute)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('Attributes update'))
            && ! $this->trashed($attribute);
    }

    /**
     * Determine whether the user can delete the attribute.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Attribute $attribute
     * @return mixed
     */
    public function delete(User $user, Attribute $attribute)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('Attributes delete'))
            && ! $this->trashed($attribute);
    }

    /**
     * Determine whether the user can view trashed attributes.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewAnyTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.attributes'))
            && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can view the trashed attribute.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Attribute $attribute
     * @return mixed
     */
    public function viewTrash(User $user, Attribute $attribute)
    {
        return $this->view($user, $attribute)
            && $attribute->trashed();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Attribute $attribute
     * @return mixed
     */
    public function restore(User $user, Attribute $attribute)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.attributes'))
            && $this->trashed($attribute);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Attribute $attribute
     * @return mixed
     */
    public function forceDelete(User $user, Attribute $attribute)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.attributes'))
            && $this->trashed($attribute)
            && Settings::get('delete_forever');
    }

    /**
     * Determine wither the given attribute is trashed.
     *
     * @param $attribute
     * @return bool
     */
    public function trashed($attribute)
    {
        return $this->hasSoftDeletes() && method_exists($attribute, 'trashed') && $attribute->trashed();
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
            array_keys((new \ReflectionClass(Attribute::class))->getTraits())
        );
    }
}
