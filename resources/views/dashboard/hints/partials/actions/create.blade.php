@can('create', \App\Models\Hint::class)
    <a href="{{ route('dashboard.hints.create') }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('hints.actions.create')
    </a>
@endcan
