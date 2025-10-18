@component('dashboard::components.table-box')
@slot('title')
@lang('category_products.plural') ({{ $category_products->total() }})
@endslot

<thead>
    <tr>
        <th colspan="100">
            <div class="d-flex">
                <x-check-all-delete type="{{ \App\Models\CategoryProduct::class }}"
                    :resource="trans('category_products.plural')"></x-check-all-delete>

                <div class="ml-2 d-flex justify-content-between flex-grow-1">
                    @include('dashboard.category_products.partials.actions.create')
                </div>
            </div>
        </th>
    </tr>
    <tr>
        <th style="width: 30px;" class="text-center">
            <x-check-all></x-check-all>
        </th>
        <th>@lang('category_products.attributes.category_id')</th>
        <th>@lang('category_products.attributes.sub_category_id')</th>
        <th>@lang('category_products.attributes.sub_category_id2')</th>
        <th style="width: 160px">...</th>
    </tr>
</thead>
<tbody>
    @forelse($category_products as $category_product)
        <tr>
            <td class="text-center">
                <x-check-all-item :model="$category_product"></x-check-all-item>
            </td>
            <td>
                {{ $category_product->category->name }}
            </td>
            <td>
                {{ $category_product->subCategory?->name }}
            </td>
            <td>
                {{ $category_product->subCategory2?->name }}
            </td>

            <td style="width: 160px">
                @include('dashboard.category_products.partials.actions.edit')
                @include('dashboard.category_products.partials.actions.delete')
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="100" class="text-center">@lang('category_products.empty')</td>
        </tr>
    @endforelse

    @if($category_products->hasPages())
        @slot('footer')
        {{ $category_products->appends(request()->query())->links() }}
        @endslot
    @endif
    @endcomponent