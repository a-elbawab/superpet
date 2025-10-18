@can('create', \App\Models\Team::class)
    <a href="{{ route('dashboard.teams.create') }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('teams.actions.create')
    </a>
@endcan
