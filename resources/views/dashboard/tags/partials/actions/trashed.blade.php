@can('viewAnyTrash', \App\Models\Tag::class)
    <a href="{{ route('dashboard.tags.trashed') }}" class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-trash"></i>
        @lang('tags.trashed')
    </a>
@endcan
