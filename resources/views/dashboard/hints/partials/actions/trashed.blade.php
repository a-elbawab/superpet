@can('viewAnyTrash', \App\Models\Hint::class)
    <a href="{{ route('dashboard.hints.trashed') }}" class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-trash"></i>
        @lang('hints.trashed')
    </a>
@endcan
