@extends('frontend.layout')

@section('content')
    <section class="hero-shop">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>@lang('frontend.cart')</h2>
                    <div>
                        <a href="{{ route('front.home') }}">@lang('frontend.navbar.home')</a> / <a
                            href="{{ route('front.cart.checkout') }}">@lang('frontend.cart')</a>
                    </div>
                </div>
                <div class="col-md-6"></div>
            </div>
        </div>
    </section>

    <section class="cart py-5">
        <div class="container">
            <div class="row">
                @if (session('error'))
                    <div class="alert alert-danger">
                        <ul>
                            @foreach (session('error') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-lg-8">
                    <table id="cartTable">
                        <thead>
                            <tr>
                                <th>@lang('frontend.orders.product')</th>
                                <th class="tr-none">@lang('frontend.orders.quantity')</th>
                                <th class="tr-none">@lang('frontend.orders.price')</th>
                                <th>@lang('frontend.orders.action')</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Dynamic rows will be added here -->
                        </tbody>
                    </table>
                </div>
                <div class="col-12 col-md-4 mt-4 mt-md-0">
                    <div class="bg-light p-4 rounded-3 shadow-sm">
                        <h5 class="mb-3">@lang('frontend.orders.total')</h5>
                        <h3 id="totalCheckoutPriceAmount" class="text-end text-primary"> <span id="hatemPrice">0</span>
                            @lang('frontend.currency')</h3>
                        <p class="text-muted">@lang('frontend.orders.messages.tax_shipping_included')</p>
                        <a class="btn btn-success w-100 d-flex align-items-center justify-content-center gap-2"
                            href="{{ route('front.makeOrder') }}" id="checkoutBtn">
                            <span class="btn-text">@lang('frontend.checkout')</span>
                            <span class="spinner-border spinner-border-sm d-none" role="status" id="checkoutSpinner"></span>
                        </a>
                        <div class="text-center mt-3">
                            <i class="fa fa-lock"></i> @lang('frontend.orders.messages.secure_payment')
                        </div>
                    </div>
                </div>
            </div>

            <!-- نموذج الإدخال -->
            <div class="row mt-4" id="checkoutForm" style="display: none;">
                <div class="col-lg-8">
                    <div class="bg-light p-4 rounded-3 shadow-sm">
                        <h5 class="mb-3">Your Information</h5>

                        @if (Auth::check())
                            <!-- المستخدم مسجل الدخول، عرض البيانات الشخصية -->
                            <div class="user-details">
                                <p>Name: {{ Auth::user()->name }}</p>
                                <p>Email: {{ Auth::user()->email }}</p>
                                <p>Phone: {{ Auth::user()->phone ?? 'Not Provided' }}</p>
                                <p>Address: {{ Auth::user()->address ?? 'Not Provided' }}</p>
                            </div>
                        @else
                            <!-- المستخدم غير مسجل الدخول، عرض نموذج إدخال البيانات -->
                            <form method="POST" action="/checkout">
                                @csrf
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" required>
                                </div>
                                <div class="mb-3">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" required>
                                </div>
                            </form>
                        @endif

                        <!-- اختيار طريقة الدفع -->
                        <h5 class="mt-4">Payment Method</h5>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="paymentOnline"
                                value="online" checked>
                            <label class="form-check-label" for="paymentOnline">
                                Online Payment
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="paymentOnReceipt"
                                value="receipt">
                            <label class="form-check-label" for="paymentOnReceipt">
                                Payment on Receipt
                            </label>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 mt-4">Confirm Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('scripts')
    <script>
        $('#checkoutBtn').click(function (e) {
            e.preventDefault();

            const cartItems = JSON.parse(localStorage.getItem('cartItems')) || [];

            $('#checkoutSpinner').removeClass('d-none');
            $('#checkoutBtn .btn-text').addClass('d-none');

            $.ajax({
                url: '{{ route('front.setOrder') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    cartItems: cartItems,
                },
                success: function (response) {
                    const notes = response.notes || [];

                    if (notes.length > 0) {
                        let html = '<ul class="text-start">';
                        notes.forEach(note => {
                            html += `<li>${note}</li>`;
                        });
                        html += '</ul>';

                        Swal.fire({
                            title: '{{ __('frontend.orders.cart_adjusted') }}',
                            html: html,
                            icon: 'info',
                            confirmButtonText: '{{ __('frontend.ok') }}'
                        }).then(() => {
                            window.location.href = '{{ route('front.makeOrder') }}';
                        });
                    } else {
                        window.location.href = '{{ route('front.makeOrder') }}';
                    }
                },
                error: function (error) {
                    alert('Error: ' + error.responseText);
                    $('#checkoutSpinner').addClass('d-none');
                    $('#checkoutBtn .btn-text').removeClass('d-none');
                }
            });
        });

    </script>
@endsection