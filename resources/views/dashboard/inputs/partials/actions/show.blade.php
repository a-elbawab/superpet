@if(method_exists($input, 'trashed') && $input->trashed())
    @can('view', $input)
        <a href="{{ route('dashboard.inputs.trashed.show', $input) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@else
    @can('view', $input)
        <a href="{{ route('dashboard.inputs.show', $input) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@endif