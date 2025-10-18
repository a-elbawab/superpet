@if($option)
    @if(method_exists($option, 'trashed') && $option->trashed())
        <a href="{{ route('dashboard.options.trashed.show', $option) }}" class="text-decoration-none text-ellipsis">
            {{ $option->name }}
        </a>
    @else
        <a href="{{ route('dashboard.options.show', $option) }}" class="text-decoration-none text-ellipsis">
            {{ $option->name }}
        </a>
    @endif
@else
    ---
@endif