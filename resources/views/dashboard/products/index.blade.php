<x-layout :title="trans('products.plural')" :breadcrumbs="['dashboard.products.index']">
    @include('dashboard.products.partials.filter')

    @component('dashboard::components.table-box')
    @slot('title')
    @lang('products.actions.list') ({{ $products->total() }})
    @endslot

    <thead>
        <tr>
            <th colspan="100">
                <div class="d-flex">
                    <x-check-all-delete type="{{ \App\Models\Product::class }}"
                        :resource="trans('products.plural')"></x-check-all-delete>

                    <div class="ml-2 d-flex justify-content-between flex-grow-1">
                        @include('dashboard.products.partials.actions.create')
                        @include('dashboard.products.partials.actions.trashed')
                    </div>
                </div>
            </th>
        </tr>
        <tr>
            <th style="width: 30px;" class="text-center">
                <x-check-all></x-check-all>
            </th>
            <th>@lang('products.attributes.name')</th>
            <th>@lang('products.attributes.children_count')</th>
            <th>@lang('products.attributes.code')</th>
            <th style="width: 160px">...</th>
        </tr>
    </thead>
    <tbody>
        @forelse($products as $product)
            <tr>
                <td class="text-center">
                    <x-check-all-item :model="$product"></x-check-all-item>
                </td>
                <td>
                    <a href="{{ route('dashboard.products.show', $product) }}" class="text-decoration-none text-ellipsis">
                        {{ $product->name }}
                    </a>
                </td>
                <td>
                    {{ $product->products_count }}
                </td>
                <td>
                    {{ $product->code }}
                </td>
                <td style="width: 160px">
                    @include('dashboard.products.partials.actions.show')
                    @include('dashboard.products.partials.actions.edit')
                    @include('dashboard.products.partials.actions.delete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('products.empty')</td>
            </tr>
        @endforelse

        @if($products->hasPages())
            @slot('footer')
            {{ $products->appends(request()->query())->links() }}
            @endslot
        @endif
        @endcomponent
</x-layout>