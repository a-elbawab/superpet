@can('viewTrash', \App\Models\Supervisor::class)
    <a href="{{ route('dashboard.supervisors.trashed', request()->only('type')) }}" class="btn btn-outline-danger btn-sm">
        <i data-feather="trash"></i>
        @lang('supervisors.trashed')
    </a>
@endcan
