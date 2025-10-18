@if(method_exists($gallery, 'trashed') && $gallery->trashed())
    @can('view', $gallery)
        <a href="{{ route('dashboard.galleries.trashed.show', $gallery) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@else
    @can('view', $gallery)
        <a href="{{ route('dashboard.galleries.show', $gallery) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@endif