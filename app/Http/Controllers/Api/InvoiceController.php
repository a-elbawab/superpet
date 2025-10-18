<?php

namespace App\Http\Controllers\Api;

use App\Models\Invoice;
use Illuminate\Routing\Controller;
use App\Http\Resources\SelectResource;
use App\Http\Resources\InvoiceResource;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class InvoiceController extends Controller
{
    use AuthorizesRequests, ValidatesRequests;

    /**
     * Display a listing of the invoices.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $invoices = Invoice::filter()->simplePaginate();

        return InvoiceResource::collection($invoices);
    }

    /**
     * Display the specified invoice.
     *
     * @param \App\Models\Invoice $invoice
     * @return \App\Http\Resources\InvoiceResource
     */
    public function show(Invoice $invoice)
    {
        return new InvoiceResource($invoice);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function select()
    {
        $invoices = Invoice::filter()->simplePaginate();

        return SelectResource::collection($invoices);
    }
}
