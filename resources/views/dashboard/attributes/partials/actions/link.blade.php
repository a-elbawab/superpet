@if($attribute)
    @if(method_exists($attribute, 'trashed') && $attribute->trashed())
        <a href="{{ route('dashboard.attributes.trashed.show', $attribute) }}" class="text-decoration-none text-ellipsis">
            {{ $attribute->name }}
        </a>
    @else
        <a href="{{ route('dashboard.attributes.show', $attribute) }}" class="text-decoration-none text-ellipsis">
            {{ $attribute->name }}
        </a>
    @endif
@else
    ---
@endif