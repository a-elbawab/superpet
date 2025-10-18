@can('update', $invoice)
    <a href="{{ route('dashboard.invoices.edit', $invoice) }}" class="btn btn-outline-primary btn-sm">
        <i class="fas fa fa-fw fa-edit"></i>
    </a>
@endcan
