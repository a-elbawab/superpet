@can('create', \App\Models\Product::class)
    @if (isset($product))
        <a href="{{ route('dashboard.products.create', ['product_id' => $product?->id]) }}"
            class="btn btn-outline-success btn-sm">
            <i class="fas fa fa-fw fa-plus"></i>
            @lang('products.actions.create')
        </a>
    @else
        <a href="{{ route('dashboard.products.create') }}" class="btn btn-outline-success btn-sm">
            <i class="fas fa fa-fw fa-plus"></i>
            @lang('products.actions.create')
        </a>
    @endif

@endcan
