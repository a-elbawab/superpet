@can('update', $supervisor)
    <a href="{{ route('dashboard.supervisors.status', $supervisor) }}" class="btn btn-outline-info btn-sm" title="active or in active">
        @if($supervisor->active)
            <i data-feather="check"></i>
        @else
            <i data-feather="x"></i>
        @endif
    </a>
@endcan
