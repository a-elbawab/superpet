<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Gallery;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laraeast\LaravelSettings\Facades\Settings;
use Illuminate\Auth\Access\HandlesAuthorization;

class GalleryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any galleries.
     *
     * @param \App\Models\User|null $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.galleries');
    }

    /**
     * Determine whether the user can view the gallery.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Gallery $gallery
     * @return mixed
     */
    public function view(User $user, Gallery $gallery)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.galleries');
    }

    /**
     * Determine whether the user can create galleries.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.galleries');
    }

    /**
     * Determine whether the user can update the gallery.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Gallery $gallery
     * @return mixed
     */
    public function update(User $user, Gallery $gallery)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.galleries'))
            && ! $this->trashed($gallery);
    }

    /**
     * Determine whether the user can delete the gallery.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Gallery $gallery
     * @return mixed
     */
    public function delete(User $user, Gallery $gallery)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.galleries'))
            && ! $this->trashed($gallery);
    }

    /**
     * Determine whether the user can view trashed galleries.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewAnyTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.galleries'))
            && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can view the trashed gallery.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Gallery $gallery
     * @return mixed
     */
    public function viewTrash(User $user, Gallery $gallery)
    {
        return $this->view($user, $gallery)
            && $gallery->trashed();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Gallery $gallery
     * @return mixed
     */
    public function restore(User $user, Gallery $gallery)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.galleries'))
            && $this->trashed($gallery);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Gallery $gallery
     * @return mixed
     */
    public function forceDelete(User $user, Gallery $gallery)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.galleries'))
            && $this->trashed($gallery)
            && Settings::get('delete_forever');
    }

    /**
     * Determine wither the given gallery is trashed.
     *
     * @param $gallery
     * @return bool
     */
    public function trashed($gallery)
    {
        return $this->hasSoftDeletes() && method_exists($gallery, 'trashed') && $gallery->trashed();
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
            array_keys((new \ReflectionClass(Gallery::class))->getTraits())
        );
    }
}
