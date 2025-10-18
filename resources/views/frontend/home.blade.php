@extends('frontend.layout')
@section('styles')
<link rel="stylesheet"
href="{{ url('/') }}/website/css/home.css?v={{ filemtime(public_path('website/css/home.css')) }}">
@endsection
@section('content')
    <section class="hero  position-relative " id="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div id="carouselExampleAutoplaying" class="carousel slide position-relative" data-bs-ride="carousel"
                        data-bs-interval="3000">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                        </div>
                        <div class="carousel-inner">
                            @foreach ($sliders as $slider)
                                <div class="carousel-item @if ($loop->index == 0) active @endif">
                                    <div class="row gy-4 align-items-center">
                                        <div class="col-lg-5 d-none d-lg-block">
                                            <div class="hero-text">
                                                <h1>{{ $slider->paragraph}}</h1>
                                                <h3>{{ $slider->paragraph2 }}</h3>
                                            </div>
                                        </div>
                                        <div class="col-lg-7 position-relative">
                                            <div class="hero-img">
                                                <img src="{{ $slider->getFirstMediaUrl('image') }}" class="w-90 z-3"
                                                    alt="{{ $slider->paragraph }}" />
                                                <img src="{{ url('/') }}/website/img/hero-2.png" class="img-1" alt="" />
                                                <div class="hero-text-overlay d-block d-lg-none">
                                                    <h1>{{ $slider->paragraph}}</h1>
                                                    <h3>{{ $slider->paragraph2 }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{-- <div class="carousel-item active">
                                <div class="row gy-4 align-items-center">
                                    <div class="col-lg-5 d-none d-lg-block">
                                        <div class="hero-text">
                                            <h1>@lang('frontend.slider_title1')</h1>
                                            <h3>@lang('frontend.slider_description1')</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 position-relative">
                                        <div class="hero-img">
                                            <img src="{{ url('/') }}/website/img/slider2.png" class="w-90 z-3"
                                                alt="person img" />
                                            <img src="{{ url('/') }}/website/img/hero-2.png" class="img-1" alt="" />
                                            <div class="hero-text-overlay d-block d-lg-none">
                                                <h1>@lang('frontend.slider_title1')</h1>
                                                <h3>@lang('frontend.slider_description1')</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row gy-4 align-items-center">
                                    <div class="col-lg-5 d-none d-lg-block">
                                        <div class="hero-text">
                                            <h1>@lang('frontend.slider_title2')</h1>
                                            <h3>@lang('frontend.slider_description2')</h3>
                                        </div>
                                    </div>
                                    <div class="col-lg-7 position-relative">
                                        <div class="hero-img">
                                            <img src="{{ url('/') }}/website/img/slider3.png" class="w-90 z-3"
                                                alt="person img" />
                                            <img src="{{ url('/') }}/website/img/hero-2.png" class="img-1" alt="" />
                                            <div class="hero-text-overlay d-block d-lg-none">
                                                <h1>@lang('frontend.slider_title2')</h1>
                                                <h3>@lang('frontend.slider_description2')</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <img src="{{ url('/') }}/website/img/hero-bg-1.png" alt="hero-shaps" class="img-22">
                    <img src="{{ url('/') }}/website/img/hero-bg-2.png" alt="hero-shaps" class="img-33">
                    <img src="{{ url('/') }}/website/img/hero-bg-1.png" alt="hero-shaps" class="img-44">
                </div>
            </div>
        </div>
    </section>

    <div class="py-3 py-lg-3 pt-lg-5 wow animate__fadeInUp">
        <div class="container">
            <div class="row row-col-xl justify-content-center row-cols-2 row-cols-md-3 row-cols-lg-5">
                @foreach ($categories as $item)
                    <div class="col">
                        <a class="boxicons d-block my-3 wow animate__fadeInUp"
                            href="{{ route('front.shop', ['category_id' => $item->id]) }}"
                            style="visibility: visible; animation-name: fadeInUp;">
                            <div
                                class="boxicons__icon position-relative rounded-circle mx-auto d-flex align-items-center justify-content-center mb-4">
                                <img class="img-fluid d-block mx-auto" src="{{ $item->getFirstMediaUrl('image') }}" alt="">
                            </div>
                            <p class="font-w700 mb-0 text-center font-20 line-12 font-md-30 font-w500">
                                {{  $item['name'] }}
                            </p>
                        </a>
                    </div>
                @endforeach
                <div class="col">
                    <a class="boxicons d-block my-3 wow animate__fadeInUp" href="{{route('front.services')}}"
                        style="visibility: visible; animation-name: fadeInUp;">
                        <div
                            class="boxicons__icon position-relative rounded-circle mx-auto d-flex align-items-center justify-content-center mb-4">
                            <img class="img-fluid d-block mx-auto" src="{{url('/')}}/website/img/icons8-pet-care-100.png"
                                alt="">
                        </div>
                        <p class="font-w700 mb-0 text-center font-20 line-12 font-md-30 font-w500">
                            @lang('frontend.navbar.services')
                        </p>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <section class="product py-3  wow animate__fadeInUp">
        <div class="container">
            <div class="gap no-top products-section py-3">
                <div class="container">
                    <div class="information text-center">
                        <h3 class=" text-start">@lang('frontend.best_offers')</h3>
                        <div class="boder-bar"></div>
                    </div>
                    <div class="product-carousel">
                        @foreach ($offers as $product)
                            <div class="product-item">
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
                                    @if ($product->old_price && $product->old_price > $product->price)
                                        <h6 class="mb-1">
                                            <del class="text-muted fw-bold me-1">{{ $product->old_price }} @lang('frontend.currency')</del>
                                            <span class="text-danger fw-bold">{{ $product->price }} @lang('frontend.currency')</span>
                                        </h6>
                                        <div class="discount-label bg-success text-white rounded px-2 py-1 d-inline-block" style="font-size: 13px;">
                                            -{{ ceil(($product->old_price - $product->price) / $product->old_price * 100) }}%
                                        </div>
                                    @else
                                        <h6>{{ $product->price }} @lang('frontend.currency')</h6>
                                    @endif

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                </d>
                <section class="gap no-top products-section py-3">
                    <div class="container">
                        <div class="information text-center">
                            <h3 class=" text-start">@lang('frontend.best_sellers')</h3>
                            <div class="boder-bar"></div>
                        </div>
                        <div class="product-carousel">
                            @foreach ($bestSellers as $product)
                                <div class="product-item">
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
                    </div>
                </section>
                <section class="gap no-top products-section py-3">
                    <div class="container">
                        <div class="information text-center">
                            <h3 class=" text-start">@lang('frontend.recently_arrived')</h3>
                            <div class="boder-bar"></div>
                        </div>
                        <div class="product-carousel">
                            @foreach ($recentlyArrived as $product)
                                <div class="product-item">
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
                    </div>
                </section>
            </div>
    </section>
    <div class="blog py-4  wow animate__fadeInUp">
        <div class="container">
            <div class="header text-center pb-5">
                <img src="{{ url('/') }}/website/img/header-img.png" alt="heading-img">
                <h6>@lang('frontend.blog_and_news')</h6>
                <h2>@lang('frontend.recent_articles')</h2>
            </div>
            <div class="row">
                @foreach ($posts as $post)
                    <div class="col-lg-4 col-md-6 wow animate__fadeInUp">
                        <div class="blog-style">
                            <figure>
                                <a href="{{ route('front.posts.show', $post) }}"><img src="{{ $post->getFirstMediaUrl() }}"
                                        alt="img"></a>
                            </figure>
                            <a href="{{ route('front.posts.show', $post) }}">
                                <h6>{{ $post->created_at->diffForHumans() }}</h6>
                            </a>
                            <div class="blog-style-text">
                                <div>
                                    <a href="{{ route('front.posts.show', $post) }}">
                                        <h3>{{ $post->name }}</h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="svgblock2 ">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 100">
            <path style="transform: translateY(1px);"
                d="M1260,1.65c-60-5.07-119.82,2.47-179.83,10.13s-120,11.48-180,9.57-120-7.66-180-6.42c-60,1.63-120,11.21-180,16a1129.52,1129.52,0,0,1-180,0c-60-4.78-120-14.36-180-19.14S60,7,30,7H0v93H1440V30.89C1380.07,23.2,1319.93,6.15,1260,1.65Z">
            </path>
        </svg>
    </div>
    <div class="boxdownwithfooter pt-5 pt-lg-5 bg-secondary text-white d-none d-lg-block">
        <div class="container">

            <div class="header text-center">
                <div class="bg-white icon">
                    <img src="{{ url('/') }}/website/img/header-img.png" alt="heading-img">
                </div>
                <h2 class="text-white">@lang('frontend.partners')</h2>
            </div>

            <div class="d-flex flex-wrap align-items-center justify-content-center">
                <div class="m-2 p-4 bg-white rounded-xl wow animate__fadeInUp">
                    <img style="width: 90px" class="img-fluid img-h70" src="{{ url('/') }}/website/img/p-1.webp" alt="">
                </div>
                <div class="m-2 p-4 bg-white rounded-xl wow animate__fadeInUp">
                    <img style="width: 90px" class="img-fluid img-h70" src="{{ url('/') }}/website/img/p-2.png" alt="">
                </div>
                <div class="m-2 p-4 bg-white rounded-xl wow animate__fadeInUp">
                    <img style="width: 90px" class="img-fluid img-h70" src="{{ url('/') }}/website/img/p-3.png" alt="">
                </div>
                <div class="m-2 p-4 bg-white rounded-xl wow animate__fadeInUp">
                    <img style="width: 90px" class="img-fluid img-h70" src="{{ url('/') }}/website/img/p-4.png" alt="">
                </div>
                <div class="m-2 p-4 bg-white rounded-xl wow animate__fadeInUp">
                    <img style="width: 90px" class="img-fluid img-h70" src="{{ url('/') }}/website/img/p-5.webp" alt="">
                </div>
                <div class="m-2 p-4 bg-white rounded-xl wow animate__fadeInUp">
                    <img style="width: 90px" class="img-fluid img-h70" src="{{ url('/') }}/website/img/p-6.png" alt="">
                </div>
                <div class="m-2 p-4 bg-white rounded-xl wow animate__fadeInUp">
                    <img style="width: 90px" class="img-fluid img-h70" src="{{ url('/') }}/website/img/p-7.png" alt="">
                </div>
                <div class="m-2 p-4 bg-white rounded-xl wow animate__fadeInUp">
                    <img style="width: 90px" class="img-fluid img-h70" src="{{ url('/') }}/website/img/p-8.jpeg" alt="">
                </div>
                <div class="m-2 p-4 bg-white rounded-xl wow animate__fadeInUp">
                    <img style="width: 90px" class="img-fluid img-h70" src="{{ url('/') }}/website/img/p-9.jpeg" alt="">
                </div>
                <div class="m-2 p-4 bg-white rounded-xl wow animate__fadeInUp">
                    <img style="width: 90px" class="img-fluid img-h70" src="{{ url('/') }}/website/img/p-10.png" alt="">
                </div>
                <div class="m-2 p-4 bg-white rounded-xl wow animate__fadeInUp">
                    <img style="width: 90px" class="img-fluid img-h70" src="{{ url('/') }}/website/img/p-11.webp" alt="">
                </div>
                <div class="m-2 p-4 bg-white rounded-xl wow animate__fadeInUp">
                    <img style="width: 90px" class="img-fluid img-h70" src="{{ url('/') }}/website/img/p-12.webp" alt="">
                </div>
                <div class="m-2 p-4 bg-white rounded-xl wow animate__fadeInUp">
                    <img style="width: 90px" class="img-fluid img-h70" src="{{ url('/') }}/website/img/p-13.png" alt="">
                </div>
                <div class="m-2 p-4 bg-white rounded-xl wow animate__fadeInUp">
                    <img style="width: 90px" class="img-fluid img-h70" src="{{ url('/') }}/website/img/p-14.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <p class="hidden">
        At Super Pet, we are dedicated to our mission of keeping your pets healthy and happy. We specialize in providing top-notch local dog home boarding, offering a safe and comfortable environment right in your community. Our trusted pet care services ensure your furry family members receive personalized attention and a loving home-away-from-home experience, giving you complete peace of mind. Choose Super Pet for reliable, high-quality care that puts your dog's happiness first.
    </p>

    <section class="sr-only" aria-hidden="true" style="display:none">
            <ul>
                @foreach (\App\Models\Service::all() as $service)
                    <li>{{ $service->name }}</li>
                @endforeach
            </ul>
    </section>

@endsection
