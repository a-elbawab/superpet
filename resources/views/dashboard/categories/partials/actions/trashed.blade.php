@can('viewTrash', \App\Models\Category::class)
    <a href="{{ route('dashboard.categories.trashed', request()->only('type')) }}" class="btn btn-outline-danger btn-sm">
        <i data-feather="trash"></i>
        @lang('categories.trashed')
    </a>
@endcan
