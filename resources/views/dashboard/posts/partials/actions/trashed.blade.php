@can('viewAnyTrash', \App\Models\Post::class)
    <a href="{{ route('dashboard.posts.trashed') }}" class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-trash"></i>
        @lang('posts.trashed')
    </a>
@endcan
