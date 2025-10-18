@can('viewAnyTrash', \App\Models\Invoice::class)
    <a href="{{ route('dashboard.invoices.trashed') }}" class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-trash"></i>
        @lang('invoices.trashed')
    </a>
@endcan
