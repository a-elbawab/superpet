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
                        <li class="breadcrumb-item active" aria-current="page">@lang('frontend.terms')</li>
                    </ol>
                </nav>
                <h1 class="font-22 font-lg-28 line-14 mb-0 text-success">@lang('frontend.terms')</h1>
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
    </aside>
@endsection