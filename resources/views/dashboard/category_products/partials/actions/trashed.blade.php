@can('viewAnyTrash', \App\Models\CategoryProduct::class)
    <a href="{{ route('dashboard.category_products.trashed') }}" class="btn btn-outline-danger btn-sm">
        <i class="fas fa fa-fw fa-trash"></i>
        @lang('category_products.trashed')
    </a>
@endcan