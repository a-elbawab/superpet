<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laraeast\LaravelSettings\Facades\Settings;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any posts.
     *
     * @param \App\Models\User|null $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.posts');
    }

    /**
     * Determine whether the user can view the post.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Post $post
     * @return mixed
     */
    public function view(User $user, Post $post)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.posts');
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.posts');
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Post $post
     * @return mixed
     */
    public function update(User $user, Post $post)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.posts'))
            && ! $this->trashed($post);
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Post $post
     * @return mixed
     */
    public function delete(User $user, Post $post)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.posts'))
            && ! $this->trashed($post);
    }

    /**
     * Determine whether the user can view trashed posts.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewAnyTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.posts'))
            && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can view the trashed post.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Post $post
     * @return mixed
     */
    public function viewTrash(User $user, Post $post)
    {
        return $this->view($user, $post)
            && $post->trashed();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Post $post
     * @return mixed
     */
    public function restore(User $user, Post $post)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.posts'))
            && $this->trashed($post);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Post $post
     * @return mixed
     */
    public function forceDelete(User $user, Post $post)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.posts'))
            && $this->trashed($post)
            && Settings::get('delete_forever');
    }

    /**
     * Determine wither the given post is trashed.
     *
     * @param $post
     * @return bool
     */
    public function trashed($post)
    {
        return $this->hasSoftDeletes() && method_exists($post, 'trashed') && $post->trashed();
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
            array_keys((new \ReflectionClass(Post::class))->getTraits())
        );
    }
}
