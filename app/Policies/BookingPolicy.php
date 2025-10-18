<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Booking;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laraeast\LaravelSettings\Facades\Settings;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookingPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any bookings.
     *
     * @param \App\Models\User|null $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.bookings');
    }

    /**
     * Determine whether the user can view the booking.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Booking $booking
     * @return mixed
     */
    public function view(User $user, Booking $booking)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.bookings');
    }

    /**
     * Determine whether the user can create bookings.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.bookings');
    }

    /**
     * Determine whether the user can update the booking.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Booking $booking
     * @return mixed
     */
    public function update(User $user, Booking $booking)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.bookings'))
            && ! $this->trashed($booking);
    }

    /**
     * Determine whether the user can delete the booking.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Booking $booking
     * @return mixed
     */
    public function delete(User $user, Booking $booking)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.bookings'))
            && ! $this->trashed($booking);
    }

    /**
     * Determine whether the user can view trashed bookings.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewAnyTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.bookings'))
            && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can view the trashed booking.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Booking $booking
     * @return mixed
     */
    public function viewTrash(User $user, Booking $booking)
    {
        return $this->view($user, $booking)
            && $booking->trashed();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Booking $booking
     * @return mixed
     */
    public function restore(User $user, Booking $booking)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.bookings'))
            && $this->trashed($booking);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Booking $booking
     * @return mixed
     */
    public function forceDelete(User $user, Booking $booking)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.bookings'))
            && $this->trashed($booking)
            && Settings::get('delete_forever');
    }

    /**
     * Determine wither the given booking is trashed.
     *
     * @param $booking
     * @return bool
     */
    public function trashed($booking)
    {
        return $this->hasSoftDeletes() && method_exists($booking, 'trashed') && $booking->trashed();
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
            array_keys((new \ReflectionClass(Booking::class))->getTraits())
        );
    }
}
