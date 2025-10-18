@can('view', $page)
    <a href="{{ route('dashboard.pages.show', $page) }}" class="btn btn-outline-dark btn-sm">
        <i class="fa fa-eye"></i>
    </a>
@endcan
