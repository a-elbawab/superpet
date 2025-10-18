@can('viewAnyTrash', \App\Models\Section::class)
    <a href="{{ route('dashboard.sections.trashed') }}" class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-trash"></i>
        @lang('sections.trashed')
    </a>
@endcan
