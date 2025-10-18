<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\Frontend\AlgoliaSearchController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Models\Area;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('dashboard.locales')->group(function () {
    Auth::routes(['verify' => true]);
});

Route::impersonate();
Route::get('locale/{locale}', 'LocaleController@update')->name('locale')->where('locale', '(ar|en)');
Route::get('/email/verify', function () {
    if (auth()->user()?->hasVerifiedEmail()) {
        return redirect()->route('front.me');
    }
    return view('frontend.auth.verify');
})->middleware('auth')->name('verification.notice');


use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

// إعادة إرسال الإيميل
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('resent', true);
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route:: as('front.')->group(function () {
    Route::get('/search', [AlgoliaSearchController::class, 'search'])->name('algolia.search');
    Route::get('/', 'Frontend\FrontendController@index')->name('home');
    Route::get('about', 'Frontend\FrontendController@about')->name('about');
    Route::get('terms', 'Frontend\FrontendController@terms')->name('terms');
    Route::get('privacy', 'Frontend\FrontendController@privacy')->name('privacy');
    Route::get('shipping-policy', 'Frontend\FrontendController@shippingPolicy')->name('shipping_policy');
    Route::get('return-policy', 'Frontend\FrontendController@returnPolicy')->name('return_policy');
    Route::get('posts', 'Frontend\FrontendController@posts')->name('posts');
    Route::get('posts/{post}', 'Frontend\FrontendController@post')->name('posts.show');
    Route::get('services', 'Frontend\ServiceController@index')->name('services');

    Route::post('services/book/{service}', 'Frontend\ServiceController@book')->name('services.book');

    Route::get('contact', 'Frontend\FrontendController@contact')->name('contact');
    Route::post('contact', 'Frontend\FrontendController@contactStore')->name('contactStore');

    Route::get('profile/login', 'Frontend\FrontendController@login')->name('login');
    Route::get('registration', 'Frontend\FrontendController@registration')->name('registration');

    Route::get('shop', 'Frontend\ShopController@shop')->name('shop');
    Route::get('product/{product:slug}', 'Frontend\ShopController@product')->name('product');

    Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::post('/cart/update/{id}', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    Route::post('/set-order', [FrontendController::class, 'setOrder'])->name('setOrder');
    Route::get('/make-order', [FrontendController::class, 'showOrderPage'])->name('makeOrder');
    Route::post('/process-order', [FrontendController::class, 'processOrder'])->name('processOrder');

    // profile
    Route::middleware(['auth', 'customer.verified'])->group(function () {
        Route::post('setOutStockNotify', 'Frontend\ProfileController@setOutStockNotify')->name('setOutStockNotify');
        Route::get('me', 'Frontend\ProfileController@show')->name('me');
        Route::get('me/edit', 'Frontend\ProfileController@edit')->name('me.edit');
        Route::put('me', 'Frontend\ProfileController@update')->name('me.update');
        Route::get('me/orders', 'Frontend\ProfileController@orders')->name('me.orders.index');
        Route::get('me/orders/{order}', 'Frontend\ProfileController@showOrder')->name('me.orders.show');
        Route::get('me/orders/delete/{order}', 'Frontend\ProfileController@deleteOrder')->name('me.orders.delete');
        Route::get('me/bookings', 'Frontend\ProfileController@bookings')->name('me.bookings.index');
        Route::get('me/bookings/{booking}', 'Frontend\ProfileController@showBooking')->name('me.bookings.show');
        Route::delete('me/image', 'Frontend\ProfileController@deleteImage')->name('me.image.delete');
    });
});



Route::get('success/{order}', 'Frontend\FrontendController@success')->name('success');
Route::get('failed', 'Frontend\FrontendController@failed')->name('failed');
Route::get('clear-storage', function () {
    return view('frontend.clear-storage');
})->name('failed');

Route::get('/change-language/{lang}', function ($lang) {
    if (in_array($lang, ['en', 'ar'])) {
        session(['locale' => $lang]);
    }
    return back();
})->name('change.language');


Route::get('/get-area-shipping-price/{area}', function (Area $area) {
    return response()->json([
        'shipping_price' => $area->shipping_price,
    ]);
});
