@can('viewAnyTrash', \App\Models\Team::class)
    <a href="{{ route('dashboard.teams.trashed') }}" class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-trash"></i>
        @lang('teams.trashed')
    </a>
@endcan
