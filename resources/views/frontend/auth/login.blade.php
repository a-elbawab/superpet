@extends('frontend.layout')

@section('content')
        <section class="hero-shop">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2>@lang('frontend.navbar.login')</h2>
                        <div>
                            <a href="/index.html">@lang('frontend.navbar.home')</a> /
                            <a href="/login.html">@lang('frontend.navbar.login')</a>
                        </div>
                    </div>
                    <div class="col-md-6"></div>
                </div>
            </div>
        </section>

        <section class="register">
            <div class="container py-5">
                @if (session('resent'))
                    <div class="alert alert-success">
                        تم إرسال رابط التحقق إلى بريدك الإلكتروني مرة أخرى.
                    </div>
                @endif

                @if (session()->has('errors'))
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row py-3">
                    <div class="form-style d-lg-flex d-block justify-content-center">
                        <form class="form col-md-6 p-3" action="{{ route('login') }}" method="POST">
                            @csrf
                            <h3 class="fs-1 mb-3">@lang('frontend.welcome')</h3>

                            <div class="form-group mb-3">
                                <input class="form-control" type="text" id="email" placeholder="Email" name="email">
                            </div>
                            <div class="form-group mb-3">
                                <input class="form-control" type="password" id="password" placeholder="Password"
                                    name="password">
                            </div>
                            <div class="form-group mb-3">
                                {!! NoCaptcha::display() !!}
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">@lang('frontend.navbar.login')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
@endsection