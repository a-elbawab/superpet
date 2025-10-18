@can('viewAnyTrash', \App\Models\Gallery::class)
    <a href="{{ route('dashboard.galleries.trashed') }}" class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-trash"></i>
        @lang('galleries.trashed')
    </a>
@endcan
