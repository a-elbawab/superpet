@if($slider)
    @if(method_exists($slider, 'trashed') && $slider->trashed())
        <a href="{{ route('dashboard.sliders.trashed.show', $slider) }}" class="text-decoration-none text-ellipsis">
            {{ $slider->name }}
        </a>
    @else
        <a href="{{ route('dashboard.sliders.show', $slider) }}" class="text-decoration-none text-ellipsis">
            {{ $slider->name }}
        </a>
    @endif
@else
    ---
@endif