@can('viewAnyTrash', \App\Models\Option::class)
    <a href="{{ route('dashboard.options.trashed') }}" class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-trash"></i>
        @lang('options.trashed')
    </a>
@endcan
