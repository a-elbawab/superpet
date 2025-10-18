<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ Locales::getDir() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', $title ?? config('app.name'))</title>
    <meta name="description" content="@yield('meta_description', '...default...')">
    <meta name="keywords" content="@yield('meta_keywords', '')">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('meta')
    <link rel="icon" type="image/png" sizes="32x32" href="{{ url('/') }}/website/img/logo.png">
    <link rel="stylesheet"
        href="{{ url('/') }}/website/css/main.css?v={{ filemtime(public_path('website/css/main.css')) }}">
    <link rel="stylesheet"
        href="{{ url('/') }}/website/css/style.css?v={{ filemtime(public_path('website/css/style.css')) }}">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Anybody:wght@100..900&family=DynaPuff:wght@400..700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ mix('/js/frontend.js') }}" defer></script>

    @if(app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">
    @endif
    <link rel="stylesheet"
        href="{{ url('/') }}/website/css/layout.css?v={{ filemtime(public_path('website/css/layout.css')) }}">
    @yield('styles')
    @include('frontend.partials.seo')

<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-B1D9ETRK8C"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-B1D9ETRK8C');
</script>
<meta name="google-site-verification" content="1SYU1Ont3eH19cb_E-KWKpO__HFa0HLpYr8mSs1W9Qw" />

</head>

<body>
    <main>
        <!-- Start Header -->
        <div class="full-header" id="app">
            <div id="mySidenav" style="background: var(--main-color) !important;"
                class="sidenav bg-secondary text-white position-fixed h-100">
                <a class="font-17 font-w700 m-4 d-flex justify-content-between align-items-center text-white"
                    href="javascript:void(0)" onclick="openNav()">
                    <i class="fa fa-times mr-2"></i> <span>x</span>
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('front.home') }}">@lang('frontend.navbar.home')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('front.about') }}">@lang('frontend.navbar.about')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('front.shop') }}">@lang('frontend.navbar.shop')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('front.services') }}">@lang('frontend.navbar.services')</a>
                    </li>

                    @foreach ($mainCategories as $category)
                        <li class="nav-item dropdown">
                            <a class="nav-link has-submenu"
                                data-href="{{ route('front.shop', ['category_id' => $category->id]) }}" href="#"
                                onclick="{{ $category->subCategories->isEmpty() ? '' : "toggleDropdown('cat-{$category->id}-Dropdown', '#mySidenav')" }}">
                                {{ $category->name }}
                                @if (!$category->subCategories->isEmpty())
                                    <i class="fa-solid fa-chevron-down submenu-arrow"></i>
                                @endif
                            </a>
                            @if (!$category->subCategories->isEmpty())
                                <ul class="dropdown-menu" id="cat-{{ $category->id }}-Dropdown">
                                    @foreach ($category->subCategories as $child)
                                        <li>
                                            <a class="nav-link has-submenu"
                                                data-href="{{ route('front.shop', ['category_id' => $child->id]) }}"
                                                onclick="{{ $child->subCategories->isEmpty() ? '' : "toggleDropdown('sub-{$child->id}-Dropdown', '#cat-{$category->id}-Dropdown')" }}">
                                                {{ $child->name }}
                                                @if (!$child->subCategories->isEmpty())
                                                    <i class="fa-solid fa-chevron-down submenu-arrow"></i>
                                                @endif
                                            </a>
                                            @if (!$child->subCategories->isEmpty())
                                                <ul class="dropdown-menu" id="sub-{{ $child->id }}-Dropdown">
                                                    @foreach ($child->subCategories as $child2)
                                                        <li>
                                                            <a class="dropdown-item"
                                                                href="{{ route('front.shop', ['category_id' => $child2->id]) }}">
                                                                {{ $child2->name }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endforeach

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('front.contact') }}">@lang('frontend.navbar.contact')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('front.privacy') }}">@lang('frontend.privacy_policy')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{ route('front.shipping_policy') }}">@lang('frontend.shipping_policy')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"
                            href="{{ route('front.return_policy') }}">@lang('frontend.return_policy')</a>
                    </li>
                </ul>
            </div>

            <div id="sidebody" onclick="openNav()"></div>

            <header>
                <div class="container">
                    <nav class="d-flex align-items-center p-2 py-3">
                        <a href="{{ route('front.home') }}">
                            <img src="{{ url('/') }}/website/img/logo.png" alt="Pet">
                        </a>
                        <div class="d-flex flex-column flex-grow-1">

                            <div class="search-btn d-flex justify-content-between align-items-center mb-2">
                                <div
                                    class="search d-flex align-items-center {{ app()->getLocale() == 'ar' ? 'rtl-fix' : '' }}">
                                    <form action="{{ route('front.shop') }}" method="GET" class="position-relative">
                                        <div class="d-flex align-content-center">
                                            <input type="text" name="text" autocomplete="off" value="{{ request('text') }}"
                                                class="form-control rounded-end-0 w-100"
                                                placeholder="@lang('frontend.search')">
                                            <button
                                                class="btn d-block h-100 rounded-start-0 d-flex align-items-center justify-content-center"
                                                style="background-color: #b9d432;color: white;border-color: #b9d432"
                                                type="submit">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>

                                        {{-- 🔽 نتائج البحث تظهر هنا --}}
                                        <div id="search-results"
                                            class="position-absolute bg-white border rounded mt-1 w-100 d-none shadow"
                                            style="z-index: 9999;">
                                        </div>
                                    </form>

                                </div>
                                <div class="d-flex align-items-center justify-content-end">
                                    @if (Auth::check())
                                        <!-- Dropdown for logged-in user -->
                                        <div class="dropdown">
                                            <a class="btn btn-secondary dropdown-toggle d-flex align-items-center justify-content-center"
                                                href="#" role="button" id="userDropdown" data-bs-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="fa fa-user-circle me-lg-2"></i>
                                                <span class="d-block">{{ Auth::user()->name }}</span>
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="userDropdown">
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('front.me') }}">
                                                        @lang('frontend.navbar.profile')
                                                    </a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="{{ route('front.me.orders.index') }}">@lang('orders.plural')</a>
                                                </li>
                                                <li>
                                                    <hr class="dropdown-divider">
                                                </li>
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                        @lang('frontend.navbar.logout')
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>

                                        <!-- Logout form -->
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    @else
                                        <!-- Original login and signup buttons -->
                                        <a title="{{ __('frontend.navbar.login') }}"
                                            class="btn btn-sm btn-outline-primary me-1 d-flex align-items-center justify-content-center gap-1"
                                            href="{{ route('front.login') }}">
                                            <i class="fa fa-sign-in-alt"></i>
                                        </a>
                                        <a title="{{ __('frontend.navbar.registration') }}"
                                            class="btn btn-sm btn-outline-secondary me-2 d-flex align-items-center justify-content-center gap-1"
                                            href="{{ route('front.registration') }}">
                                            <i class="fa fa-user-plus"></i>
                                        </a>
                                    @endif

                                    <a class="btn btn-sm btn-light me-2 d-flex align-items-center justify-content-center"
                                        href="{{ route('change.language', app()->getLocale() == 'en' ? 'ar' : 'en') }}">
                                        @if (app()->getLocale() == 'ar')
                                            🇺🇸 E
                                        @else
                                            🇪🇬 ع
                                        @endif
                                    </a>



                                    <!-- Original cart button -->
                                    @if (!request()->routeIs('front.makeOrder'))
                                        <a class="btn btn-sm btn-secondary position-relative d-flex align-items-center gap-1"
                                            href="#" type="button" data-bs-toggle="offcanvas"
                                            data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                            <i class="fa fa-shopping-bag fs-5"></i>
                                            <span
                                                class="position-absolute border border-white border-2 text-secondary bg-primary iconcart d-flex align-items-center justify-content-center rounded-circle">
                                                0
                                            </span>
                                        </a>
                                    @endif

                                    <!-- Original mobile menu icon -->
                                    <div class="d-md-block d-lg-none toggle-icon">
                                        <i class="fa-solid fa-bars-staggered" onclick="openNav()"
                                            style="color: #000072; font-size: 24px; cursor: pointer;"></i>
                                    </div>
                                </div>

                            </div>
                            <div class="links d-flex align-items-center justify-content-between w-100">
                                <ul class="navbar-nav align-items-center flex-row">
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="{{ route('front.home') }}">@lang('frontend.navbar.home')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="{{ route('front.about') }}">@lang('frontend.navbar.about')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="{{ route('front.shop') }}">@lang('frontend.navbar.shop')</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="{{ route('front.services') }}">@lang('frontend.navbar.services')</a>
                                    </li>

                                    @foreach ($mainCategories as $category)
                                        <li class="nav-item dropdown">
                                            <a href="{{ route('front.shop', ['category_id' => $category->id]) }}"><span>{{ $category->name }}</span>
                                                <i class="fa-solid fa-chevron-down"></i></a>
                                            <ul>
                                                @foreach ($category->subCategories as $child)
                                                    <li class="dropdown">
                                                        <a href="{{ route('front.shop', ['category_id' => $child->id]) }}"><span>{{ $child->name }}</span>
                                                            <i class="fa-solid fa-chevron-right"></i></a>
                                                        <ul>
                                                            @foreach ($child->subCategories as $child2)
                                                                <li><a
                                                                        href="{{ route('front.shop', ['category_id' => $child2->id]) }}">{{ $child2->name }}</a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="{{ route('front.contact') }}">@lang('frontend.navbar.contact')</a>
                                    </li>

                                </ul>
                                <ul class="sharesocial d-flex">
                                    <li><a href="https://www.facebook.com/superpetegy?mibextid=ZbWKwL" target="_blank"
                                            class="fb fab fa-facebook-f"></a></li>
                                    <li><a href="https://www.instagram.com/superpet.egy?igsh=MXJ1bWE1eXQyOHhqcw%3D%3D"
                                            target="_blank" class="in fab fa-instagram"></a></li>
                                </ul>
                            </div>
                        </div>

                    </nav>
                </div>
            </header>


            @include('frontend.cart.cart')


        </div>
        @yield('content')
        <button onclick="topFunction()" id="scrollTopBtn" title="Go to top">
            <i class="fa-solid fa-arrow-up"></i>
        </button>
        <!-- Start Footer -->
        <footer>
            <div class="container">
                <div class="row gy-5">
                    <div class="col-xl-4 col-lg-6">
                        <div class="logo">
                            <a href="{{ route('front.home') }}">
                                <img src="{{ url('/') }}/website/img/logo.png" alt="logo" style="width: 90px;">
                            </a>
                            <p>{{Settings::locale(app()->getLocale())->get('slogan')}}</p>
                            <div class="phone">
                                <a href="https://wa.me/{{\Settings::get('whatsapp')}}" target="_blank"
                                    class="d-inline-flex align-items-center gap-2 text-decoration-none">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp" width="40"
                                        height="40" style="margin-right: 8px;">
                                </a>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6">
                        <div class="widget-title">
                            <h3>@lang('frontend.quick_links')</h3>
                            <div class="boder"></div>
                            <ul>

                                <li><i class="fa-solid fa-angle-right"></i><a
                                        href="{{ route('front.about') }}">@lang('frontend.navbar.about')</a>
                                </li>
                                <li><i class="fa-solid fa-angle-right"></i><a
                                        href="{{ route('front.shop') }}">@lang('frontend.navbar.shop')</a></li>
                                <li>
                                    <i class="fa-solid fa-angle-right"></i>
                                    <a href="{{ route('front.contact') }}">
                                        @lang('frontend.navbar.contact')
                                    </a>
                                </li>
                                <li>
                                    <i class="fa-solid fa-angle-right"></i>
                                    <a href="{{ route('front.privacy') }}">
                                        @lang('frontend.privacy_policy')
                                    </a>
                                </li>
                                <li>
                                    <i class="fa-solid fa-angle-right"></i>
                                    <a href="{{ route('front.shipping_policy') }}">
                                        @lang('frontend.shipping_policy')
                                    </a>
                                </li>
                                <li>
                                    <i class="fa-solid fa-angle-right"></i>
                                    <a href="{{ route('front.return_policy') }}">
                                        @lang('frontend.return_policy')
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-6">
                        <div class="working-hours">
                            <div class="widget-title">
                                <h3>@lang('frontend.working_hours')</h3>
                                <div class="boder"></div>
                                <div class="working-time">
                                    <h6 class="pt-0">@lang('frontend.everyday')<span>10AM - 10PM</span></h6>
                                    {{-- <div class="call-us"> --}}
                                        {{-- <img src="{{ url('/') }}/website/img/hadphon.png" alt="hadphon"> --}}
                                        {{-- <div>
                                            <a href="#">+20 111-547-7484</a>
                                            <span>Got Questions? Call us</span>
                                        </div> --}}
                                        {{-- </div> --}}
                                    <ul class="social-icon">
                                        <li><a href="https://www.facebook.com/superpetegy?mibextid=ZbWKwL"
                                                target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                                        <li><a href="https://www.instagram.com/superpet.egy?igsh=MXJ1bWE1eXQyOHhqcw%3D%3D"
                                                target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copyright">
                    <p>© <span>SuperPet</span> 2025 All Right Reserved</p>
                    <div class="d-flex align-items-center gap-3">

                    </div>
                </div>
            </div>
            <img src="{{ url('/') }}/website/img/hero-bg-1.png" alt="hero-shaps" class="img-22">
            <img src="{{ url('/') }}/website/img/hero-bg-2.png" alt="hero-shaps" class="img-33" style="left: 55%;">
            <img src="{{ url('/') }}/website/img/hero-bg-1.png" alt="hero-shaps" class="img-44" style="left: -7%;">
        </footer>

    </main>
    <!-- START BOOTSTRAP JS FILE -->
    <script src="{{ url('/') }}/website/js/bootstrap.bundle.min.js"></script>
    <!-- START JQUIRY FILE -->
    <script src="{{ url('/') }}/website/js/jquery-3.7.1.min.js"></script>
    <script src="{{ url('/') }}/website/js/wow-1.3.0.min.js"></script>
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <script src="{{ url('/') }}/website/js/main.js"></script>
    <script>
        // Inject currency symbol for use in cart.js
        const currencySymbol = "{{ __('frontend.currency') }}"; // This will be used in cart.js
    </script>
    <script src="{{ url('/') }}/website/js/checkout.js"></script>
    <script src="{{ url('/') }}/website/js/cart.js"></script>
    @yield('scripts')
    <script>
        function outofstock(data) {
            if (data.to == "") {
                Swal.fire({
                    title: '@lang('frontend.out_of_stock_no_user')',
                    html: '<a href="{{ route('front.registration') }}" target="_blank">@lang('frontend.register_to_notify')</a>',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: '@lang('frontend.contact.send')',
                });
            } else {
                $.ajax({
                    url: "{{ route('front.setOutStockNotify') }}",
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        product: data.product,
                    },
                    success: function (response) {
                        alert(response.message);
                    },
                    error: function (error) {
                        alert('@lang('frontend.error_occurred') ' + error.responseText);
                    }
                });
            }
        }


    </script>
    <script>
        function showCheckmark(element) {
            const parent = element.closest('.add-to-cart');
            const icon = parent.querySelector('.checkmark-overlay');
            if (icon) {
                icon.style.display = 'block';
                setTimeout(() => {
                    icon.style.display = 'none';
                }, 1500);
            }
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const submenuLinks = document.querySelectorAll('.has-submenu');

            submenuLinks.forEach(link => {
                let clickedOnce = false;

                link.addEventListener('click', function (e) {
                    if (!clickedOnce) {
                        e.preventDefault();
                        clickedOnce = true;
                        setTimeout(() => clickedOnce = false, 800);
                    } else {
                        window.location.href = link.dataset.href;
                    }
                });
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            let timer;
            const $input = $('input[name="text"]');
            const $results = $('#search-results');

            $input.on('input', function () {
                const query = $(this).val();
                clearTimeout(timer);

                if (query.length < 2) {
                    $results.empty().addClass('d-none');
                    return;
                }

                timer = setTimeout(function () {
                    $.get('{{ route('front.algolia.search') }}', { query }, function (data) {
                        if (!data.length) {
                            $results
                                .html('<p class="p-2 text-muted">@lang("frontend.no_results")</p>')
                                .removeClass('d-none');
                            return;
                        }

                        const html = data.map(item => {
                        console.log(item);
                            const name = item.name ?? '@lang("frontend.no_name")';
                            const price = item.price ?? 0;
                            const image = item.image ?? '{{ asset("default-product.jpg") }}';

                            return `
                            <a href="${item.url}" class="d-flex align-items-center p-2 border-bottom text-dark text-decoration-none">
                                <img src="${image}" alt="${name}" class="me-2" style="width: 40px; height: 40px; object-fit: cover;">
                                <div>
                                    <div class="fw-bold">${name}</div>
                                    <small class="text-muted">${price} {{ __('frontend.currency') }}</small>
                                </div>
                            </a>
                        `;
                        }).join('');

                        $results.html(html).removeClass('d-none');
                    });
                }, 300);
            });

            $(document).on('click', function (e) {
                if (!$(e.target).closest('#search-results, input[name="text"]').length) {
                    $results.empty().addClass('d-none');
                }
            });
        });
    </script>

    {!! NoCaptcha::renderJs() !!}

</body>

</html>
