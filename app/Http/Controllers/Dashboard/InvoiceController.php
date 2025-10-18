<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Invoice;
use Illuminate\Routing\Controller;
use App\Http\Requests\Dashboard\InvoiceRequest;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class InvoiceController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * InvoiceController constructor.
     */
    public function __construct()
    {
        $this->authorizeResource(Invoice::class, 'invoice');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $invoices = Invoice::filter()->latest()->paginate();

        return view('dashboard.invoices.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.invoices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\InvoiceRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(InvoiceRequest $request)
    {
        $invoice = Invoice::create($request->all());

        flash()->success(trans('invoices.messages.created'));

        return redirect()->route('dashboard.invoices.show', $invoice);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        return view('dashboard.invoices.show', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        return view('dashboard.invoices.edit', compact('invoice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\InvoiceRequest $request
     * @param \App\Models\Invoice $invoice
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(InvoiceRequest $request, Invoice $invoice)
    {
        $invoice->update($request->all());

        flash()->success(trans('invoices.messages.updated'));

        return redirect()->route('dashboard.invoices.show', $invoice);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Invoice $invoice
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();

        flash()->success(trans('invoices.messages.deleted'));

        return redirect()->route('dashboard.invoices.index');
    }

    /**
     * Display a listing of the trashed resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trashed()
    {
        $this->authorize('viewAnyTrash', Invoice::class);

        $invoices = Invoice::onlyTrashed()->latest('deleted_at')->paginate();

        return view('dashboard.invoices.trashed', compact('invoices'));
    }

    /**
     * Display the specified trashed resource.
     *
     * @param \App\Models\Invoice $invoice
     * @return \Illuminate\Http\Response
     */
    public function showTrashed(Invoice $invoice)
    {
        $this->authorize('viewTrash', $invoice);

        return view('dashboard.invoices.show', compact('invoice'));
    }

    /**
     * Restore the trashed resource.
     *
     * @param \App\Models\Invoice $invoice
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(Invoice $invoice)
    {
        $this->authorize('restore', $invoice);

        $invoice->restore();

        flash()->success(trans('invoices.messages.restored'));

        return redirect()->route('dashboard.invoices.trashed');
    }

    /**
     * Force delete the specified resource from storage.
     *
     * @param \App\Models\Invoice $invoice
     * @throws \Exception
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete(Invoice $invoice)
    {
        $this->authorize('forceDelete', $invoice);

        $invoice->forceDelete();

        flash()->success(trans('invoices.messages.deleted'));

        return redirect()->route('dashboard.invoices.trashed');
    }
}
