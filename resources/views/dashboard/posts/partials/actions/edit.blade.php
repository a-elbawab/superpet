@can('update', $post)
    <a href="{{ route('dashboard.posts.edit', $post) }}" class="btn btn-outline-primary btn-sm">
        <i class="fas fa fa-fw fa-edit"></i>
    </a>
@endcan
