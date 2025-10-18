@can('viewAnyTrash', \App\Models\Input::class)
    <a href="{{ route('dashboard.inputs.trashed') }}" class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-trash"></i>
        @lang('inputs.trashed')
    </a>
@endcan
