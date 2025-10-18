<x-layout :title="trans('category_products.trashed')" :breadcrumbs="['dashboard.category_products.trashed']">
    @include('dashboard.category_products.partials.filter')

    @component('dashboard::components.table-box')
    @slot('title')
    @lang('category_products.actions.list') ({{ $category_products->total() }})
    @endslot

    <thead>
        <tr>
            <th colspan="100">
                <x-check-all-force-delete type="{{ \App\Models\CategoryProduct::class }}"
                    :resource="trans('category_products.plural')"></x-check-all-force-delete>
                <x-check-all-restore type="{{ \App\Models\CategoryProduct::class }}"
                    :resource="trans('category_products.plural')"></x-check-all-restore>
            </th>
        </tr>
        <tr>
            <th style="width: 30px;" class="text-center">
                <x-check-all></x-check-all>
            </th>
            <th>@lang('category_products.attributes.name')</th>
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
                    <a href="{{ route('dashboard.category_products.trashed.show', $category_product) }}"
                        class="text-decoration-none text-ellipsis">
                        {{ $category_product->name }}
                    </a>
                </td>

                <td style="width: 160px">
                    @include('dashboard.category_products.partials.actions.show')
                    @include('dashboard.category_products.partials.actions.restore')
                    @include('dashboard.category_products.partials.actions.forceDelete')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100" class="text-center">@lang('category_products.empty')</td>
            </tr>
        @endforelse

        @if($category_products->hasPages())
            @slot('footer')
            {{ $category_products->links() }}
            @endslot
        @endif
        @endcomponent
</x-layout>