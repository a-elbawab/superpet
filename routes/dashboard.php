<?php

use App\Http\Controllers\Dashboard\ServiceController;
use App\Http\Controllers\Dashboard\VariationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Dashboard Routes
|--------------------------------------------------------------------------
|
| Here is where you can register dashboard routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "dashboard" middleware group and "App\Http\Controllers\Dashboard" namespace.
| and "dashboard." route's alias name. Enjoy building your dashboard!
|
*/

Route::get('/home', 'DashboardController@index')->name('home');

// Select All Routes.
Route::delete('delete', 'DeleteController@destroy')->name('delete.selected');
Route::delete('forceDelete', 'DeleteController@forceDelete')->name('forceDelete.selected');
Route::delete('restore', 'DeleteController@restore')->name('restore.selected');
Route::post('attend', 'DeleteController@attend')->name('attend.selected');

// Select All Routes.
Route::get('export', 'ExcelController@export')->name('excel.export');
Route::post('import', 'ExcelController@import')->name('excel.import');

// Customers Routes.
Route::get('trashed/customers', 'CustomerController@trashed')->name('customers.trashed');
Route::get('trashed/customers/{trashed_customer}', 'CustomerController@showTrashed')->name('customers.trashed.show');
Route::post('customers/{trashed_customer}/restore', 'CustomerController@restore')->name('customers.restore');
Route::delete('customers/{trashed_customer}/forceDelete', 'CustomerController@forceDelete')->name('customers.forceDelete');
Route::resource('customers', 'CustomerController');
Route::get('status/customers/{customer}', 'CustomerController@status')->name('customers.status');

// Supervisors Routes.
Route::get('trashed/supervisors', 'SupervisorController@trashed')->name('supervisors.trashed');
Route::get('trashed/supervisors/{trashed_supervisor}', 'SupervisorController@show')->name('supervisors.trashed.show');
Route::post('supervisors/{trashed_supervisor}/restore', 'SupervisorController@restore')->name('supervisors.restore');
Route::delete('supervisors/{trashed_supervisor}/forceDelete', 'SupervisorController@forceDelete')->name('supervisors.forceDelete');
Route::resource('supervisors', 'SupervisorController');
Route::get('status/supervisors/{supervisor}', 'SupervisorController@status')->name('supervisors.status');

// Admins Routes.
Route::get('trashed/admins', 'AdminController@trashed')->name('admins.trashed');
Route::get('trashed/admins/{trashed_admin}', 'AdminController@show')->name('admins.trashed.show');
Route::post('admins/{trashed_admin}/restore', 'AdminController@restore')->name('admins.restore');
Route::delete('admins/{trashed_admin}/forceDelete', 'AdminController@forceDelete')->name('admins.forceDelete');
Route::resource('admins', 'AdminController');

// Settings Routes.
Route::get('settings', 'SettingController@index')->name('settings.index');
Route::patch('settings', 'SettingController@update')->name('settings.update');
Route::get('backup/download', 'SettingController@downloadBackup')->name('backup.download');

// Feedback Routes.
Route::patch('feedback/read', 'FeedbackController@read')->name('feedback.read');
Route::patch('feedback/unread', 'FeedbackController@unread')->name('feedback.unread');
Route::resource('feedback', 'FeedbackController')->only('index', 'show', 'destroy');

Route::get('trashed/categories', 'CategoryController@trashed')->name('categories.trashed');
Route::get('trashed/categories/{trashed_category}', 'CategoryController@showTrashed')->name('categories.trashed.show');
Route::post('categories/{trashed_category}/restore', 'CategoryController@restore')->name('categories.restore');
Route::delete('categories/{trashed_category}/forceDelete', 'CategoryController@forceDelete')->name('categories.forceDelete');
Route::resource('categories', 'CategoryController');
Route::get('getSubCategories', 'CategoryController@getSubCategories')->name('categories.getSubCategories');

// Motifications
Route::resource('notifications', 'NotificationController');
Route::get('notifications/all/mark-as-read', 'NotificationController@markAllAsRead')
    ->name('notifications.mark_as_read');

Route::get('trashed/roles', 'RoleController@trashed')->name('roles.trashed');
Route::get('trashed/roles/{trashed_role}', 'RoleController@showTrashed')->name('roles.trashed.show');
Route::post('roles/{trashed_role}/restore', 'RoleController@restore')->name('roles.restore');
Route::delete('roles/{trashed_role}/forceDelete', 'RoleController@forceDelete')->name('roles.forceDelete');
Route::resource('roles', 'RoleController');

// Countries
Route::resource('countries', 'CountryController');
Route::get('status/countries/{country}', 'CountryController@status')->name('countries.status');
Route::resource('countries.cities', 'CityController')->except('create');
Route::resource('cities.areas', 'AreaController')->except('create', 'show');
Route::post('areas/sort', 'AreaController@sort')
    ->name('areas.sort');

// Pages
Route::resource('pages', 'PageController');

// Products Routes.
Route::get('trashed/products', 'ProductController@trashed')->name('products.trashed');
Route::get('trashed/products/{trashed_product}', 'ProductController@showTrashed')->name('products.trashed.show');
Route::post('products/{trashed_product}/restore', 'ProductController@restore')->name('products.restore');
Route::delete('products/{trashed_product}/forceDelete', 'ProductController@forceDelete')->name('products.forceDelete');
Route::resource('products', 'ProductController');
Route::resource('products', 'ProductController')
    ->parameters(['products' => 'product'])
    ->scoped(['product' => 'id']);
Route::delete('product-variations/media/{media}', 'ProductController@deleteMedia')
    ->name('dashboard.product-variations.media.delete');

// Attributes Routes.
Route::get('trashed/attributes', 'AttributeController@trashed')->name('attributes.trashed');
Route::get('trashed/attributes/{trashed_attribute}', 'AttributeController@showTrashed')->name('attributes.trashed.show');
Route::post('attributes/{trashed_attribute}/restore', 'AttributeController@restore')->name('attributes.restore');
Route::delete('attributes/{trashed_attribute}/forceDelete', 'AttributeController@forceDelete')->name('attributes.forceDelete');
Route::resource('attributes', 'AttributeController');
Route::resource('variations', 'VariationController')->except('create', 'store');
Route::get('variations/create/{attribute}', 'VariationController@create')->name('variations.create');
Route::post('variations/{attribute}', 'VariationController@store')->name('variations.store');
Route::get('get-variations/by-attribute', [VariationController::class, 'getVariationsByAttribute'])->name('variations.byAttribute');

// Invoices Routes.
Route::get('trashed/invoices', 'InvoiceController@trashed')->name('invoices.trashed');
Route::get('trashed/invoices/{trashed_invoice}', 'InvoiceController@showTrashed')->name('invoices.trashed.show');
Route::post('invoices/{trashed_invoice}/restore', 'InvoiceController@restore')->name('invoices.restore');
Route::delete('invoices/{trashed_invoice}/forceDelete', 'InvoiceController@forceDelete')->name('invoices.forceDelete');
Route::resource('invoices', 'InvoiceController');

// Tags Routes.
Route::get('trashed/tags', 'TagController@trashed')->name('tags.trashed');
Route::get('trashed/tags/{trashed_tag}', 'TagController@showTrashed')->name('tags.trashed.show');
Route::post('tags/{trashed_tag}/restore', 'TagController@restore')->name('tags.restore');
Route::delete('tags/{trashed_tag}/forceDelete', 'TagController@forceDelete')->name('tags.forceDelete');
Route::resource('tags', 'TagController');

// Services Routes.
Route::get('trashed/services', 'ServiceController@trashed')->name('services.trashed');
Route::get('trashed/services/{trashed_service}', 'ServiceController@showTrashed')->name('services.trashed.show');
Route::post('services/{trashed_service}/restore', 'ServiceController@restore')->name('services.restore');
Route::delete('services/{trashed_service}/forceDelete', 'ServiceController@forceDelete')->name('services.forceDelete');
Route::resource('services', 'ServiceController');
Route::post('/services/sort', [ServiceController::class, 'sort'])->name('services.sort');

// Bookings Routes.
Route::get('trashed/bookings', 'BookingController@trashed')->name('bookings.trashed');
Route::get('trashed/bookings/{trashed_booking}', 'BookingController@showTrashed')->name('bookings.trashed.show');
Route::post('bookings/{trashed_booking}/restore', 'BookingController@restore')->name('bookings.restore');
Route::delete('bookings/{trashed_booking}/forceDelete', 'BookingController@forceDelete')->name('bookings.forceDelete');
Route::resource('bookings', 'BookingController');

// Sections Routes.
Route::get('trashed/sections', 'SectionController@trashed')->name('sections.trashed');
Route::get('trashed/sections/{trashed_section}', 'SectionController@showTrashed')->name('sections.trashed.show');
Route::post('sections/{trashed_section}/restore', 'SectionController@restore')->name('sections.restore');
Route::delete('sections/{trashed_section}/forceDelete', 'SectionController@forceDelete')->name('sections.forceDelete');
Route::resource('sections', 'SectionController');
Route::get('sections/create/{service}', 'SectionController@create')->name('sections.create');

// Inputs Routes.
Route::get('trashed/inputs', 'InputController@trashed')->name('inputs.trashed');
Route::get('trashed/inputs/{trashed_input}', 'InputController@showTrashed')->name('inputs.trashed.show');
Route::post('inputs/{trashed_input}/restore', 'InputController@restore')->name('inputs.restore');
Route::delete('inputs/{trashed_input}/forceDelete', 'InputController@forceDelete')->name('inputs.forceDelete');
Route::resource('inputs', 'InputController');
Route::get('inputs/create/{section}', 'InputController@create')->name('inputs.create');

// Options Routes.
Route::get('trashed/options', 'OptionController@trashed')->name('options.trashed');
Route::get('trashed/options/{trashed_option}', 'OptionController@showTrashed')->name('options.trashed.show');
Route::post('options/{trashed_option}/restore', 'OptionController@restore')->name('options.restore');
Route::delete('options/{trashed_option}/forceDelete', 'OptionController@forceDelete')->name('options.forceDelete');
Route::resource('options', 'OptionController');
Route::get('options/create/{input}', 'OptionController@create')->name('options.create');

// Orders Routes.
Route::get('trashed/orders', 'OrderController@trashed')->name('orders.trashed');
Route::get('trashed/orders/{trashed_order}', 'OrderController@showTrashed')->name('orders.trashed.show');
Route::post('orders/{trashed_order}/restore', 'OrderController@restore')->name('orders.restore');
Route::delete('orders/{trashed_order}/forceDelete', 'OrderController@forceDelete')->name('orders.forceDelete');
Route::resource('orders', 'OrderController');

// Hints Routes.
Route::get('trashed/hints', 'HintController@trashed')->name('hints.trashed');
Route::get('trashed/hints/{trashed_hint}', 'HintController@showTrashed')->name('hints.trashed.show');
Route::post('hints/{trashed_hint}/restore', 'HintController@restore')->name('hints.restore');
Route::delete('hints/{trashed_hint}/forceDelete', 'HintController@forceDelete')->name('hints.forceDelete');
Route::resource('hints', 'HintController');
Route::get('hints/{hint}/done', 'HintController@done')->name('hints.done');

// Branches Routes.
Route::get('trashed/branches', 'BranchController@trashed')->name('branches.trashed');
Route::get('trashed/branches/{trashed_branch}', 'BranchController@showTrashed')->name('branches.trashed.show');
Route::post('branches/{trashed_branch}/restore', 'BranchController@restore')->name('branches.restore');
Route::delete('branches/{trashed_branch}/forceDelete', 'BranchController@forceDelete')->name('branches.forceDelete');
Route::resource('branches', 'BranchController');

// Posts Routes.
Route::get('trashed/posts', 'PostController@trashed')->name('posts.trashed');
Route::get('trashed/posts/{trashed_post}', 'PostController@showTrashed')->name('posts.trashed.show');
Route::post('posts/{trashed_post}/restore', 'PostController@restore')->name('posts.restore');
Route::delete('posts/{trashed_post}/forceDelete', 'PostController@forceDelete')->name('posts.forceDelete');
Route::resource('posts', 'PostController');

// Items Routes.
Route::get('trashed/items', 'ItemController@trashed')->name('items.trashed');
Route::get('trashed/items/{trashed_item}', 'ItemController@showTrashed')->name('items.trashed.show');
Route::post('items/{trashed_item}/restore', 'ItemController@restore')->name('items.restore');
Route::delete('items/{trashed_item}/forceDelete', 'ItemController@forceDelete')->name('items.forceDelete');
Route::resource('items', 'ItemController');

// CategoryProducts Routes.
Route::get('trashed/category_products', 'CategoryProductController@trashed')->name('category_products.trashed');
Route::get('trashed/category_products/{trashed_category_product}', 'CategoryProductController@showTrashed')->name('category_products.trashed.show');
Route::post('category_products/{trashed_category_product}/restore', 'CategoryProductController@restore')->name('category_products.restore');
Route::delete('category_products/{trashed_category_product}/forceDelete', 'CategoryProductController@forceDelete')->name('category_products.forceDelete');
Route::resource('category_products', 'CategoryProductController');

// Sliders Routes.
Route::get('trashed/sliders', 'SliderController@trashed')->name('sliders.trashed');
Route::get('trashed/sliders/{trashed_slider}', 'SliderController@showTrashed')->name('sliders.trashed.show');
Route::post('sliders/{trashed_slider}/restore', 'SliderController@restore')->name('sliders.restore');
Route::delete('sliders/{trashed_slider}/forceDelete', 'SliderController@forceDelete')->name('sliders.forceDelete');
Route::resource('sliders', 'SliderController');

// Teams Routes.
Route::get('trashed/teams', 'TeamController@trashed')->name('teams.trashed');
Route::get('trashed/teams/{trashed_team}', 'TeamController@showTrashed')->name('teams.trashed.show');
Route::post('teams/{trashed_team}/restore', 'TeamController@restore')->name('teams.restore');
Route::delete('teams/{trashed_team}/forceDelete', 'TeamController@forceDelete')->name('teams.forceDelete');
Route::resource('teams', 'TeamController');

// Galleries Routes.
Route::get('trashed/galleries', 'GalleryController@trashed')->name('galleries.trashed');
Route::get('trashed/galleries/{trashed_gallery}', 'GalleryController@showTrashed')->name('galleries.trashed.show');
Route::post('galleries/{trashed_gallery}/restore', 'GalleryController@restore')->name('galleries.restore');
Route::delete('galleries/{trashed_gallery}/forceDelete', 'GalleryController@forceDelete')->name('galleries.forceDelete');
Route::resource('galleries', 'GalleryController');

Route::get('ajax/notifications/list', function () {
    $notifications = auth()->user()->unreadNotifications()->limit(5)->get();

    return view('layouts.vuexy.notifications', compact('notifications'))->render();
})->name('notifications.list');
Route::get('ajax/notifications/count', function () {
    return response()->json([
        'count' => auth()->user()->unreadNotifications()->count(),
    ]);
})->name('notifications.count');

/*  The routes of generated crud will set here: Don't remove this line  */
