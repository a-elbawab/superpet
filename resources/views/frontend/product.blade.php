@extends('frontend.layout')
@section('title', $product->name)
@section('meta_description', $metaDesc)
@section('meta_keywords', $metaKeys)
@push('meta')
    <meta property="og:title" content="{{ $product->name }}">
    <meta property="og:description" content="{{ $metaDesc }}">
    @if($product->main_image)
        <meta property="og:image" content="{{ $product->main_image }}">
    @endif
@endpush

@section('content')
    <main>
        <section class="hero-shop">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2>@lang('frontend.product_details')</h2>
                        <div>
                            <a href="{{ route('front.home') }}">@lang('frontend.navbar.home')</a>
                            /
                            <a href="{{ route('front.shop') }}">@lang('frontend.navbar.shop')</a>
                            /
                            <a href="{{ route('front.product', $product) }}">@lang('frontend.product_details')</a>
                        </div>
                    </div>
                    <div class="col-md-6"></div>
                </div>
            </div>
        </section>

        <section class="shop-details">
            <div class="container py-5">
                <div class="row gy-4 product-info-section shadow-sm">
                    <div class="col-lg-7 mt-0">
                        <div class="pd-gallery d-flex">
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                @foreach ($product->images as $key => $image)
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link @if ($key == 0) active @endif"
                                            id="{{ $image->id }}-tab" data-bs-toggle="pill"
                                            data-bs-target="#tab-{{ $image->id }}" type="button" role="tab"
                                            aria-controls="tab-{{ $image->id }}"
                                            aria-selected="{{ $key == 0 ? 'true' : 'false' }}">
                                            <img src="{{ $image->getUrl() }}" alt="{{ $product->name }}">
                                        </a>
                                    </li>
                                @endforeach
                            </ul>


                            <div class="pd-main-img position-relative">
                                <div class="tab-content position-relative" id="pills-tabContent">
                                    @foreach ($product->images as $key => $image)
                                        <div class="tab-pane fade @if ($key == 0) show active @endif"
                                            id="tab-{{ $image->id }}" role="tabpanel"
                                            aria-labelledby="{{ $image->id }}-tab" tabindex="0">
                                           <div class="img-zoom-container">
                                                <img id="mainImage-{{ $image->id }}" src="{{ $image->getUrl() }}" class="zoom-image w-100" alt="{{ $product->name }}">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-5 position-relative mt-0">
                        <div class="product-info">
                            <h3>{{ $product->name }}</h3>
                            <hr style="margin-bottom: 20px;">

                            <form class="variations_form">
                                @include('frontend.partials.save')
                                <div class="stock">
                                    <span class="price">
                                        <ins>
                                            <span class="woocommerce-Price-amount amount">
                                                <bdi>
                                                    <span
                                                        class="woocommerce-Price-currencySymbol"></span>{{ $product->price }}
                                                    @lang('frontend.currency')
                                                </bdi>
                                            </span>
                                        </ins>
                                        <del>
                                            <span class="woocommerce-Price-amount">
                                                <bdi>
                                                    <span
                                                        class="woocommerce-Price-currencySymbol"></span>{{ $product->old_price }}
                                                    @lang('frontend.currency')
                                                </bdi>
                                            </span>
                                        </del>
                                    </span>
                                </div>
                                <hr class="my-4">
                                <div class="add-to-cart">
                                                        <a href="#/"
                                                            onclick="carting({ id: '{{ $product->id }}', name: '{{ $product->name }}', price: {{ $product->price }}, quantity: 1, image: '{{ $product->main_image }}' }); showCheckmark(this);">
                                                            @lang('frontend.add_to_cart')
                                                        </a>
                                                        <div class="checkmark-overlay">
                                                            <i class="fa-solid fa-circle-check"></i>
                                                        </div>
                                                    </div>
                                <hr class="my-4">
                                <ul class="product_meta mt-2">
                                    <li><span class="theme-bg-clr">@lang('frontend.category') :</span>
                                        <ul class="pd-cat">
                                            <li>
                                                <a href="#">{{ $product->category->name }}</a>,
                                                <a href="#">{{ $product->subcategory?->name , $product->subCategory2?->name }}</a> ,
                                            @foreach($product->categoryProducts as $cp)
                                                <a href="#">{{ $cp->category?->name }}</a>
                                                @if($cp->subCategory)
                                                    , <a href="#">{{ $cp->subCategory?->name }}</a>
                                                @endif
                                                @if($cp->subCategory2)
                                                    , <a href="#">{{ $cp->subCategory2?->name }}</a>
                                                @endif
                                            @endforeach
                                            </li>
                                        </ul>
                                    </li>
                                    <li><span class="theme-bg-clr">@lang('frontend.tags'):</span>
                                        <ul class="pd-tag">
                                            <li>
                                                @foreach ($product->tags as $tag)
                                                    <a href="#">{{ $tag->name }}</a>,
                                                @endforeach
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="information pb-5">
            <div class="container">
                <div class="row product-info-section">
                    <div class="col-lg-12">
                        <h3>@lang('frontend.description')</h3>
                        <div class="boder-bar"></div>
                        <p>
                            {!! \Illuminate\Support\Str::of($product->description)
                            ->replaceMatches('/https:\/\/[^\s<>"\')]+/i', function ($m) {
                                $url = $m[0];
                                return '<a href="'.$url.'" target="_blank" rel="noopener nofollow ugc">'.$url.'</a>';
                            }) !!}
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="gap no-top products-section py-5">
            <div class="container">
                <div class="information text-center">
                    <h3 class=" text-start">@lang('frontend.related_products')</h3>
                    <div class="boder-bar"></div>
                </div>
                <div class="product-carousel">
                    @foreach ($relatedProducts as $item)
                        <div class="product-item">
                            <div class="healthy-product mb-lg-0">
                                <div class="healthy-product-img">

                                    <a href="{{ route('front.product', ['product' => $item]) }}">
                                        <img src="{{ $item->main_image }}" alt="{{ $item->name }}">
                                    </a>

                                    <div class="add-to-cart">
                                                        <a href="#/"
                                                            onclick="carting({ id: '{{ $item->id }}', name: '{{ $item->name }}', price: {{ $item->price }}, quantity: 1, image: '{{ $item->main_image }}' }); showCheckmark(this);">
                                                            @lang('frontend.add_to_cart')
                                                        </a>
                                                        <div class="checkmark-overlay">
                                                            <i class="fa-solid fa-circle-check"></i>
                                                        </div>
                                                    </div>


                                </div>
                                <span>{{ $item->category->name }}</span>
                                <a href="#/">{{ $item->name }}</a>
                                <h6>{{ $item->price }} @lang('frontend.currency')</h6>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <button onclick="topFunction()" id="scrollTopBtn" title="Go to top">
            <i class="fa-solid fa-arrow-up"></i>
        </button>
    </main>
@endsection
@section('scripts')
<script type="text/javascript" src="https://cdn.rawgit.com/igorlino/elevatezoom-plus/1.1.6/src/jquery.ez-plus.js"></script>
<script>
    $(document).ready(function() {
        $('.zoom-image').ezPlus({
            zoomType: 'inner',
            cursor: 'crosshair'
        });
    });
</script>
<script>
    $(document).ready(function() {
        const zoomImageSelector = '.zoom-image';
        const pillsTab = $('#pills-tab');

        // Function to initialize zoom on a specific image element
        function initZoom(imgElement) {
            // Destroy any existing zoom instance on all zoom images
            $(zoomImageSelector).each(function() {
                // Check if ezPlus method exists before calling
                if (typeof $(this).data('ezplus') !== 'undefined') {
                    $(this).removeData('ezplus');
                    $(this).removeAttr('style');
                    $('.zoomContainer').remove();
                }
            });

            // Initialize zoom only on the current active image
            $(imgElement).ezPlus({
                zoomType: 'inner',
                cursor: 'crosshair',
                responsive: true
            });
        }

        // 1. Initial Load: Initialize zoom on the first active image
        const initialActiveImg = pillsTab.find('.nav-link.active').closest('.pd-gallery').find('.tab-pane.active').find(zoomImageSelector);
        if (initialActiveImg.length) {
             initZoom(initialActiveImg);
        }

        // 2. Tab Change: Listen for when a new tab becomes active
        pillsTab.on('shown.bs.tab', 'a[data-bs-toggle="pill"]', function (e) {
            // Get the ID of the new active tab pane (e.g., #tab-123)
            const targetId = $(e.target).data('bs-target');

            // Find the image element inside the newly active tab pane
            const newActiveImg = $(targetId).find(zoomImageSelector);

            if (newActiveImg.length) {
                initZoom(newActiveImg);
            }
        });
    });
</script>
@endsection



