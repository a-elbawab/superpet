@extends('frontend.layout')

@section('content')
    <section class="hero-shop">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>@lang('frontend.orders.details')</h2>
                    <div>
                        <a href="{{ route('front.home') }}">@lang('frontend.navbar.home')</a>
                        <a href="{{ route('front.makeOrder') }}">@lang('frontend.orders.details')</a>
                    </div>
                </div>
                <div class="col-md-6"></div>
            </div>
        </div>
    </section>
    <section class="order py-5">
        <div class="container">
            <h2>@lang('frontend.orders.review')</h2>
            <div class="row">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session()->has('errors'))
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="col-lg-8">
                    @if (!Auth::check())
                        <div class="alert alert-warning d-flex align-items-center" role="alert">
                            <i class="fa fa-warning me-2 text-warning fs-5"></i>
                            <div class="flex-grow-1">
                                {{ __('frontend.orders.messages.make_profile') }}
                            </div>
                        </div>
                    @endif

                    <div class="bg-light p-4 rounded-3 shadow-sm">
                        <h5 class="mb-3">@lang('frontend.orders.details')</h5>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>@lang('frontend.orders.product')</th>
                                        <th>@lang('frontend.orders.quantity')</th>
                                        <th>@lang('frontend.orders.price')</th>
                                        <th>@lang('frontend.orders.total')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartItems as $item)
                                        <tr>
                                            <td>
                                                <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}"
                                                    style="width: 50px; height: auto;">
                                                {{ $item['name'] }}
                                            </td>
                                            <td>{{ $item['quantity'] }}</td>
                                            <td>{{ $item['price'] }} @lang('frontend.currency')</td>
                                            <td>{{ $item['quantity'] * $item['price'] }} @lang('frontend.currency')</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <p class="fw-bold">@lang('frontend.orders.delivery_price'):
                            <span class="delivery_price">0</span>
                            @lang('frontend.currency')
                        </p>
                        <p class="fw-bold">@lang('frontend.orders.total_price'):
                            <span class="total_price">{{ $totalPrice }}</span>
                            @lang('frontend.currency')
                        </p>
                        <div class="accordion-body px-0">
                            <ul class="list-unstyled">
                                <li><a href="{{ route('front.privacy') }}" class="text-dark">@lang('frontend.privacy_policy')</a></li>
                                </li>
                                <li><a href="{{ route('front.shipping_policy') }}" class="text-dark">@lang('frontend.shipping_policy')</a></li>
                                <li><a href="{{ route('front.return_policy') }}" class="text-dark">@lang('frontend.return_policy')</a></li>
                            </ul>
                        </div>

                        @if ($discount > 0)
                            <p class="text-end fw-bold text-success">@lang('frontend.orders.discount'):
                                {{ $discount }}
                                @lang('frontend.currency')
                                <small> @lang('frontend.welcome_discount')</small>
                            </p>

                            <p class="text-end fw-bold">@lang('frontend.orders.final_total'):
                                {{ $finalTotal }}
                                @lang('frontend.currency')
                            </p>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <h5 class="mb-3">@lang('frontend.orders.information')</h5>
                    <form action="{{ route('front.processOrder') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">@lang('frontend.orders.name')</label>
                            <input type="text" id="name" name="name"
                                value="{{ old('name', auth()->user()->name ?? '') }}" class="form-control" required>
                        </div>
                        <div class="mb-3" id="email_div">
                            <label for="email" class="form-label">@lang('frontend.orders.email')</label>
                            <input type="email" id="email" name="email" value="{{ old('email', auth()->user()->email ?? '')}}" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">@lang('frontend.orders.phone')</label>
                            <input type="text" id="phone" name="phone" value="{{ old('phone', auth()->user()->phone ?? '') }}" class="form-control" required>
                        </div>
                        <div class="mb-3" id="address_div">
                            <label for="address" class="form-label">@lang('frontend.orders.address')</label>
                            <input type="text" id="address" name="address" value="{{ old('address', auth()->user()->address ?? '') }}" class="form-control">
                        </div>
                        <input type="hidden" name="items" value="{{ json_encode($cartItems) }}">
                        <input class='total_price' type="hidden" name="total" value="{{ $finalTotal }}">
                        <input class='delivery_price' type="hidden" name="delivery_price" value="">
                        <div class="mb-3" id="delivery_method_div">
                            <label for="deliveryMethod"
                                class="form-label">@lang('frontend.orders.payment_method')</label>
                            <select id="deliveryMethod" name="delivery_method" class="form-control">
                                @foreach (trans('orders.delivery_methods') as $key => $method)
                                    <option value="{{ $key }}" @if(old('delivery_method') == $key) selected @endif>
                                        {{ $method }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3" id="branch_id_div">
                            <label for="branch_id" class="form-label">@lang('orders.attributes.branch_id')</label>
                            <select id="branch_id" name="branch_id" class="form-control">
                                <option value>@lang('frontend.orders.select_branch')</option>
                                @foreach ($branches as $branch)
                                    <option value="{{ $branch->id }}" @if(old('branch_id') == $branch->id) selected @endif>
                                        {{ $branch->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3" id="area_id_div">
                            <label for="area_id" class="form-label">@lang('orders.attributes.area_id')</label>
                            <select id="area_id" name="area_id" class="form-control">
                                <option value>@lang('frontend.orders.select_area')</option>
                                @foreach ($areas as $area)
                                    <option value="{{ $area->id }}" @if(old('area_id') == $area->id) selected @endif>
                                        {{ $area->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="paymentMethod"
                                class="form-label">@lang('frontend.orders.payment_method')</label>
                            <select id="paymentMethod" name="payment_method" class="form-control">
                                @foreach (trans('orders.payment_methods') as $key => $method)
                                    <option value="{{ $key }}" @if(old('payment_method') == $key) selected @endif>
                                        {{ $method }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success w-100">@lang('frontend.orders.submit')</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function () {
            function toggleFields(deliveryMethod) {
                if (deliveryMethod === 'delivery') {
                    $('#area_id_div').show();
                    $('#branch_id_div').hide();
                    $('#branch_id').val('').change();

                    $('#address_div').show();
                    $('#email_div').show();
                    $('#address').attr('required', true);
                    $('#email').attr('required', true);
                } else if (deliveryMethod === 'pickup') {
                    $('#branch_id_div').show();
                    $('#area_id_div').hide();
                    $('#area_id').val('').change();
                    $('.delivery_price').val(0);

                     $('#address_div').hide();
                    $('#email_div').hide();
                    $('#address').removeAttr('required');
                    $('#email').removeAttr('required');
                    updateTotal(0);
                } else {
                    $('#branch_id_div').hide();
                    $('#area_id_div').hide();
                    $('#area_id').val('');
                    $('#branch_id').val('');

                    $('#address_div').hide();
                    $('#email_div').hide();
                    $('#address').removeAttr('required');
                    $('#email').removeAttr('required');
                }
            }



            function updateTotal(deliveryPrice) {
                const baseTotal = parseFloat("{{ $finalTotal }}");
                const finalTotal = baseTotal + parseFloat(deliveryPrice);
                $('.delivery_price').val(deliveryPrice);
                $('.delivery_price').text(deliveryPrice);
                $('.total_price').text(finalTotal.toFixed(2));
                $('.total_price').val(finalTotal);
            }

            $('#deliveryMethod').on('change', function () {
                const deliveryMethod = $(this).val();
                toggleFields(deliveryMethod);
            });

            $('#area_id').on('change', function () {
                const areaId = $(this).val();
                if (areaId) {
                    $.ajax({
                        url: '/get-area-shipping-price/' + areaId,
                        method: 'GET',
                        success: function (response) {
                            updateTotal(response.shipping_price);
                        },
                        error: function () {
                            alert("حدث خطأ أثناء جلب سعر الشحن.");
                        }
                    });
                }
            });

            // أول تحميل للصفحة
            toggleFields($('#deliveryMethod').val());
        });
    </script>

@endsection