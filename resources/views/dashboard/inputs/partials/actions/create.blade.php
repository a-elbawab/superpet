@can('create', \App\Models\Input::class)
    <a href="{{ route('dashboard.inputs.create', $section) }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('inputs.actions.create')
    </a>
@endcan
