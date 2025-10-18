@if(method_exists($option, 'trashed') && $option->trashed())
    @can('view', $option)
        <a href="{{ route('dashboard.options.trashed.show', $option) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@else
    @can('view', $option)
        <a href="{{ route('dashboard.options.show', $option) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@endif