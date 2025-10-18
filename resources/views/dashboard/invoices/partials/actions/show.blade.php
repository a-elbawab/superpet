@if(method_exists($invoice, 'trashed') && $invoice->trashed())
    @can('view', $invoice)
        <a href="{{ route('dashboard.invoices.trashed.show', $invoice) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@else
    @can('view', $invoice)
        <a href="{{ route('dashboard.invoices.show', $invoice) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@endif