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
                                    <option value="{{ $area->id }}" data-city-id="{{ $area->city_id }}" @if(old('area_id') == $area->id) selected @endif>
                                        {{ $area->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="paymentMethod"
                                class="form-label">@lang('frontend.orders.payment_method')</label>
                            <select id="paymentMethod" name="payment_method" class="form-control" required>
                                @foreach (trans('orders.payment_methods') as $key => $method)
                                    <option value="{{ $key }}" data-payment-method-id="{{ $key }}" @if(old('payment_method') == $key) selected @endif>
                                        {{ $method }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <!-- Shipping Note -->
                        <div class="mb-3" id="shipping-note-container" style="display: none;">
                            <div class="alert alert-info">
                                <strong>@lang('orders.shipping_notes.title'):</strong>
                                <div id="shipping-note-content" style="white-space: pre-line; margin-top: 10px;"></div>
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
            // Payment method constants (must match backend)
            const PAYMENT_METHODS = {
                CASH_ON_DELIVERY: 1,
                ONLINE: 2,
                VISA_ON_DELIVERY: 3
            };
            const DELIVERY_METHODS = {
                PICKUP: 'pickup',
                DELIVERY: 'delivery'
            };
            const ALEXANDRIA_CITY_ID = 24;
            
            // User's city_id from backend (if authenticated)
            const userCityId = @json(auth()->check() ? auth()->user()->city_id : null);
            
            // Current locale
            const currentLocale = @json(app()->getLocale());
            
            // Shipping notes translations
            const shippingNotes = {
                ar: {
                    inside_alexandria: @json(trans('orders.shipping_notes.inside_alexandria', [], 'ar')),
                    outside_alexandria: @json(trans('orders.shipping_notes.outside_alexandria', [], 'ar'))
                },
                en: {
                    inside_alexandria: @json(trans('orders.shipping_notes.inside_alexandria', [], 'en')),
                    outside_alexandria: @json(trans('orders.shipping_notes.outside_alexandria', [], 'en'))
                }
            };

            /**
             * Get allowed payment methods based on delivery method and city ID
             */
            function getAllowedPaymentMethods(deliveryMethod, cityId) {
                // Rule 2: If delivery method is NOT "delivery", allow all payment methods
                if (deliveryMethod !== DELIVERY_METHODS.DELIVERY) {
                    return [
                        PAYMENT_METHODS.CASH_ON_DELIVERY,
                        PAYMENT_METHODS.ONLINE,
                        PAYMENT_METHODS.VISA_ON_DELIVERY
                    ];
                }

                // Rule 1: If delivery method IS "delivery"
                if (deliveryMethod === DELIVERY_METHODS.DELIVERY) {
                    // Convert cityId to number for proper comparison
                    const cityIdNum = cityId ? parseInt(cityId) : null;
                    
                    // If no city_id available yet, show all methods (waiting for area selection)
                    if (cityIdNum === null) {
                        return [
                            PAYMENT_METHODS.CASH_ON_DELIVERY,
                            PAYMENT_METHODS.ONLINE,
                            PAYMENT_METHODS.VISA_ON_DELIVERY
                        ];
                    }
                    
                    // Alexandria: allow COD, Online, and Visa on Delivery
                    if (cityIdNum === ALEXANDRIA_CITY_ID) {
                        return [
                            PAYMENT_METHODS.CASH_ON_DELIVERY,
                            PAYMENT_METHODS.ONLINE,
                            PAYMENT_METHODS.VISA_ON_DELIVERY
                        ];
                    }
                    
                    // Other cities: allow only Online (Visa)
                    return [PAYMENT_METHODS.ONLINE];
                }

                // Default: allow all
                return [
                    PAYMENT_METHODS.CASH_ON_DELIVERY,
                    PAYMENT_METHODS.ONLINE,
                    PAYMENT_METHODS.VISA_ON_DELIVERY
                ];
            }

            /**
             * Get shipping note text based on city (using translations)
             */
            function getShippingNote(cityId) {
                if (!cityId) {
                    return null;
                }
                
                // Use current locale to get the appropriate translation
                const locale = currentLocale === 'ar' ? 'ar' : 'en';
                
                if (cityId === ALEXANDRIA_CITY_ID) {
                    // Inside Alexandria
                    return shippingNotes[locale].inside_alexandria;
                }
                
                // Outside Alexandria
                return shippingNotes[locale].outside_alexandria;
            }

            /**
             * Update shipping note display
             */
            function updateShippingNote(deliveryMethod, cityId) {
                const $shippingNoteContainer = $('#shipping-note-container');
                const $shippingNoteContent = $('#shipping-note-content');
                
                // Only show note for delivery method
                if (deliveryMethod === DELIVERY_METHODS.DELIVERY && cityId) {
                    const note = getShippingNote(cityId);
                    if (note) {
                        $shippingNoteContent.text(note);
                        $shippingNoteContainer.show();
                    } else {
                        $shippingNoteContainer.hide();
                    }
                } else {
                    $shippingNoteContainer.hide();
                }
            }

            /**
             * Filter payment method options based on delivery method and city
             */
            function filterPaymentMethods(deliveryMethod, cityId) {
                const $paymentSelect = $('#paymentMethod');
                const selectedValue = $paymentSelect.val();
                const allowedMethods = getAllowedPaymentMethods(deliveryMethod, cityId);
                
                console.log('Filtering payment methods - deliveryMethod:', deliveryMethod, 'cityId:', cityId, 'allowedMethods:', allowedMethods);
                
                // Hide/show options based on allowed methods
                $paymentSelect.find('option').each(function() {
                    const $option = $(this);
                    const paymentMethodId = parseInt($option.attr('data-payment-method-id') || $option.val());
                    
                    if ($option.val() === '') {
                        return; // Keep the placeholder/default option
                    }
                    
                    if (allowedMethods.includes(paymentMethodId)) {
                        $option.show();
                        console.log('Showing payment method:', paymentMethodId);
                    } else {
                        $option.hide();
                        console.log('Hiding payment method:', paymentMethodId);
                        // If this option was selected and it's not allowed, clear selection
                        if ($option.val() == selectedValue) {
                            $paymentSelect.val('');
                        }
                    }
                });

                // If no valid option is selected, select the first visible option
                if (!$paymentSelect.val() || !$paymentSelect.find('option:selected').is(':visible')) {
                    const firstVisible = $paymentSelect.find('option:visible').not('[value=""]').first();
                    if (firstVisible.length) {
                        $paymentSelect.val(firstVisible.val());
                    }
                }
            }

            function toggleFields(deliveryMethod) {
                if (deliveryMethod === 'delivery') {
                    $('#area_id_div').show();
                    $('#branch_id_div').hide();
                    $('#branch_id').val('').change();

                    $('#address_div').show();
                    $('#email_div').show();
                    $('#address').attr('required', true);
                    $('#email').attr('required', true);
                    
                    // Update payment methods when switching to delivery
                    // Priority: Use area's city_id if area is selected, otherwise use user's city_id
                    const selectedArea = $('#area_id option:selected');
                    const areaCityId = selectedArea.val() ? selectedArea.attr('data-city-id') : null;
                    const cityId = (areaCityId ? parseInt(areaCityId) : null) || userCityId;
                    console.log('Delivery selected - Area city_id:', areaCityId, 'User city_id:', userCityId, 'Final cityId:', cityId);
                    filterPaymentMethods(deliveryMethod, cityId);
                    updateShippingNote(deliveryMethod, cityId);
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
                    
                    // Show all payment methods for pickup
                    filterPaymentMethods(deliveryMethod, null);
                    updateShippingNote(deliveryMethod, null);
                } else {
                    $('#branch_id_div').hide();
                    $('#area_id_div').hide();
                    $('#area_id').val('');
                    $('#branch_id').val('');

                    $('#address_div').hide();
                    $('#email_div').hide();
                    $('#address').removeAttr('required');
                    $('#email').removeAttr('required');
                    
                    // Show all payment methods
                    filterPaymentMethods(deliveryMethod, null);
                    updateShippingNote(deliveryMethod, null);
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

            // Delivery method change handler
            $('#deliveryMethod').on('change', function () {
                const deliveryMethod = $(this).val();
                toggleFields(deliveryMethod);
            });

            // Area change handler - updates both shipping price and payment methods
            $('#area_id').on('change', function () {
                const areaId = $(this).val();
                const deliveryMethod = $('#deliveryMethod').val();
                const areaCityId = $(this).find('option:selected').attr('data-city-id');
                
                // Update payment methods based on selected area
                // Priority: Use area's city_id when area is selected (overrides user's city_id)
                if (deliveryMethod === DELIVERY_METHODS.DELIVERY) {
                    let cityId = null;
                    if (areaId && areaCityId) {
                        cityId = parseInt(areaCityId);
                    } else if (!areaId && userCityId) {
                        cityId = userCityId;
                    }
                    console.log('Area changed - Area ID:', areaId, 'Area city_id:', areaCityId, 'User city_id:', userCityId, 'Final cityId:', cityId, 'Alexandria check:', cityId === ALEXANDRIA_CITY_ID);
                    filterPaymentMethods(deliveryMethod, cityId);
                    updateShippingNote(deliveryMethod, cityId);
                }
                
                // Update shipping price
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

            // Initial setup on page load
            const initialDeliveryMethod = $('#deliveryMethod').val();
            toggleFields(initialDeliveryMethod);
            
            // If user is logged in with city_id and delivery is selected, filter payment methods
            if (userCityId && initialDeliveryMethod === DELIVERY_METHODS.DELIVERY) {
                filterPaymentMethods(initialDeliveryMethod, userCityId);
                updateShippingNote(initialDeliveryMethod, userCityId);
            }
        });
    </script>

@endsection