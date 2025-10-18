@if($team)
    @if(method_exists($team, 'trashed') && $team->trashed())
        <a href="{{ route('dashboard.teams.trashed.show', $team) }}" class="text-decoration-none text-ellipsis">
            {{ $team->name }}
        </a>
    @else
        <a href="{{ route('dashboard.teams.show', $team) }}" class="text-decoration-none text-ellipsis">
            {{ $team->name }}
        </a>
    @endif
@else
    ---
@endif