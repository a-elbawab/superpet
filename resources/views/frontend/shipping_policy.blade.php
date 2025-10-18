@extends('frontend.layout')

@section('content')
    <aside>
        <!-- / END Header -->

        <div class="slidertitle bg-secondary pt-5 pb-4 text-white d-flex align-items-end">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb d-inline-flex mb-3 font-17">
                        <li class="breadcrumb-item"><a href="{{ route('front.home') }}">@lang('frontend.navbar.home')</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">@lang('frontend.shipping_policy')</li>
                    </ol>
                </nav>
                <h1 class="font-22 font-lg-28 line-14 mb-0 text-success">@lang('frontend.shipping_policy')</h1>
            </div>
        </div>

        <div class="bg-light2 py-5 py-lg-7">
            <div class="container">
                <div class="card row justify-content-center">
                    <h2 class="text-success">{{ $page?->title }}</h2> <!-- Title of the page -->
                    {{-- Show page list content --}}
                    <div class="card card-items">
                        <div class="card-body">
                            <ul class="list-group">
                                @foreach ($page?->items ?? [] as $item)
                                    <li class="list-group-item">
                                        <strong>{!! $item->name !!}</strong> <!-- Displaying each item name -->
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="https://wa.me/{{\Settings::get('whatsapp')}}"
                target="_blank" class="d-inline-flex align-items-center gap-2 text-decoration-none"
                style="background-color: #25D366; color: white; padding: 10px 20px; border-radius: 8px; font-size: 1.1rem;">
                <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" alt="WhatsApp" width="24"
                    height="24" style="margin-right: 8px;">
                {{ __('frontend.contact_whatsapp') }}
            </a>
        </div>
    </aside>
@endsection