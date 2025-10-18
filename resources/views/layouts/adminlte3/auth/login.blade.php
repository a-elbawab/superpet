<!doctype html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@lang('dashboard.auth.login.title') | {{  app_name() }}</title>
    @if(app()->getLocale() == 'ar')
    <link rel="stylesheet" href="{{url('/')}}/loginPage/style-rtl.css">
    @else
        <link rel="stylesheet" href="{{url('/')}}/loginPage/style.css">
    @endif
</head>
<body>

<div class="row no-gutters boxlogin">
    <div
        class="col-lg-4 boxlogin__left bg-background bg-size-contain bg-position-centerbottom text-white p-4 p-lg-5 text-center"
        style="background-color: @if(Settings::get('login_background_color')) {{Settings::get('login_background_color')}} @else  #36B0DF @endif ;">
        <div class="mt-lg-7 pt-xl-7 px-lg-4">
            <p class="font-lg-50 font-md-40 font-30 line-12 font-w400 mb-4 text-center">{!! Settings::get('login_side_text') !!}</p>
        </div>
    </div>
    <!--
         درجة الشفافة من 10 الى 99
         bg-op*
     -->
    <style>.color1::before {
            background-color: @if(Settings::get('login_background_color')) {{Settings::get('login_background_color')}} @else  #36B0DF @endif ;
        }
    </style>
    <div
        class="col-lg-8 boxlogin__right bg-background bg-size-cover bg-position-centercenter d-flex align-items-center bg-colored  @if(Settings::get('login_background_op')) bg-op{{Settings::get('login_background_op')}} @else bg-op70 @endif color1"
        style="background-image: url(@if(Settings::instance('loginBackground')){{Settings::instance('loginBackground')->getFirstMediaUrl('loginBackground') }} @else  {{url('/')}}/loginPage/assets/img/bg01.jpg @endif">
        <div class="flex-fill p-5 p-lg-0">
            <div class="row justify-content-center no-gutters">
                <div class="col-xl-5 col-md-6">
                    <div class="boxlogin__box rounded-xl p-4 py-lg-5">
                        <div class="text-center text-white mb-5">
                            <img class="img-fluid img-hauto mb-4" src="@if(Settings::instance('loginLogo') && Settings::instance('loginLogo')->getFirstMediaUrl('loginLogo') != ""){{ Settings::instance('loginLogo')->getFirstMediaUrl('loginLogo') }} @else {{url('/')}}/loginPage/assets/img/logo.png @endif" alt="">
                            <p class="font-18 mb-1 line-12">@lang('dashboard.auth.login.info')</p>
                            <h1 class="font-24 m-0">{{ app_name() }}</h1>
                        </div>
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="email"
                                       class="form-control form-control-lg text-white {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                       name="email"
                                       value="{{ old('email') }}"
                                       autofocus
                                       placeholder="@lang('dashboard.auth.login.email')">

                                @if($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="position-relative">
                                    <input type="password"
                                           class="form-control form-control-lg text-white password1 {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           required
                                           name="password"
                                           autocomplete="current-password"
                                           placeholder="@lang('dashboard.auth.login.password')">

                                    @if($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="mt-1">
                                    <a class="text-primary font-16"
                                       href="{{ route('password.request') }}">@lang('dashboard.auth.login.forget')</a>
                                </div>

                                <small class="mb-1 mt-2 text-right float-right">
                                    @foreach(Locales::get() as $locale)
                                        <a href="{{ route('login', ['language' => $locale->code]) }}"
                                           class="mx-2 text-white  {{ app()->getLocale() == $locale->code ? 'active' : '' }}">
                                            <img src="{{ $locale->flag }}" alt="">
                                            {{ $locale->name }}
                                        </a>
                                    @endforeach
                                </small>
                            </div>
                            <input class="btn btn-dark btn-block btn-lg font-18" type="submit" value="@lang('auth.login')">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="assets/js/ga-custom.js"></script>
</body>
</html>
