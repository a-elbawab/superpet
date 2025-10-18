@extends('frontend.layout')
@section('content')

        <div class="body-content">
            <section class="hero-shop">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>@lang('frontend.navbar.about')</h2>
                            <div>
                                <a href="{{ route('front.home') }}">@lang('frontend.navbar.home')</a>
                                /
                                <a href="#">{{ $post->name }}</a>
                            </div>
                        </div>
                        <div class="col-md-6"></div>
                    </div>
                </div>

            </section>


            <section class="about">
                <div class="container pt-5">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="about-text">
                                <h2>{{ $post->name }}</h2>
                                <p>{!! $post->paragraph !!}</p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="about-img text-center">
                                <img src="{{ $post->getFirstMediaUrl() }}" class="" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
@endsection