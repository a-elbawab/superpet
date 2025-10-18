<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Section;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laraeast\LaravelSettings\Facades\Settings;
use Illuminate\Auth\Access\HandlesAuthorization;

class SectionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any sections.
     *
     * @param \App\Models\User|null $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.sections');
    }

    /**
     * Determine whether the user can view the section.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Section $section
     * @return mixed
     */
    public function view(User $user, Section $section)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.sections');
    }

    /**
     * Determine whether the user can create sections.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.sections');
    }

    /**
     * Determine whether the user can update the section.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Section $section
     * @return mixed
     */
    public function update(User $user, Section $section)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.sections'))
            && ! $this->trashed($section);
    }

    /**
     * Determine whether the user can delete the section.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Section $section
     * @return mixed
     */
    public function delete(User $user, Section $section)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.sections'))
            && ! $this->trashed($section);
    }

    /**
     * Determine whether the user can view trashed sections.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewAnyTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.sections'))
            && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can view the trashed section.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Section $section
     * @return mixed
     */
    public function viewTrash(User $user, Section $section)
    {
        return $this->view($user, $section)
            && $section->trashed();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Section $section
     * @return mixed
     */
    public function restore(User $user, Section $section)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.sections'))
            && $this->trashed($section);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Section $section
     * @return mixed
     */
    public function forceDelete(User $user, Section $section)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.sections'))
            && $this->trashed($section)
            && Settings::get('delete_forever');
    }

    /**
     * Determine wither the given section is trashed.
     *
     * @param $section
     * @return bool
     */
    public function trashed($section)
    {
        return $this->hasSoftDeletes() && method_exists($section, 'trashed') && $section->trashed();
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
            array_keys((new \ReflectionClass(Section::class))->getTraits())
        );
    }
}
