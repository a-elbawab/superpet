@can('view', $supervisor)
    <a href="{{ route('dashboard.supervisors.show', $supervisor) }}" class="btn btn-outline-dark btn-sm">
        <i class="fa fa-eye"></i>
    </a>
@endcan
