@can('viewAnyTrash', \App\Models\Branch::class)
    <a href="{{ route('dashboard.branches.trashed') }}" class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-trash"></i>
        @lang('branches.trashed')
    </a>
@endcan
