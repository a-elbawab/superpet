<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Slider;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laraeast\LaravelSettings\Facades\Settings;
use Illuminate\Auth\Access\HandlesAuthorization;

class SliderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any sliders.
     *
     * @param \App\Models\User|null $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.sliders');
    }

    /**
     * Determine whether the user can view the slider.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Slider $slider
     * @return mixed
     */
    public function view(User $user, Slider $slider)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.sliders');
    }

    /**
     * Determine whether the user can create sliders.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.sliders');
    }

    /**
     * Determine whether the user can update the slider.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Slider $slider
     * @return mixed
     */
    public function update(User $user, Slider $slider)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.sliders'))
            && ! $this->trashed($slider);
    }

    /**
     * Determine whether the user can delete the slider.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Slider $slider
     * @return mixed
     */
    public function delete(User $user, Slider $slider)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.sliders'))
            && ! $this->trashed($slider);
    }

    /**
     * Determine whether the user can view trashed sliders.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewAnyTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.sliders'))
            && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can view the trashed slider.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Slider $slider
     * @return mixed
     */
    public function viewTrash(User $user, Slider $slider)
    {
        return $this->view($user, $slider)
            && $slider->trashed();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Slider $slider
     * @return mixed
     */
    public function restore(User $user, Slider $slider)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.sliders'))
            && $this->trashed($slider);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Slider $slider
     * @return mixed
     */
    public function forceDelete(User $user, Slider $slider)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.sliders'))
            && $this->trashed($slider)
            && Settings::get('delete_forever');
    }

    /**
     * Determine wither the given slider is trashed.
     *
     * @param $slider
     * @return bool
     */
    public function trashed($slider)
    {
        return $this->hasSoftDeletes() && method_exists($slider, 'trashed') && $slider->trashed();
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
            array_keys((new \ReflectionClass(Slider::class))->getTraits())
        );
    }
}
