@can('viewAnyTrash', \App\Models\Variation::class)
    <a href="{{ route('dashboard.variations.trashed') }}" class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-trash"></i>
        @lang('variations.trashed')
    </a>
@endcan
