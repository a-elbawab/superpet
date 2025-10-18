@if(method_exists($slider, 'trashed') && $slider->trashed())
    @can('view', $slider)
        <a href="{{ route('dashboard.sliders.trashed.show', $slider) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@else
    @can('view', $slider)
        <a href="{{ route('dashboard.sliders.show', $slider) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@endif