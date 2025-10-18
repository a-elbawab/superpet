@if($tag)
    @if(method_exists($tag, 'trashed') && $tag->trashed())
        <a href="{{ route('dashboard.tags.trashed.show', $tag) }}" class="text-decoration-none text-ellipsis">
            {{ $tag->name }}
        </a>
    @else
        <a href="{{ route('dashboard.tags.show', $tag) }}" class="text-decoration-none text-ellipsis">
            {{ $tag->name }}
        </a>
    @endif
@else
    ---
@endif