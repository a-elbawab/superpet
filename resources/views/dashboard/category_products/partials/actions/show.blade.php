@if(method_exists($category_product, 'trashed') && $category_product->trashed())
    @can('view', $category_product)
        <a href="{{ route('dashboard.category_products.trashed.show', $category_product) }}"
            class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@else
    @can('view', $category_product)
        <a href="{{ route('dashboard.category_products.show', $category_product) }}" class="btn btn-outline-dark btn-sm">
            <i class="fas fa fa-fw fa-eye"></i>
        </a>
    @endcan
@endif