@if($hint)
    @if(method_exists($hint, 'trashed') && $hint->trashed())
        <a href="{{ route('dashboard.hints.trashed.show', $hint) }}" class="text-decoration-none text-ellipsis">
            {{ $hint->name }}
        </a>
    @else
        <a href="{{ route('dashboard.hints.show', $hint) }}" class="text-decoration-none text-ellipsis">
            {{ $hint->name }}
        </a>
    @endif
@else
    ---
@endif