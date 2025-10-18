@if($category_product)
    @if(method_exists($category_product, 'trashed') && $category_product->trashed())
        <a href="{{ route('dashboard.category_products.trashed.show', $category_product) }}"
            class="text-decoration-none text-ellipsis">
            {{ $category_product->name }}
        </a>
    @else
        <a href="{{ route('dashboard.category_products.show', $category_product) }}" class="text-decoration-none text-ellipsis">
            {{ $category_product->name }}
        </a>
    @endif
@else
    ---
@endif