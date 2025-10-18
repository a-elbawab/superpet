@can('view', $area)
    <a href="{{ route('dashboard.areas.show', $area) }}" class="btn btn-outline-dark btn-sm">
        <i class="fa fa-eye"></i>
    </a>
@endcan
