@extends('frontend.layout')

@section('content')
    <div class="container py-5">
        <div class="alert alert-info">
            @lang('frontend.verify')
        </div>

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button class="btn btn-primary">
                @lang('frontend.resend')
            </button>
        </form>
    </div>
@endsection