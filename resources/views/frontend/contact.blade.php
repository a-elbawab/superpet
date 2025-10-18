@extends('frontend.layout')
@section('content')
    <aside>
        <!-- / END Header -->

        <div class="sliderindex text-white position-relative">
            <div class="sliderindex__slide d-flex align-items-end justify-content-center bg-background bg-size-cover bg-position-centercenter bg-colored secondary bg-op90"
                style="background-image: url({{ url('/') }}/website/assets/img/slidertitle-1.jpeg);">
                <div class="container position-relative pb-4">
                    <h1 class="font-24 font-lg-30 mb-0">
                        @lang('frontend.contact.title')
                    </h1>
                    <ol class="breadcrumb bg-transparent p-0 mt-2 mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('front.home') }}">@lang('frontend.home')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@lang('frontend.contact.title')</li>
                    </ol>
                </div>
            </div>
            <div class="sliderindex__svg position-absolute w-100">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 70">
                    <path fill="#ffffff" d="M1440,70H0V45.16a5762.49,5762.49,0,0,1,1440,0Z"></path>
                </svg>
            </div>
        </div>

        @include('frontend.errors')


        <div class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="bg-light rounded-xl p-4">
                            <div class="mb-3 d-flex">
                                <div class="mr-3">
                                    <i
                                        class="fa fa-map-marker-alt img-h40 rounded-circle bg-primary text-white d-flex align-items-center justify-content-center font-20"></i>
                                </div>
                                <div>
                                    <p class="font-18 mt-1 mb-2 font-w700 d-flex align-items-center">
                                        @lang('frontend.contact.address')
                                    </p>
                                    <p class="font-16 text-light mb-0">
                                        {{ \Settings::get('address') }}
                                    </p>
                                </div>
                            </div>
                            <div class="mb-3 d-flex">
                                <div class="mr-3">
                                    <i
                                        class="fa fa-envelope img-h40 rounded-circle bg-primary text-white d-flex align-items-center justify-content-center font-20"></i>
                                </div>
                                <div>
                                    <p class="font-18 mt-1 mb-2 font-w700 d-flex align-items-center">
                                        @lang('frontend.contact.email')
                                    </p>
                                    <a class="font-16 text-light mb-0" href="mailto:{{ \Settings::get('email') }}">
                                        {{ \Settings::get('email') }}
                                    </a>
                                </div>
                            </div>
                            <div class="mb-3 d-flex">
                                <div class="mr-3">
                                    <i
                                        class="fa fa-mobile img-h40 rounded-circle bg-primary text-white d-flex align-items-center justify-content-center font-20"></i>
                                </div>
                                <div>
                                    <p class="font-18 mt-1 mb-2 font-w700 d-flex align-items-center">
                                        @lang('frontend.contact.call')
                                    </p>
                                    <div class="d-flex flex-column">
                                        <a class="font-16 text-light mb-0" href="tel:{{ \Settings::get('phone') }}">
                                            {{ \Settings::get('phone') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 d-flex">
                                <div class="mr-3">
                                    <i
                                        class="fab fa-whatsapp img-h40 rounded-circle bg-primary text-white d-flex align-items-center justify-content-center font-20"></i>
                                </div>
                                <div>
                                    <p class="font-18 mt-1 mb-2 font-w700 d-flex align-items-center">
                                        @lang('frontend.contact.whatsapp')
                                    </p>
                                    <a class="font-16 text-light mb-0" href="https://wa.me/{{ \Settings::get('whatsapp') }}"
                                        target="_blank">
                                        click here
                                    </a>
                                </div>
                            </div>
                            <div class="mb-3 d-flex">
                                <div class="mr-3">
                                    <i
                                        class="fa fa-phone img-h40 rounded-circle bg-primary text-white d-flex align-items-center justify-content-center font-20"></i>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="bg-light p-4 p-lg-5 rounded-xl">
                            <h3
                                class="font-20 font-lg-28 mb-4 title-border title-border-sm primary d-flex align-items-center">
                                @lang('frontend.contact.hear')
                            </h3>
                            <form class="row row-p8 row-col" action="{{ route('front.contactStore') }}" method="POST">
                                @csrf
                                <div class="col-lg-4">
                                    <label class="d-block mb-0">
                                        <p class="font-18 mb-2 text-light">
                                            @lang('frontend.contact.name')
                                        </p>
                                        <input required name="name" type="text" class="form-control form-control-lg"
                                            placeholder="@lang('frontend.contact.name')">
                                    </label>
                                </div>
                                <div class="col-lg-4">
                                    <label class="d-block mb-0">
                                        <p class="font-18 mb-2 text-light">
                                            @lang('frontend.contact.email')
                                        </p>
                                        <input required name="email" type="text" class="form-control form-control-lg"
                                            placeholder="@lang('frontend.contact.email')">
                                    </label>
                                </div>
                                <div class="col-lg-4">
                                    <label class="d-block mb-0">
                                        <p class="font-18 mb-2 text-light">
                                            @lang('frontend.contact.phone')
                                        </p>
                                        <input required name="phone" type="text" class="form-control form-control-lg"
                                            placeholder="@lang('frontend.contact.phone')">
                                    </label>
                                </div>
                                <div class="col-lg-7">
                                    <label class="d-block mb-0">
                                        <p class="font-18 mb-2 text-light">
                                            @lang('frontend.contact.subject')
                                        </p>
                                        <input required name="subject" type="text" class="form-control form-control-lg"
                                            placeholder="@lang('frontend.contact.name')">
                                    </label>
                                </div>
                                <div class="col-12">
                                    <label class="d-block mb-0">
                                        <p class="font-18 mb-2 text-light">
                                            @lang('frontend.contact.message')
                                        </p>
                                        <textarea name="message" rows="5" class="form-control form-control-lg p-3" placeholder="  @lang('frontend.contact.message')"></textarea>
                                    </label>
                                </div>
                                <div class="col-12 mt-4">
                                    <input class="btn btn-primary btn-lg px-4 rounded-pill" type="submit"
                                        value="@lang('frontend.contact.send')">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="mt-4 mt-lg-5">
                    <div class="embed-responsive embed-responsive-21by9">
                        <iframe src="https://www.google.com/maps/d/embed?mid=YOUR_MAP_ID_HERE" width="100%" height="480" style="border:0;"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>

                </div>
            </div>
        </div>

        <!-- Start Footer -->
    </aside>
@endsection
