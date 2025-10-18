<x-layout :title="$product->name" :breadcrumbs="['dashboard.products.show', $product]">
    <div class="row">
        <div class="col-md-12">
            @component('dashboard::components.box')
            @slot('class', 'p-0')
            @slot('bodyClass', 'p-0')

            <table class="table table-striped table-middle">
                <tbody>
                    <tr>
                        <th width="200">@lang('products.attributes.name')</th>
                        <td>{{ $product->name }}</td>
                    </tr>
                    <tr>
                        <th width="200">@lang('products.attributes.code')</th>
                        <td>{{ $product->code }}</td>
                    </tr>

                    <tr>
                        <th width="200">@lang('products.attributes.description')</th>
                        <td>{!! $product->description !!}</td>
                    </tr>
                    <tr>
                        <th width="200">@lang('products.attributes.meta_keywords')</th>
                        <td>{{ $product->meta_keywords }}</td>
                    </tr>
                    <tr>
                        <th width="200">@lang('products.attributes.meta_description')</th>
                        <td>{{ $product->meta_description }}</td>
                    </tr>
                    <tr>
                        <th width="200">@lang('products.attributes.price')</th>
                        <td>{{ $product->price }}</td>
                    </tr>
                    <tr>
                        <th width="200">@lang('products.attributes.old_price')</th>
                        <td>{{ $product->old_price }}</td>
                    </tr>
                    <tr>
                        <th width="200">@lang('products.attributes.stock')</th>
                        <td>{{ $product->stock }}</td>
                    </tr>
                    <tr>
                        <th width="200">@lang('products.attributes.active')</th>
                        <td>{{ $product->active ? __('Yes') : __('No') }}</td>
                    </tr>
                    @if (isset($product->parent))
                        <tr>
                            <th width="200">@lang('products.attributes.parent')</th>
                            <td><a href="{{ route('dashboard.products.show', $product->parent) }}">{{ $product->parent->name }}
                                </a></td>
                        </tr>
                    @else
                        <tr>
                            <th width="200">@lang('products.attributes.children')</th>
                            <td>
                                @foreach ($product->products as $child)
                                    <a href="{{ route('dashboard.products.show', $child) }}">{{ $child->name }}</a>
                                @endforeach
                            </td>
                        </tr>
                    @endif
                    <tr>
                        <th width="200">@lang('products.attributes.category_id')</th>
                        <td>{{ $product->category?->name }}</td>
                    </tr>
                    <tr>
                        <th width="200">@lang('products.attributes.sub_category_id')</th>
                        <td>{{ $product->subCategory?->name }}</td>
                    </tr>
                    <tr>
                        <th width="200">@lang('products.attributes.sub_category_id2')</th>
                        <td>{{ $product->subCategory2?->name }}</td>
                    </tr>
                    <tr>
                        <th width="200">@lang('products.attributes.tags')</th>
                        <td>
                            @foreach ($product->tags as $tag)
                                <span class="badge badge-primary">{{ $tag->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th width="200">@lang('products.attributes.main_image')</th>
                        <td>
                            <file-preview :media="{{ $product->getMediaResource('main_image') }}"></file-preview>
                        </td>
                    </tr>
                    <tr>
                        <th width="200">@lang('products.attributes.images')</th>
                        <td>
                            <file-preview :media="{{ $product->getMediaResource('images') }}"></file-preview>
                        </td>
                    </tr>
                    <tr>
                        <th width="200">@lang('products.attributes.created_at')</th>
                        <td>{{ $product->created_at }}</td>
                    </tr>

                    @if ($product->variations->count())
                        <tr>
                            <th width="200">@lang('products.attributes.variations')</th>
                            <td>
                                <style>
                                    .product-variation-badge {
                                        display: inline-block;
                                        margin: 2px;
                                        font-size: 12px;
                                        padding: 4px 8px;
                                        background-color: #e9ecef;
                                        border-radius: 4px;
                                    }
                                </style>

                                <table class="table table-hover table-bordered table-sm text-center align-middle mb-0">
                                    <thead>
                                        <tr class="table-secondary">
                                            <th>@lang('products.attribute')</th>
                                            <th>@lang('products.price')</th>
                                            <th>@lang('products.stock')</th>
                                            <th>@lang('products.attributes.image')</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product->variations as $variation)
                                            @php
        $combination = collect($variation->combination);
        $values = \App\Models\Variation::with('attribute')
            ->whereIn('id', $combination)
            ->get()
            ->sortBy(fn($v) => $v->attribute->name);
                                            @endphp

                                            <tr>
                                                <td>
                                                    @foreach ($values as $v)
                                                        <span class="product-variation-badge">
                                                            {{ $v->attribute->name }}: {{ $v->name }}
                                                        </span>
                                                    @endforeach
                                                </td>
                                                <td>{{ $variation->price_override ?? '-' }}</td>
                                                <td>{{ $variation->quantity }}</td>

                                                <td>
                                                    @if ($variation->hasMedia('image'))
                                                        <a href="{{ $variation->getFirstMediaUrl('image') }}" target="_blank">
                                                            <img width="60" class="img-thumbnail"
                                                                src="{{ $variation->getFirstMediaUrl('image') }}" />
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    @endif


                </tbody>
            </table>

            @slot('footer')
            @include('dashboard.products.partials.actions.edit')
            @include('dashboard.products.partials.actions.delete')
            @include('dashboard.products.partials.actions.restore')
            @include('dashboard.products.partials.actions.forceDelete')
            @endslot
            @endcomponent
        </div>
    </div>
    @if (!$product->parent_id)
        @component('dashboard::components.table-box')
        @slot('title')
        @lang('products.attributes.children') ({{ $products->total() }})
        @endslot

        <thead>
            <tr>
                <th colspan="100">
                    <div class="d-flex">
                        <x-check-all-delete type="{{ \App\Models\Product::class }}"
                            :resource="trans('products.plural')"></x-check-all-delete>

                        <div class="ml-2 d-flex justify-content-between flex-grow-1">
                            @include('dashboard.products.partials.actions.create')
                        </div>
                    </div>
                </th>
            </tr>
            <tr>
                <th style="width: 30px;" class="text-center">
                    <x-check-all></x-check-all>
                </th>
                <th>@lang('products.attributes.name')</th>
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

            @if ($products->hasPages())
                @slot('footer')
                {{ $products->appends(request()->query())->links() }}
                @endslot
            @endif
            @endcomponent
    @endif
        @include('dashboard.category_products.index')
</x-layout>