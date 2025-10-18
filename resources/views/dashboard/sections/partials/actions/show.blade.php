@if(method_exists($section, 'trashed') && $section->trashed())
    @can('view', $section)
        <a href="{{ route('dashboard.sections.trashed.show', $section) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@else
    @can('view', $section)
        <a href="{{ route('dashboard.sections.show', $section) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@endif