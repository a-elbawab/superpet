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

    <!--
         درجة الشفافة من 10 الى 99
         bg-op*
     -->
    <style>.color1::before {
            background-color: @if(Settings::get('login_background_color')) {{Settings::get('login_background_color')}} @else  #36B0DF @endif ;
        }
    </style>
    <div
        class="col-lg-12 boxlogin__right bg-background bg-size-cover bg-position-centercenter d-flex align-items-center bg-colored  @if(Settings::get('login_background_op')) bg-op{{Settings::get('login_background_op')}} @else bg-op70 @endif color1"
        style="background-image: url(@if(Settings::instance('loginBackground')){{Settings::instance('loginBackground')->getFirstMediaUrl('loginBackground') }} @else  {{url('/')}}/loginPage/assets/img/bg01.jpg @endif">
        <div class="flex-fill p-5 p-lg-0">
            <div class="row justify-content-center no-gutters">
                <div class="col-xl-5 col-md-6">
                    <div class="boxlogin__box rounded-xl p-4 py-lg-5">
                        <div class="text-center text-white mb-5">
                            <img class="img-fluid img-hauto mb-4" src="@if(Settings::instance('loginLogo') && Settings::instance('loginLogo')->getFirstMediaUrl('loginLogo') != ""){{ Settings::instance('loginLogo')->getFirstMediaUrl('loginLogo') }} @else {{url('/')}}/loginPage/assets/img/logo.png @endif" alt="">
                            <p class="font-18 mb-1 line-12">@lang('dashboard.auth.forget.info')</p>
                            <h1 class="font-24 m-0">{{ app_name() }}</h1>
                        </div>
                        <form action="{{ route('password.email') }}" method="post">
                            @csrf
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
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
                            <input class="btn btn-dark btn-block btn-lg font-18" type="submit" value="@lang('dashboard.auth.forget.submit')">

                            <small class="mb-1 mt-2 text-right float-right">
                                @foreach(Locales::get() as $locale)
                                    <a href="{{ route('password.request', ['language' => $locale->code]) }}"
                                       class="mx-2 text-white  {{ app()->getLocale() == $locale->code ? 'active' : '' }}">
                                        <img src="{{ $locale->flag }}" alt="">
                                        {{ $locale->name }}
                                    </a>
                                @endforeach
                            </small>
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
