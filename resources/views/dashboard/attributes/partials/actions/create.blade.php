@can('create', \App\Models\Attribute::class)
    <a href="{{ route('dashboard.attributes.create') }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('attributes.actions.create')
    </a>
@endcan
