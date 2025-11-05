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
                        <input type="hidden" id="city_id_hidden" name="city_id" value="{{ old('city_id', auth()->user()->city_id ?? '') }}">
                        <div class="mb-3" id="delivery_method_div">
                            <label for="deliveryMethod"
                                class="form-label">@lang('frontend.orders.delivery_method')</label>
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
                        <div class="mb-3" id="city_id_div">
                            <label for="city_id" class="form-label">@lang('frontend.city')</label>
                            <select id="city_id" name="city_id" class="form-control">
                                <option value>@lang('cities.select')</option>
                                @foreach ($cities as $city)
                                    <option value="{{ $city->id }}" @if(old('city_id') == $city->id) selected @endif>
                                        {{ $city->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3" id="area_id_div">
                            <label for="area_id" class="form-label">@lang('orders.attributes.area_id')</label>
                            <select id="area_id" name="area_id" class="form-control">
                                <option value>@lang('frontend.orders.select_area')</option>
                                @foreach ($areas as $area)
                                    <option value="{{ $area->id }}" @if(old('area_id') == $area->id) selected @endif
                                        data-city-id="{{ $area->city_id }}"
                                        data-city-name="{{ $area->city->name ?? '' }}">
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
                        <div class="mb-3" id="shipping_note_div">
                            <div class="alert alert-info border-start border-info border-4 bg-light" role="alert">
                                <div class="d-flex align-items-start mb-2">
                                    <i class="fa fa-info-circle text-info me-2 mt-1"></i>
                                    <div class="flex-grow-1">
                                        <h6 class="alert-heading mb-2 fw-semibold">
                                            <i class="fa fa-truck me-1"></i>@lang('frontend.orders.shipping_info')
                                        </h6>
                                        <div class="mb-2">
                                            <div class="d-flex align-items-start mb-2">
                                                <i class="fa fa-map-marker-alt text-primary me-2 mt-1"></i>
                                                <div>{!! __('frontend.orders.shipping_note_within_alexandria') !!}</div>
                                            </div>
                                            <div class="d-flex align-items-start">
                                                <i class="fa fa-globe text-success me-2 mt-1"></i>
                                                <div>{!! __('frontend.orders.shipping_note_outside_alexandria') !!}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
            // Store all payment methods on page load
            const allPaymentMethods = [];
            $('#paymentMethod option').each(function() {
                allPaymentMethods.push({
                    value: $(this).val(),
                    text: $(this).text()
                });
            });

            // Payment method constants (must match backend Order model)
            const PAYMENT_METHODS = {
                CASH_ON_DELIVERY: 1,
                ONLINE: 2,
                VISA_ON_DELIVERY: 3
            };

            const DELIVERY_METHODS = {
                DELIVERY: 'delivery',
                PICKUP: 'pickup'
            };

            const ALEXANDRIA_CITY_ID = 24;

            function toggleFields(deliveryMethod) {
                if (deliveryMethod === DELIVERY_METHODS.DELIVERY) {
                    $('#city_id_div').show();
                    $('#area_id_div').show();
                    $('#branch_id_div').hide();
                    $('#branch_id').val('').change();

                    $('#address_div').show();
                    $('#email_div').show();
                    $('#address').attr('required', true);
                    $('#email').attr('required', true);
                } else if (deliveryMethod === DELIVERY_METHODS.PICKUP) {
                    $('#branch_id_div').show();
                    $('#city_id_div').hide();
                    $('#area_id_div').hide();
                    $('#city_id').val('').change();
                    $('#area_id').val('').change();
                    $('#city_id_hidden').val('');
                    $('.delivery_price').val(0);

                    $('#address_div').hide();
                    $('#email_div').hide();
                    $('#address').removeAttr('required');
                    $('#email').removeAttr('required');
                    updateTotal(0);
                } else {
                    $('#branch_id_div').hide();
                    $('#city_id_div').hide();
                    $('#area_id_div').hide();
                    $('#area_id').val('');
                    $('#city_id').val('');
                    $('#branch_id').val('');
                    $('#city_id_hidden').val('');

                    $('#address_div').hide();
                    $('#email_div').hide();
                    $('#address').removeAttr('required');
                    $('#email').removeAttr('required');
                }

                // Update payment methods when delivery method changes
                updatePaymentMethods();
            }

            function updatePaymentMethods() {
                const deliveryMethod = $('#deliveryMethod').val();
                const currentPaymentMethod = $('#paymentMethod').val();
                let allowedMethods = [];

                if (deliveryMethod === DELIVERY_METHODS.DELIVERY) {
                    // Get the selected area to determine city_id
                    const areaId = $('#area_id').val();

                    if (areaId) {
                        // Priority 1: Fetch city info from the selected area
                        $.ajax({
                            url: '/get-area-shipping-price/' + areaId,
                            method: 'GET',
                            success: function (response) {
                                updateTotal(response.shipping_price);
                                filterPaymentMethodsByCity(response.city_id, currentPaymentMethod);
                            },
                            error: function () {
                                alert("حدث خطأ أثناء جلب سعر الشحن.");
                            }
                        });
                    } else {
                        // Priority 2: If no area selected, check if user is authenticated and has city_id
                        @if(auth()->check() && auth()->user()->city_id)
                            const userCityId = {{ auth()->user()->city_id }};
                            filterPaymentMethodsByCity(userCityId, currentPaymentMethod);
                        @else
                            // Priority 3: No city resolved, show only online payment by default
                            allowedMethods = allPaymentMethods.filter(method =>
                                method.value == PAYMENT_METHODS.ONLINE
                            );
                            updatePaymentMethodOptions(allowedMethods, currentPaymentMethod);
                        @endif
                    }
                } else {
                    // For pickup or other methods, allow all payment methods
                    allowedMethods = allPaymentMethods;
                    updatePaymentMethodOptions(allowedMethods, currentPaymentMethod);
                }
            }

            function filterPaymentMethodsByCity(cityId, currentPaymentMethod) {
                let allowedMethods = [];

                if (cityId == ALEXANDRIA_CITY_ID) {
                    // Alexandria: allow Cash on Delivery (1), Online (2), and Visa on Delivery (3)
                    allowedMethods = allPaymentMethods;
                } else {
                    // Other cities: allow only Online (2)
                    allowedMethods = allPaymentMethods.filter(method =>
                        method.value == PAYMENT_METHODS.ONLINE
                    );
                }

                updatePaymentMethodOptions(allowedMethods, currentPaymentMethod);
            }

            function updatePaymentMethodOptions(allowedMethods, currentPaymentMethod) {
                const $paymentMethod = $('#paymentMethod');

                // Clear current options
                $paymentMethod.empty();

                // Add allowed methods
                allowedMethods.forEach(function(method) {
                    const selected = method.value == currentPaymentMethod ? 'selected' : '';
                    $paymentMethod.append(`<option value="${method.value}" ${selected}>${method.text}</option>`);
                });

                // If current payment method is not in allowed methods, select the first available
                if (allowedMethods.length > 0 && !allowedMethods.find(m => m.value == currentPaymentMethod)) {
                    $paymentMethod.val(allowedMethods[0].value);
                }

                // Disable submit if no payment methods available
                if (allowedMethods.length === 0) {
                    $('button[type="submit"]').prop('disabled', true);
                    $paymentMethod.append(`<option value="">@lang('frontend.orders.no_payment_methods')</option>`);
                } else {
                    $('button[type="submit"]').prop('disabled', false);
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

            $('#city_id').on('change', function () {
                const cityId = $(this).val();
                const $areaSelect = $('#area_id');
                const deliveryMethod = $('#deliveryMethod').val();
                const currentPaymentMethod = $('#paymentMethod').val();
                
                // Update hidden city_id input
                $('#city_id_hidden').val(cityId);
                
                // Clear area selection
                $areaSelect.val('').change();
                
                // Filter areas based on selected city
                if (cityId) {
                    $areaSelect.find('option').each(function() {
                        const $option = $(this);
                        if ($option.val() === '') {
                            // Always show the default "select area" option
                            $option.show();
                        } else if ($option.data('city-id') == cityId) {
                            $option.show();
                        } else {
                            $option.hide();
                        }
                    });
                    
                    // Update payment methods based on selected city
                    if (deliveryMethod === DELIVERY_METHODS.DELIVERY) {
                        filterPaymentMethodsByCity(cityId, currentPaymentMethod);
                    }
                } else {
                    // If no city selected, hide all area options except default
                    $areaSelect.find('option').each(function() {
                        const $option = $(this);
                        if ($option.val() === '') {
                            $option.show();
                        } else {
                            $option.hide();
                        }
                    });
                    
                    // No city selected, show only online payment for delivery
                    if (deliveryMethod === DELIVERY_METHODS.DELIVERY) {
                        const allowedMethods = allPaymentMethods.filter(method =>
                            method.value == PAYMENT_METHODS.ONLINE
                        );
                        updatePaymentMethodOptions(allowedMethods, currentPaymentMethod);
                    }
                }
                
                // Reset delivery price when city changes
                updateTotal(0);
            });

            $('#area_id').on('change', function () {
                const areaId = $(this).val();
                if (areaId) {
                    const deliveryMethod = $('#deliveryMethod').val();
                    const currentPaymentMethod = $('#paymentMethod').val();

                    $.ajax({
                        url: '/get-area-shipping-price/' + areaId,
                        method: 'GET',
                        success: function (response) {
                            updateTotal(response.shipping_price);

                            // Update payment methods based on city
                            if (deliveryMethod === DELIVERY_METHODS.DELIVERY) {
                                filterPaymentMethodsByCity(response.city_id, currentPaymentMethod);
                            }
                        },
                        error: function () {
                            alert("حدث خطأ أثناء جلب سعر الشحن.");
                        }
                    });
                } else {
                    // If area is cleared, reset delivery price
                    updateTotal(0);
                }
            });

            // Initialize on page load
            toggleFields($('#deliveryMethod').val());
            
            // Initialize area filtering based on pre-selected city (if any)
            const initialCityId = $('#city_id').val();
            if (initialCityId) {
                $('#city_id').trigger('change');
            } else {
                // Hide all areas except default option on load if no city selected
                $('#area_id option').each(function() {
                    const $option = $(this);
                    if ($option.val() !== '') {
                        $option.hide();
                    }
                });
            }
        });
    </script>

@endsection