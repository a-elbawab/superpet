@can('create', \App\Models\Option::class)
    <a href="{{ route('dashboard.options.create', $input) }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('options.actions.create')
    </a>
@endcan
