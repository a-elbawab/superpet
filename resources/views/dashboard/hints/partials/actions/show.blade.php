@if(method_exists($hint, 'trashed') && $hint->trashed())
    @can('view', $hint)
        <a href="{{ route('dashboard.hints.trashed.show', $hint) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@else
    @can('view', $hint)
        <a href="{{ route('dashboard.hints.show', $hint) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@endif