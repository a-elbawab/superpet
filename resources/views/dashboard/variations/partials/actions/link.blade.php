@if($variation)
    @if(method_exists($variation, 'trashed') && $variation->trashed())
        <a href="{{ route('dashboard.variations.trashed.show', $variation) }}" class="text-decoration-none text-ellipsis">
            {{ $variation->name }}
        </a>
    @else
        <a href="{{ route('dashboard.variations.show', $variation) }}" class="text-decoration-none text-ellipsis">
            {{ $variation->name }}
        </a>
    @endif
@else
    ---
@endif