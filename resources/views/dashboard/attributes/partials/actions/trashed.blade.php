@can('viewAnyTrash', \App\Models\Attribute::class)
    <a href="{{ route('dashboard.attributes.trashed') }}" class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-trash"></i>
        @lang('attributes.trashed')
    </a>
@endcan
