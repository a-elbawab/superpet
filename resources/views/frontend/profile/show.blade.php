@extends('frontend.layout')
@push('styles')
    <style>
        .circle {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }
    </style>
@endpush

@section('content')
    <div class="container py-4">
        <!-- بيانات العميل -->
        <div class="row mb-5">
            <div class="col-md-4 text-center">
                <img src="{{ $user->getAvatar() }}" alt="{{ $user->name }}" class="rounded-circle img-thumbnail mb-3"
                    style="width: 150px; height: 150px;">
                <h4>{{ $user->name }}</h4>
                <button class="btn btn-primary btn-sm"
                    onclick="window.location.href='{{ route('front.me.edit') }}'">{{ __('frontend.profile_edit') }}</button>
            </div>
            <div class="col-md-8">
                <div class="card shadow p-4">
                    <p><strong>{{ __('frontend.email') }}:</strong> {{ $user->email }}</p>
                    <p><strong>{{ __('frontend.phone') }}:</strong> {{ $user->phone }}</p>
                    <p><strong>{{ __('frontend.country') }}:</strong> {{ $user->country }}</p>
                    <p><strong>{{ __('frontend.city') }}:</strong> {{ $user->city }}</p>
                    <p><strong>{{ __('frontend.address') }}:</strong> {{ $user->address }}</p>
                </div>
            </div>
        </div>

        <!-- الإحصائيات -->
        <div class="row text-center mb-5">
            <div class="col-md-6">
                <div class="card shadow p-4">
                    <h4>{{ __('frontend.orders_count') }}</h4>
                    <div class="circle bg-primary text-white mx-auto d-flex align-items-center justify-content-center mb-3"
                        style="width: 100px; height: 100px; border-radius: 50%; font-size: 24px;">
                        {{ $latestOrders->total() }}
                    </div>
                    <button class="btn btn-outline-primary btn-sm"
                        onclick="window.location.href='{{ route('front.me.orders.index') }}'">{{ __('frontend.show_all_orders') }}</button>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow p-4">
                    <h4>{{ __('frontend.bookings_count') }}</h4>
                    <div class="circle bg-success text-white mx-auto d-flex align-items-center justify-content-center mb-3"
                        style="width: 100px; height: 100px; border-radius: 50%; font-size: 24px;">
                        {{ $latestBookings->total() }}
                    </div>
                    <button class="btn btn-outline-success btn-sm"
                        onclick="window.location.href='{{ route('front.me.bookings.index') }}'">{{ __('frontend.show_all_bookings') }}</button>
                </div>
            </div>
        </div>

        <!-- الجداول -->
        <div class="row">
            <!-- آخر الطلبات -->
            <div class="col-md-6 mb-4">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h5>{{ __('frontend.latest_orders') }}</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($latestOrders as $order)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $order->name }}
                                    <span class="badge bg-primary rounded-pill">{{ $order->date }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- آخر الحجوزات -->
            <div class="col-md-6 mb-4">
                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        <h5>{{ __('frontend.latest_bookings') }}</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($latestBookings as $booking)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    {{ $booking->name }}
                                    <span class="badge bg-success rounded-pill">{{ $booking->date }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection