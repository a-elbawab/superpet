@if($post)
    @if(method_exists($post, 'trashed') && $post->trashed())
        <a href="{{ route('dashboard.posts.trashed.show', $post) }}" class="text-decoration-none text-ellipsis">
            {{ $post->name }}
        </a>
    @else
        <a href="{{ route('dashboard.posts.show', $post) }}" class="text-decoration-none text-ellipsis">
            {{ $post->name }}
        </a>
    @endif
@else
    ---
@endif