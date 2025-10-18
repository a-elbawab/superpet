<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Registration;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laraeast\LaravelSettings\Facades\Settings;
use Illuminate\Auth\Access\HandlesAuthorization;

class RegistrationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any registrations.
     *
     * @param \App\Models\User|null $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.registrations');
    }

    /**
     * Determine whether the user can view the registration.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Registration $registration
     * @return mixed
     */
    public function view(User $user, Registration $registration)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.registrations');
    }

    /**
     * Determine whether the user can create registrations.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.registrations');
    }

    /**
     * Determine whether the user can update the registration.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Registration $registration
     * @return mixed
     */
    public function update(User $user, Registration $registration)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.registrations'))
            && ! $this->trashed($registration);
    }

    /**
     * Determine whether the user can delete the registration.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Registration $registration
     * @return mixed
     */
    public function delete(User $user, Registration $registration)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.registrations'))
            && ! $this->trashed($registration);
    }

    /**
     * Determine whether the user can view trashed registrations.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewAnyTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.registrations'))
            && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can view the trashed registration.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Registration $registration
     * @return mixed
     */
    public function viewTrash(User $user, Registration $registration)
    {
        return $this->view($user, $registration)
            && $registration->trashed();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Registration $registration
     * @return mixed
     */
    public function restore(User $user, Registration $registration)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.registrations'))
            && $this->trashed($registration);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Registration $registration
     * @return mixed
     */
    public function forceDelete(User $user, Registration $registration)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.registrations'))
            && $this->trashed($registration)
            && Settings::get('delete_forever');
    }

    /**
     * Determine wither the given registration is trashed.
     *
     * @param $registration
     * @return bool
     */
    public function trashed($registration)
    {
        return $this->hasSoftDeletes() && method_exists($registration, 'trashed') && $registration->trashed();
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
            array_keys((new \ReflectionClass(Registration::class))->getTraits())
        );
    }
}
