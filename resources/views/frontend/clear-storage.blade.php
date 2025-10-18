@extends('frontend.layout')
@section('content')
    <aside>
        <!-- / END Header -->

        <div class="slidertitle bg-secondary pt-5 pb-4 text-white d-flex align-items-end">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb d-inline-flex mb-3 font-17">
                        <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Ordered Successfully</li>
                    </ol>
                </nav>
                <h1 class="font-22 font-lg-28 line-14 mb-0">Your Order Created Successfully</h1>
            </div>
        </div>

        @include('frontend.errors')

        <div class="bg-light2 py-5 py-lg-7">
            <div class="container">
                <div class="row justify-content-center">
                    <h1 class="text-success"> Your Storage Cleared Successfully</h1>
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
            localStorage.clear();
            sessionStorage.clear();
        });
    </script>
@endsection
