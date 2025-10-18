@if($gallery)
    @if(method_exists($gallery, 'trashed') && $gallery->trashed())
        <a href="{{ route('dashboard.galleries.trashed.show', $gallery) }}" class="text-decoration-none text-ellipsis">
            {{ $gallery->name }}
        </a>
    @else
        <a href="{{ route('dashboard.galleries.show', $gallery) }}" class="text-decoration-none text-ellipsis">
            {{ $gallery->name }}
        </a>
    @endif
@else
    ---
@endif