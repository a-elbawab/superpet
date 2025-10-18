<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header justify-content-end">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul id="cartItems">
            <!-- Cart items will be dynamically added here -->
        </ul>
        <div class="cust d-flex justify-content-between align-items-center p-3 mb-3">
            <span>Total:</span>
            <span class="totalPriceAmount">0 @lang('frontend.currency')</span> <!-- Ensure this is correct -->
        </div>

        <div class="d-flex justify-content-between align-items-center">
            <a class="view" href="{{ route('front.cart.checkout') }}">@lang('frontend.checkout')</a>
        </div>
    </div>
</div>
