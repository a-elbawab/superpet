@if(method_exists($post, 'trashed') && $post->trashed())
    @can('view', $post)
        <a href="{{ route('dashboard.posts.trashed.show', $post) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@else
    @can('view', $post)
        <a href="{{ route('dashboard.posts.show', $post) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@endif