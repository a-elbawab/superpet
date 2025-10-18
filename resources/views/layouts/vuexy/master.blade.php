<!DOCTYPE html>
<html dir="{{ Locales::getDir() }}" lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ $title ? $title . ' | ' . app_name() : app_name() }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="PUSHER_APP_KEY" content="{{ config('broadcasting.connections.pusher.key') }}">
    <meta name="PUSHER_APP_CLUSTER" content="{{ config('broadcasting.connections.pusher.options.cluster') }}">
    <meta name="PUSHER_APP_HOST" content="{{ config('broadcasting.connections.pusher.options.host') }}">
    <meta name="PUSHER_APP_PORT" content="{{ config('broadcasting.connections.pusher.options.port') }}">

    <link rel="icon" href="{{ app_favicon() }}" type="image/x-icon" />

    <!-- Admin Lte -->
    @if (Locales::getDir() == 'rtl')
        <link rel="stylesheet" href="{{ asset('dashboard/vendors/css/vendors-rtl.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/dashboard/core.rtl.css') }}" />
        <link rel="stylesheet" href="{{ asset('dashboard/css/base/core/menu/menu-types/vertical-menu.rtl.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/dashboard/style.rtl.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/vuexy.rtl.css') }}" />
    @else
        <link rel="stylesheet" href="{{ asset('dashboard/vendors/css/vendors.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/dashboard/core.css') }}" />
        <link rel="stylesheet" href="{{ asset('dashboard/css/base/core/menu/menu-types/vertical-menu.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/dashboard/style.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/vuexy.css') }}" />
    @endif


    <link rel="stylesheet" href="{{ asset('dashboard/vendors/css/ui/prism.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/dashboard/overrides.css') }}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
        integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @stack('styles')
</head>

<body class="vertical-layout h-100 vertical-menu-modern menu-expanded navbar-floating footer-static"
    data-menu="vertical-menu-modern" data-col="2-column" data-open="hover" data-layout="light" data-framework="laravel"
    data-asset-path="{{ asset('/') }}">

    <nav class="navbar header-navbar navbar navbar-shadow align-items-center navbar-light navbar-expand floating-nav"
        data-nav="brand-center">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="javascript:void(0);"><i class="ficon"
                                data-feather="menu"></i></a></li>
                </ul>
            </div>
            <ul class="nav navbar-nav align-items-center ml-auto">
                <li class="nav-item dropdown dropdown-language">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0);" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="flag-icon flag-icon-{{ Locales::getFlag() }}"></i>
                        <span class="selected-language">{{ Locales::getName() }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-flag">
                        @foreach (Locales::get() as $locale)
                            <a class="dropdown-item" href="{{ route('locale', $locale->code) }}">
                                <i
                                    class="flag-icon flag-icon-{{ Str::remove(['.png', '/images/flags/'], $locale->flag) }}"></i>
                                {{ $locale->name }}
                            </a>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0);" id="notificationToggle"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="notification-icon" data-feather="bell"></i>
                        <span class="badge badge-pill badge-danger badge-up">
                            {{ auth()->user()?->unreadNotifications()->count() }}
                        </span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" id="notificationList">
                        <p class="dropdown-item text-center mb-0">@lang('dashboard.no_new_notifications')</p>
                    </div>
                </li>


                <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon"
                            data-feather="moon"></i></a></li>
                <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link"
                        id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none">
                            <span class="user-name font-weight-bolder">{{ auth()->user()?->name }}</span>
                            <span class="user-status">{{ auth()->user()?->type }}</span>
                        </div>
                        <span class="avatar">
                            <img class="round" src="{{ auth()->user()?->getAvatar() }}"
                                alt="{{ auth()->user()?->name }}" height="40" width="40">
                            <span class="avatar-status-online"></span>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                        <a class="dropdown-item" href="#"
                            onclick="event.preventDefault();document.getElementById('logoutForm').submit()">
                            <i class="mr-50" data-feather="power"></i>
                            @lang('dashboard.auth.logout')
                        </a>
                        <form style="display: none;" action="{{ route('logout') }}" method="post" id="logoutForm">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <div id="app">
        <div class="main-menu menu-fixed menu-accordion menu-shadow expanded menu-light" data-scroll-to-active="true">
            <div class="navbar-header">
                <ul class="nav navbar-nav flex-row">
                    <li class="nav-item mr-auto">
                        <a class="navbar-brand" href="{{ route('dashboard.home') }}">
                            <span class="brand-logo">
                                <img src="{{ app_logo() }}" alt="{{ app_name() }}">
                            </span>
                            <h2 class="brand-text">{{ app_name() }}</h2>
                        </a>
                    </li>
                    <li class="nav-item nav-toggle">
                        <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                            <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                            <i class="d-none d-xl-block collapse-toggle-icon font-medium-4 text-primary"
                                data-feather="disc" data-ticon="disc"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="shadow-bottom"></div>
            <div class="main-menu-content">
                <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                    @include('layouts.sidebar')
                </ul>
            </div>
        </div>

        <div class="app-content content">
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>

            <div class="content-wrapper boxed">
                @include('flash::message')

                <div class="row content-header">
                    <div class="content-header-left mb-2 col-md-9 col-12">
                        <div class="row breadcrumbs-top">
                            <div class="col-12">
                                <h2 class="content-header-title float-left mb-0">{{ $title }}</h2>
                                @isset($breadcrumbs)
                                    {{ Breadcrumbs::render(...$breadcrumbs) }}
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content-body">
                    <div class="row match-height">
                        <div class="col-lg-12">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="sidenav-overlay"></div>
        <div class="drag-target"></div>

        <footer class="footer footer-light">
            <p class="clearfix mb-0">
                <span class="float-md-left d-block d-md-inline-block mt-25">
                    {{ app_copyright() }}
                </span>
                <span class="float-md-right d-none d-md-block">
                    Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                </span>
            </p>
        </footer>
    </div>

    <script src="{{ asset('dashboard/vendors/js/vendors.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/js/ui/prism.min.js') }}"></script>
    <script src="{{ asset('js/dashboard/app-menu.js') }}"></script>
    <script src="{{ asset('js/dashboard/app.js') }}"></script>

    <!-- Vendors -->
    <script src="{{ asset('dashboard/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('dashboard/vendors/js/editors/quill/quill.min.js') }}"></script>

    <script src="{{ asset('js/vuexy.js') }}"></script>

    <script type="text/javascript">
        $(window).on('load', function () {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
    <script>
        document.getElementById('notificationToggle').addEventListener('click', function () {
            fetch('{{ route('dashboard.notifications.list') }}')
                .then(response => response.text())
                .then(html => {
                    document.getElementById('notificationList').innerHTML = html;
                });
        });

        function fetchNotificationCount() {
            fetch('{{ route('dashboard.notifications.count') }}')
                .then(response => response.json())
                .then(data => {
                    const badge = document.querySelector('.notification-icon + .badge');
                    if (badge) {
                        badge.textContent = data.count > 0 ? data.count : '';
                    }
                });
        }

        fetchNotificationCount();
        setInterval(fetchNotificationCount, 10000);
    </script>

    @stack('scripts')

</body>

</html>