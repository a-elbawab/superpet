@extends('frontend.layout')
@section('content')
    <aside>
        <!-- / END Header -->

        <div class="slidertitle bg-secondary pt-5 pb-4 text-white d-flex align-items-end">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb d-inline-flex mb-3 font-17">
                        <li class="breadcrumb-item"><a href="{{ route('front.home') }}">@lang('frontend.navbar.home')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@lang('frontend.success_breadcrumb')</li>
                    </ol>
                </nav>
                <h1 class="font-22 font-lg-28 line-14 mb-0 text-success">@lang('frontend.success_breadcrumb')</h1>
            </div>
        </div>

        @include('frontend.errors')

        <div class="bg-light2 py-5 py-lg-7">
            <div class="container">
                <div class="row justify-content-center">
                    <h1 class="text-success">@lang('frontend.success')</h1>
                </div>
            </div>
        </div>

        <!-- Start Footer -->
    </aside>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            localStorage.removeItem('cartItems');
        });
    </script>
@endsection
