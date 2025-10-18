<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Invoice;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laraeast\LaravelSettings\Facades\Settings;
use Illuminate\Auth\Access\HandlesAuthorization;

class InvoicePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any invoices.
     *
     * @param \App\Models\User|null $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.invoices');
    }

    /**
     * Determine whether the user can view the invoice.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Invoice $invoice
     * @return mixed
     */
    public function view(User $user, Invoice $invoice)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.invoices');
    }

    /**
     * Determine whether the user can create invoices.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isAdmin() || $user->hasPermissionTo('manage.invoices');
    }

    /**
     * Determine whether the user can update the invoice.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Invoice $invoice
     * @return mixed
     */
    public function update(User $user, Invoice $invoice)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.invoices'))
            && ! $this->trashed($invoice);
    }

    /**
     * Determine whether the user can delete the invoice.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Invoice $invoice
     * @return mixed
     */
    public function delete(User $user, Invoice $invoice)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.invoices'))
            && ! $this->trashed($invoice);
    }

    /**
     * Determine whether the user can view trashed invoices.
     *
     * @param \App\Models\User $user
     * @return mixed
     */
    public function viewAnyTrash(User $user)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.invoices'))
            && $this->hasSoftDeletes();
    }

    /**
     * Determine whether the user can view the trashed invoice.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Invoice $invoice
     * @return mixed
     */
    public function viewTrash(User $user, Invoice $invoice)
    {
        return $this->view($user, $invoice)
            && $invoice->trashed();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Invoice $invoice
     * @return mixed
     */
    public function restore(User $user, Invoice $invoice)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.invoices'))
            && $this->trashed($invoice);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Invoice $invoice
     * @return mixed
     */
    public function forceDelete(User $user, Invoice $invoice)
    {
        return ($user->isAdmin() || $user->hasPermissionTo('manage.invoices'))
            && $this->trashed($invoice)
            && Settings::get('delete_forever');
    }

    /**
     * Determine wither the given invoice is trashed.
     *
     * @param $invoice
     * @return bool
     */
    public function trashed($invoice)
    {
        return $this->hasSoftDeletes() && method_exists($invoice, 'trashed') && $invoice->trashed();
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
            array_keys((new \ReflectionClass(Invoice::class))->getTraits())
        );
    }
}
