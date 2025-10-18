@if($section)
    @if(method_exists($section, 'trashed') && $section->trashed())
        <a href="{{ route('dashboard.sections.trashed.show', $section) }}" class="text-decoration-none text-ellipsis">
            {{ $section->name }}
        </a>
    @else
        <a href="{{ route('dashboard.sections.show', $section) }}" class="text-decoration-none text-ellipsis">
            {{ $section->name }}
        </a>
    @endif
@else
    ---
@endif