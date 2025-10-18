<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Team;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laraeast\LaravelSettings\Facades\Settings;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeamPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any teams.
     *
     * @param \App\Models\User|null $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.teams');
    }

    /**
     * Determine whether the user can view the team.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Team $team
     * @return mixed
     */
    public function view(User $user, Team $team)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.teams');
    }

    /**
     * Determine whether the user can create teams.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.teams');
    }

    /**
     * Determine whether the user can update the team.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Team $team
     * @return mixed
     */
    public function update(User $user, Team $team)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.teams'))
            && ! $this->trashed($team);
    }

    /**
     * Determine whether the user can delete the team.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Team $team
     * @return mixed
     */
    public function delete(User $user, Team $team)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.teams'))
            && ! $this->trashed($team);
    }

    /**
     * Determine whether the user can view trashed teams.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewAnyTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.teams'))
            && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can view the trashed team.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Team $team
     * @return mixed
     */
    public function viewTrash(User $user, Team $team)
    {
        return $this->view($user, $team)
            && $team->trashed();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Team $team
     * @return mixed
     */
    public function restore(User $user, Team $team)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.teams'))
            && $this->trashed($team);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Team $team
     * @return mixed
     */
    public function forceDelete(User $user, Team $team)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.teams'))
            && $this->trashed($team)
            && Settings::get('delete_forever');
    }

    /**
     * Determine wither the given team is trashed.
     *
     * @param $team
     * @return bool
     */
    public function trashed($team)
    {
        return $this->hasSoftDeletes() && method_exists($team, 'trashed') && $team->trashed();
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
            array_keys((new \ReflectionClass(Team::class))->getTraits())
        );
    }
}
