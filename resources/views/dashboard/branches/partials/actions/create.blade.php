@can('create', \App\Models\Branch::class)
    <a href="{{ route('dashboard.branches.create') }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('branches.actions.create')
    </a>
@endcan
