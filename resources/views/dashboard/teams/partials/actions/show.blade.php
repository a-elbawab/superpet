@if(method_exists($team, 'trashed') && $team->trashed())
    @can('view', $team)
        <a href="{{ route('dashboard.teams.trashed.show', $team) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@else
    @can('view', $team)
        <a href="{{ route('dashboard.teams.show', $team) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@endif