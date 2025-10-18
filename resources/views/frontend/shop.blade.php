@extends('frontend.layout')
@section('styles')
        <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
@endsection

@section('content')
    <section class="hero-shop">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>@lang('frontend.navbar.shop')</h2>
                    <div>
                        <a href="{{ route('front.home') }}">@lang('frontend.navbar.home')</a>
                        <a href="{{ route('front.shop') }}">@lang('frontend.navbar.shop')</a>
                    </div>
                </div>
                <div class="col-md-6"></div>
            </div>
        </div>
    </section>

    <div class="d-flex justify-content-between align-items-center mb-3">

        <button type="button" class="btn btn-light d-flex align-items-center gap-2" id="toggleFilters">
            <i class="fas fa-filter"></i> {{ __('frontend.filter') }}
        </button>

        <form method="GET" action="{{ route('front.shop') }}" class="d-flex align-items-center">
            <input type="hidden" name="text" value="{{ request('text') }}">
            <input type="hidden" name="category_id" value="{{ request('category_id') }}">
            <input type="hidden" name="min_price" value="{{ request('min_price') }}">
            <input type="hidden" name="max_price" value="{{ request('max_price') }}">
            <input type="hidden" name="availability" value="{{ request('availability') }}">

            <select name="sort" onchange="this.form.submit()" class="form-select form-select-sm">
                <option value="">{{ __('frontend.sort_by') }}</option>
                <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>
                    {{ __('frontend.low_to_high') }}
                </option>
                <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>
                    {{ __('frontend.high_to_low') }}
                </option>
                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>
                    {{ __('frontend.newest') }}
                </option>
                <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>
                    {{ __('frontend.oldest') }}
                </option>
            </select>
        </form>
    </div>

    <section>
        <div class="container">
            <div class="row gy-5">
                <!--filters -->
                <div class="col-lg-3" id="filtersSection" style="display: none;">
                    <form method="GET" action="{{ route('front.shop') }}" class="p-3 bg-light rounded shadow-sm">
                        <input type="hidden" name="text" value="{{ request('text') }}">

                        <!-- الفئة -->
                        <div class="mb-4">
                            <label class="form-label fw-bold text-muted small mb-2">{{ __('frontend.categories') }}</label>
                        <div class="position-relative">
                            <select name="category_id" class="rounded-3 category-select" style="z-index: 1000">
                                <option value="">{{ __('frontend.all_categories') }}</option>
                                @foreach ($categories as $main)
                                    <option value="{{ $main->id }}" {{ request('category_id') == $main->id ? 'selected' : '' }}>
                                        {{ $main->name }}
                                    </option>
                                    @foreach ($main->subCategories as $sub1)
                                        <option value="{{ $sub1->id }}" {{ request('category_id') == $sub1->id ? 'selected' : '' }}>
                                            {{ $main->name }} > {{ $sub1->name }}
                                        </option>
                                        @foreach ($sub1->subCategories as $sub2)
                                            <option value="{{ $sub2->id }}" {{ request('category_id') == $sub2->id ? 'selected' : '' }}>
                                                {{ $main->name }} > {{ $sub1->name }} > {{ $sub2->name }}
                                            </option>
                                        @endforeach
                                    @endforeach
                                @endforeach
                            </select>

                            <button type="button" id="openCategoryDropdown"
                                class="btn position-absolute top-50 end-0 translate-middle-y me-2 p-0 border-0 bg-transparent"
                                style="z-index: 2000;">
                                <i class="fas fa-caret-down"></i>
                            </button>
                        </div>

                        </div>
                        <!-- السعر -->
                        <div class="mb-4">
                            <label class="form-label fw-bold text-muted small mb-2">{{ __('frontend.price_range') }}</label>
                            <div class="d-flex align-items-center">
                                <input type="range" name="min_price" class="form-range" min="0" max="5000" step="10"
                                    value="{{ request('min_price', 0) }}" id="minPriceRange">
                                <input type="range" name="max_price" class="form-range" min="0" max="10000" step="10"
                                    value="{{ request('max_price', 10000) }}" id="maxPriceRange">
                            </div>
                            <div class="d-flex justify-content-between mt-2">
                                <span class="price-range-value" id="minPriceLabel">{{ request('min_price', 0) }}</span>
                                <span class="price-range-value" id="maxPriceLabel">{{ request('max_price', 10000) }}</span>
                            </div>
                        </div>


                        <!-- حالة التوفر -->
                        <div class="mb-4">
                            <label
                                class="form-label fw-bold text-muted small mb-2">{{ __('frontend.availability') }}</label>
                            <select name="availability" class="form-select rounded-3">
                                <option value="">{{ __('frontend.all') }}</option>
                                <option value="available" {{ request('availability') == 'available' ? 'selected' : '' }}>
                                    {{ __('frontend.available') }}
                                </option>
                                <option value="unavailable" {{ request('availability') == 'unavailable' ? 'selected' : '' }}>
                                    {{ __('frontend.unavailable') }}
                                </option>
                            </select>
                        </div>

                        <!-- زرار الفلترة -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary rounded-pill">{{ __('frontend.filter') }}</button>
                        </div>

                    </form>
                </div>


                <div class="col-lg-9">

                    <div class="row gy-4 ">
                        @foreach ($products as $product)
                            <div class="col-lg-4 col-6 cursor-pointer wow animate__fadeInUp">
                                <div class="healthy-product mb-lg-0">
                                    <div class="healthy-product-img">
                                        <a href="{{ route('front.product', $product) }}">
                                            <img src="{{ $product->main_image }}" alt="{{ $product->name }}">
                                        </a>

                                        @if ($product->stock > 0)
                                            <div class="add-to-cart">
                                                <a href="#/"
                                                    onclick="carting({ id: '{{ $product->id }}', name: '{{ $product->name }}', price: {{ $product->price }}, quantity: 1, image: '{{ $product->main_image }}' }); showCheckmark(this);">
                                                    @lang('frontend.add_to_cart')
                                                </a>
                                                <div class="checkmark-overlay">
                                                    <i class="fa-solid fa-circle-check"></i>
                                                </div>
                                            </div>
                                        @else
                                            <div class="add-to-cart">
                                                <a href="#/" class="btn btn-warning"
                                                    onclick="outofstock({ product: '{{ $product->id }}' , to: '{{ auth()->id() }}'})">
                                                    @lang('frontend.out_of_stock')
                                                </a>
                                            </div>
                                        @endif


                                    </div>
                                    <span>{{ $product->category->name }}</span>
                                    <a href="{{ route('front.product', $product) }}">{{ $product->name }}</a>
                                    <h6>{{ $product->price }} @lang('frontend.currency')</h6>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{-- add no products yet --}}
                    @if (count($products) == 0)
                        <div class="col-lg-4 col-6 cursor-pointer wow animate__fadeInUp">
                            <p class="text-center">No Products Yet</p>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-12">
                                <nav class="d-flex justify-content-center">
                                    {{ $products->appends(request()->query())->links('vendor.pagination.custom') }}
                                </nav>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggleButton = document.getElementById('toggleFilters');
            const filtersSection = document.getElementById('filtersSection');

            if (window.innerWidth >= 992) {
                filtersSection.style.display = 'block';
            } else {
                filtersSection.style.display = 'none';
            }

            toggleButton.addEventListener('click', function () {
                if (filtersSection.style.display === 'none') {
                    filtersSection.style.display = 'block';
                } else {
                    filtersSection.style.display = 'none';
                }
            });
        });
    </script>
    <script>
       const selectInstance = new TomSelect('.category-select', {
            create: false,
            allowEmptyOption: true,
            placeholder: '🔍...',
            maxOptions: 100,
        });

        // ربط الزر بالسلكت
        document.getElementById('openCategoryDropdown').addEventListener('click', function () {
            selectInstance.open(); // فتح القائمة
        });

    </script>

@endsection