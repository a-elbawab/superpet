@extends('frontend.layout')
@section('content')
    <section class="hero-shop">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>@lang('frontend.navbar.services')</h2>
                    <div>
                        <a href="{{ route('front.home') }}">@lang('frontend.navbar.home')</a>
                        /
                        <a href="{{ route('front.services') }}">@lang('frontend.navbar.services')</a>

                    </div>
                </div>
                <div class="col-md-6"></div>
            </div>
        </div>

    </section>


    <section class="services py-5">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('danger'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('danger') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                @foreach ($services as $service)
                    <button class="nav-link {{ $loop->first ? 'active' : '' }}"
                        id="nav-services-{{ $service->id }}-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-services-{{ $service->id }}" type="button" role="tab"
                        aria-controls="nav-services-{{ $service->id }}"
                        aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                        {{ $service->name }}
                    </button>
                @endforeach
            </div>

            <div class="tab-content pt-5" id="nav-tabContent">
                @foreach ($services as $service)
                    <form class="tab-content pt-5" method="POST" enctype="multipart/form-data"
                        action="{{ route('front.services.book', $service) }}">
                        @csrf
                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                            id="nav-services-{{ $service->id }}" role="tabpanel"
                            aria-labelledby="nav-services-{{ $service->id }}-tab" tabindex="0">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="img-sticky-top">
                                        <img src="{{ $service->getFirstMediaUrl('image') }}"
                                            class="w-100 rounded-3 mb-5" alt="pet boarding">
                                        <h4 class="mb-4 h1" style="font-family: var(--primery-font);">
                                            {{ $service->name }}</h4>
                                        <p style="font-size: 22px;">{!! $service->description !!}</p>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="bg-light p-4 p-lg-5">
                                        <p class="font-22 text-secondary mb-3 font-w700 border-bottom pb-3 mb-3"
                                            style="color: var(--main-color) !important;">
                                            @lang('frontend.services.book_now')
                                        </p>
                                        <form action="#">
                                            <div class="row row-p6 row-col">
                                                @foreach ($service->sections as $section)
                                                    <div class="col-12 mt-4">
                                                        <p class="font-22 font-w500 mb-3 pb-3 border-bottom">
                                                            {{ $section->name }}</p>
                                                    </div>
                                                    @foreach ($section->inputs->sortBy('order') as $input)
                                                        @if ($input->type == 'select')
                                                            <div class="col-12">
                                                                <div class="col-12">
                                                                    <p class="font-18 font-w500 mt-3 pb-3">
                                                                        {{ $input->label }}</p>
                                                                </div>
                                                                <select name="{{ $input->name }}"
                                                                    class="form-select form-control-lg">
                                                                    @foreach ($input->options as $option)
                                                                        <option value="{{ $option->value }}">
                                                                            {{ $option->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        @elseif ($input->type == 'radio')
                                                            <div class="col-12">
                                                                <p class="font-18 font-w500 mt-3 pb-3">
                                                                    {{ $input->label }}</p>
                                                            </div>
                                                            <div class="d-flex flex-wrap">
                                                                @foreach ($input->options as $option)
                                                                    <div class="form-check">
                                                                        <input class="form-check-input" type="radio"
                                                                            name="{{ $input->name }}"
                                                                            value="{{ $option->value }}"
                                                                            @if ($input->required) required @endif
                                                                            id="flexRadioDefault{{ $option->id }}">
                                                                        <label class="form-check-label"
                                                                            for="flexRadioDefault{{ $option->id }}">{{ $option->name }}</label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        @elseif ($input->type == 'checkbox')
                                                            <div class="col-12">
                                                                <p class="font-18 font-w500 mt-3 pb-3">
                                                                    {{ $input->label }}</p>
                                                            </div>
                                                            <div class="d-flex flex-wrap">
                                                                @foreach ($input->options as $option)
                                                                    <div class="form-check">
                                                                        <input
                                                                            class="form-check-input @if ($input->required) checkboxinputRequired @endif"
                                                                            type="checkbox"
                                                                            name="{{ $input->name }}[]"
                                                                            value="{{ $option->value }}"
                                                                            id="flexCheck{{ $option->id }}">
                                                                        <label class="form-check-label"
                                                                            for="flexCheck{{ $option->id }}">{{ $option->name }}</label>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        @else
                                                            <div class="col-12">
                                                                 <div class="col-12">
                                                                    <p class="font-18 font-w500 mt-3 pb-3">
                                                                        {{ $input->label }}</p>
                                                                </div>
                                                                <input name="{{ $input->name }}"
                                                                    @if ($input->required) required @endif
                                                                    type="{{ $input->type }}"
                                                                    class="form-control form-control-lg"
                                                                    placeholder="{{ $input->label }}">
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                                <div class="col-12 mt-4">
                                                    <input class="btn btn-secondary w-50 mx-auto d-block" type="submit"
                                                        value="{{ trans('frontend.submit') }}">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                @endforeach
            </div>

        </div>
    </section>
@endsection

@section('scripts')
    <script>
        document.getElementById('myForm').addEventListener('submit', function(e) {
            const checkboxes = document.querySelectorAll('.checkboxinputRequired"]:checked');
            const error = document.getElementById('checkbox-error');
            if (checkboxes.length === 0) {
                e.preventDefault(); // Prevent form submission
                error.style.display = 'block'; // Show error message
            } else {
                error.style.display = 'none';
            }
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Handle remembering active tab
            const navTabs = document.querySelectorAll('.nav-link');

            navTabs.forEach(tab => {
                tab.addEventListener('click', function () {
                    const target = this.getAttribute('data-bs-target');
                    localStorage.setItem('activeTab', target);
                });
            });

            // Restore active tab
            const activeTab = localStorage.getItem('activeTab');
            if (activeTab) {
                const triggerEl = document.querySelector(`[data-bs-target="${activeTab}"]`);
                if (triggerEl) {
                    new bootstrap.Tab(triggerEl).show();
                }
            }
        });
    </script>

@endsection
