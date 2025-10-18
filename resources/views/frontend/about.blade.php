@extends('frontend.layout')
@section('content')
    <div class="body-content">
        <section class="hero-shop">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h2>@lang('frontend.navbar.about')</h2>
                        <div>
                            <a href="{{  route('front.home') }}">@lang('frontend.navbar.home')</a>
                            /
                            <a href="#">@lang('frontend.navbar.about')</a>
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
                            <h2>@lang('frontend.about.welcome_title')</h2>
                            <p>@lang('frontend.about.description_1')</p>
                            <p>@lang('frontend.about.description_2')</p>
                            <p>@lang('frontend.about.description_3')</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-img text-center">
                            <img src="{{ url('/') }}/website/img/dogs-1.png" class="" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="team" id="team">
            <div class="header text-center py-5">
                <img src="{{ url('/') }}/website/img/header-img.png" alt="heading-img">
                <h6>@lang('frontend.experts')</h6>
                <h2>@lang('frontend.team')</h2>
            </div>
            <div class="container">
                <div class="row d-flex justify-content-center pb-5 gy-4">
                    @foreach ($teams as $team)
                        <div class="col-lg-4 col-md-6">
                            <div class="team-working">
                                <img width="200px" src="{{ $team->getFirstMediaUrl('image') }}" alt="{{ $team->name }}">
                                <svg width="188" height="188" viewBox="0 0 673 673" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                        d="M9.82698 416.603C-19.0352 298.701 18.5108 173.372 107.497 90.7633L110.607 96.5197C24.3117 177.199 -12.311 298.935 15.0502 413.781L9.82698 416.603ZM89.893 565.433C172.674 654.828 298.511 692.463 416.766 663.224L414.077 658.245C298.613 686.363 175.954 649.666 94.9055 562.725L89.893 565.433ZM656.842 259.141C685.039 374.21 648.825 496.492 562.625 577.656L565.413 582.817C654.501 499.935 691.9 374.187 662.536 256.065L656.842 259.141ZM581.945 107.518C499.236 18.8371 373.997 -18.4724 256.228 10.5134L259.436 16.4515C373.888 -10.991 495.248 25.1518 576.04 110.708L581.945 107.518Z"
                                        fill="#000"></path>
                                </svg>
                                <span>{{ $team->title }}</span>
                                <a href="#">
                                    <h4>{{ $team->name }}</h4>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
        </section>


        <section class="gallery pb-5">
            <div class="header text-center py-5">
                <img src="{{ url('/') }}/website/img/header-img.png" alt="heading-img">
                <h2>@lang('frontend.gallery')</h2>
            </div>
            <div class="container">
                <div class="row pb-5 gy-4" id="gallery-row">
                    @foreach ($galleries as $gallery)
                        <div class="col-lg-4 col-md-6">
                            <div class="gallery-img" data-bs-toggle="modal" data-bs-target="#imageModal"
                                data-src="{{ $gallery->getFirstMediaUrl('image') }}">
                                <img src="{{ $gallery->getFirstMediaUrl('image') }}" class="w-100" alt="gallery">
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>

        <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body">
                        <img id="modalImage" src="{{ url('/') }}/website/img/" class="w-100" alt="gallery">
                        <button type="button" class="btn  position-absolute top-50  translate-middle-y"
                            id="prevBtn">&lt;</button>
                        <button type="button" class="btn  position-absolute top-50  translate-middle-y"
                            id="nextBtn">&gt;</button>
                    </div>
                </div>
            </div>
        </div>
         <div class="text-center mt-4">
            <a href="https://wa.me/{{\Settings::get('whatsapp')}}" target="_blank"
                class="d-inline-flex align-items-center gap-2 text-decoration-none"
                style="background-color: #25D366; color: white; padding: 10px 20px; border-radius: 8px; font-size: 1.1rem;">
                <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp" width="24"
                    height="24" style="margin-right: 8px;">
                {{ __('frontend.contact_whatsapp') }}
            </a>
        </div>
    </div>
@endsection