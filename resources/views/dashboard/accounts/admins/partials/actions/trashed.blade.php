@can('viewTrash', \App\Models\Admin::class)
    <a href="{{ route('dashboard.admins.trashed', request()->only('type')) }}" class="btn btn-outline-danger btn-sm">
        <i data-feather="trash"></i>
        @lang('admins.trashed')
    </a>
@endcan
