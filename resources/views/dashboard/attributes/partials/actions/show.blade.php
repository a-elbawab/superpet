@if(method_exists($attribute, 'trashed') && $attribute->trashed())
    @can('view', $attribute)
        <a href="{{ route('dashboard.attributes.trashed.show', $attribute) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@else
    @can('view', $attribute)
        <a href="{{ route('dashboard.attributes.show', $attribute) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@endif