@can('create', \App\Models\Post::class)
    <a href="{{ route('dashboard.posts.create') }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('posts.actions.create')
    </a>
@endcan
