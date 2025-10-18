@if(method_exists($branch, 'trashed') && $branch->trashed())
    @can('view', $branch)
        <a href="{{ route('dashboard.branches.trashed.show', $branch) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@else
    @can('view', $branch)
        <a href="{{ route('dashboard.branches.show', $branch) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@endif