@can('create', \App\Models\Section::class)
    <a href="{{ route('dashboard.sections.create', $service) }}" class="btn btn-outline-success btn-sm">
        <i class="fas fa fa-fw fa-plus"></i>
        @lang('sections.actions.create')
    </a>
@endcan
