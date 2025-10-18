<?php

namespace App\Policies;

use App\Models\User;
use App\Models\CategoryProduct;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laraeast\LaravelSettings\Facades\Settings;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryProductPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any catrgory products.
     *
     * @param \App\Models\User|null $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.category_products');
    }

    /**
     * Determine whether the user can view the catrgory product.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\CategoryProduct $category_product
     * @return mixed
     */
    public function view(User $user, CategoryProduct $category_product)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.category_products');
    }

    /**
     * Determine whether the user can create catrgory products.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.category_products');
    }

    /**
     * Determine whether the user can update the catrgory product.
     *
     * @param \App\Models\User $user
     * @param \App\Models\CategoryProduct $category_product
     * @return mixed
     */
    public function update(User $user, CategoryProduct $category_product)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.category_products'))
            && !$this->trashed($category_product);
    }

    /**
     * Determine whether the user can delete the catrgory product.
     *
     * @param \App\Models\User $user
     * @param \App\Models\CategoryProduct $category_product
     * @return mixed
     */
    public function delete(User $user, CategoryProduct $category_product)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.category_products'))
            && !$this->trashed($category_product);
    }

    /**
     * Determine whether the user can view trashed category_products.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewAnyTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.category_products'))
            && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can view the trashed category_product.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\CategoryProduct $category_product
     * @return mixed
     */
    public function viewTrash(User $user, CategoryProduct $category_product)
    {
        return $this->view($user, $category_product)
            && $category_product->trashed();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\CategoryProduct $category_product
     * @return mixed
     */
    public function restore(User $user, CategoryProduct $category_product)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.category_products'))
            && $this->trashed($category_product);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\CategoryProduct $category_product
     * @return mixed
     */
    public function forceDelete(User $user, CategoryProduct $category_product)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.category_products'))
            && $this->trashed($category_product)
            && Settings::get('delete_forever');
    }

    /**
     * Determine wither the given category_product is trashed.
     *
     * @param $category_product
     * @return bool
     */
    public function trashed($category_product)
    {
        return $this->hasSoftDeletes() && method_exists($category_product, 'trashed') && $category_product->trashed();
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
            array_keys((new \ReflectionClass(CategoryProduct::class))->getTraits())
        );
    }
}
