@can('create', \App\Models\Invoice::class)
    <a href="{{ route('dashboard.invoices.create') }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('invoices.actions.create')
    </a>
@endcan
