@if(method_exists($variation, 'trashed') && $variation->trashed())
    @can('view', $variation)
        <a href="{{ route('dashboard.variations.trashed.show', $variation) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@else
    @can('view', $variation)
        <a href="{{ route('dashboard.variations.show', $variation) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@endif