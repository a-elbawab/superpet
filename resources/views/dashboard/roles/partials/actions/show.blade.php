@can('view', $role)
    <a href="{{ route('dashboard.roles.show', $role) }}" class="btn btn-outline-dark btn-sm">
        <i class="fa fa-eye"></i>
    </a>
@endcan
