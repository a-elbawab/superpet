<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Tag;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laraeast\LaravelSettings\Facades\Settings;
use Illuminate\Auth\Access\HandlesAuthorization;

class TagPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any tags.
     *
     * @param \App\Models\User|null $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.tags');
    }

    /**
     * Determine whether the user can view the tag.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Tag $tag
     * @return mixed
     */
    public function view(User $user, Tag $tag)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.tags');
    }

    /**
     * Determine whether the user can create tags.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.tags');
    }

    /**
     * Determine whether the user can update the tag.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Tag $tag
     * @return mixed
     */
    public function update(User $user, Tag $tag)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.tags'))
            && ! $this->trashed($tag);
    }

    /**
     * Determine whether the user can delete the tag.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Tag $tag
     * @return mixed
     */
    public function delete(User $user, Tag $tag)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.tags'))
            && ! $this->trashed($tag);
    }

    /**
     * Determine whether the user can view trashed tags.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewAnyTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.tags'))
            && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can view the trashed tag.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Tag $tag
     * @return mixed
     */
    public function viewTrash(User $user, Tag $tag)
    {
        return $this->view($user, $tag)
            && $tag->trashed();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Tag $tag
     * @return mixed
     */
    public function restore(User $user, Tag $tag)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.tags'))
            && $this->trashed($tag);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Tag $tag
     * @return mixed
     */
    public function forceDelete(User $user, Tag $tag)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.tags'))
            && $this->trashed($tag)
            && Settings::get('delete_forever');
    }

    /**
     * Determine wither the given tag is trashed.
     *
     * @param $tag
     * @return bool
     */
    public function trashed($tag)
    {
        return $this->hasSoftDeletes() && method_exists($tag, 'trashed') && $tag->trashed();
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
            array_keys((new \ReflectionClass(Tag::class))->getTraits())
        );
    }
}
