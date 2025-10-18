@if(method_exists($tag, 'trashed') && $tag->trashed())
    @can('view', $tag)
        <a href="{{ route('dashboard.tags.trashed.show', $tag) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@else
    @can('view', $tag)
        <a href="{{ route('dashboard.tags.show', $tag) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@endif