<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{  app_name() }}</title>
    <link rel="stylesheet" href="{{url('/')}}/loginPage/style.css">
    <link rel="icon"
          href="{{  optional(Settings::instance('logo')) ? optional(Settings::instance('logo'))->getFirstMediaUrl('logo') : app_favicon() }}"
          type="image/x-icon"/>
</head>
<body>
{{-- <li class="user-footer">
    <a href="{{ auth()->user()->dashboardProfile() }}" class="btn btn-default btn-flat">@lang('users.profile')</a>
    <a href="#"
        onclick="event.preventDefault();document.getElementById('logoutForm').submit()"
        class="btn btn-default btn-flat float-right">@lang('dashboard.auth.logout')</a>
    <form class="d-none" action="{{ route('logout') }}" method="post" id="logoutForm">
        @csrf
    </form>
</li> --}}
<div class="boxfixedheight overflow-hidden d-flex align-items-center justify-content-center position-relative">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 text-center">
                <div class="logomax mb-4 mb-lg-6">
                    <img
                        src="@if(Settings::instance('loginLogo') && Settings::instance('loginLogo')->getFirstMediaUrl('loginLogo') != ""){{ Settings::instance('loginLogo')->getFirstMediaUrl('loginLogo') }} @else {{url('/')}}/loginPage/assets/img/elnooronline-en-blue.svg @endif"
                        alt="">
                </div>
                <h1 class="font-22 font-lg-32 text-secondary mb-3">
                    @if(Settings::get('welcome_comment')) {{  Settings::get('welcome_comment') }} @else @lang('auth.welcome') {{app_name()}} @endif
                </h1>

                <a class="btn btn-dark btn-lg px-3 px-lg-5" href="{{route('login')}}">@lang('auth.login')</a>
            </div>
        </div>
    </div>
    <div class="solar_waves">
        <div class="solar_wave"></div>
        <div class="solar_wave"></div>
        <div class="solar_wave"></div>
    </div>
    <div class="shape_dot">
        <img class="img-fluid" src="{{url('/')}}/loginPage/assets/img/shape_dot.png" alt="image"/>
    </div>
    <div class="shape_wave2">
        <img class="img-fluid" src="{{url('/')}}/loginPage/assets/img/wave.png" alt="image"/>
    </div>
</div>

<script src="{{url('/')}}/loginPage/assets/js/ga-custom.js"></script>
</body>
</html>
