@extends('frontend.layout')
@section('styles')
    <style>
        .form-control,
        .custom-select {
            height: 70px !important;
        }
    </style>
@endsection

@section('content')
        <section class="hero-shop">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2>@lang('frontend.navbar.registration')</h2>
                        <div>
                            <a href="/index.html">@lang('frontend.navbar.home')</a>
                            /
                            <a href="/about.html">@lang('frontend.navbar.registration')</a>
                        </div>
                    </div>
                    <div class="col-md-6"></div>
                </div>
            </div>

        </section>

        <section class="register">
            <div class="container py-5">
                @if (session()->has('errors'))
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row  py-3">
                    <div class="form-style d-lg-flex d-block justify-content-center">
                        <form class="form col-md-6 p-3 " action="{{ route('register') }}" method="POST">
                            @csrf
                            <h3 class=" fs-1 mb-3">@lang('frontend.navbar.registration')</h3>
                            <div class="form-group mb-3">
                                <input class="form-control" type="text" id="name" placeholder="Full name" name="name"
                                    value="{{ old('name') }}">
                            </div>
                            <div class="form-group mb-3">
                                <input class="form-control" type="text" id="email" placeholder="Email" name="email"
                                    value="{{ old('email') }}">
                            </div>
                            <div class="form-group mb-3">
                                <input class="form-control" type="text" id="phone" placeholder="Phone" name="phone"
                                    value="{{ old('phone') }}">
                            </div>
                            <div class="form-group mb-3">
                                <select class="form-control" id="city_id" name="city_id" placeholder="City">
                                    <option value="" disabled selected>@lang('cities.singular')</option>
                                    @foreach ($cities as $key => $city)
                                        <option value="{{ $key }}" @if (old('city_id') == $key) selected @endif>{{ $city }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <input class="form-control" type="text" id="address" placeholder="Address" name="address"
                                    value="{{ old('address') }}">
                            </div>
                            <div class="form-group mb-3">
                                <input class="form-control" type="password" id="password" placeholder="Password"
                                    name="password">
                            </div>
                            <div class="form-group mb-3">
                                <input class="form-control" type="password" id="confirmPassword"
                                    placeholder="Confirm Password" name="password_confirmation">
                            </div>
                            <div class="form-group mb-3">
                                <!-- Google Recaptcha -->
                                {!! NoCaptcha::display() !!}
                            </div>

                            <button class="d-block ms-auto">@lang('frontend.navbar.registration')</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
@endsection
@section('scripts')
    {{-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> --}}
@endsection