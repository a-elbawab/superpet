<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\SelectController as CountrySelectController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group and "App\Http\Controllers\Api" namespace.
| and "api." route's alias name. Enjoy building your API!
|
*/
Route::post('/register', 'RegisterController@register')->name('sanctum.register');
Route::post('/login', 'LoginController@login')->name('sanctum.login');
Route::post('/firebase/login', 'LoginController@firebase')->name('sanctum.login.firebase');

Route::post('/password/forget', 'ResetPasswordController@forget')->name('password.forget');
Route::post('/password/code', 'ResetPasswordController@code')->name('password.code');
Route::post('/password/reset', 'ResetPasswordController@reset')->name('password.reset');
Route::get('/select/users', 'UserController@select')->name('users.select');
Route::get('/select/users/types', 'UserController@types')->name('users.types.select');
Route::get('/select/customers', 'UserController@customers')->name('customers.select');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('verification/send', 'VerificationController@send')->name('verification.send');
    Route::post('verification/verify', 'VerificationController@verify')->name('verification.verify');
    Route::get('profile', 'ProfileController@show')->name('profile.show');

    Route::match(['put', 'patch'], 'profile', 'ProfileController@update')->name('profile.update');
});
Route::post('/editor/upload', 'MediaController@editorUpload')->name('editor.upload');
Route::get('/settings', 'SettingController@index')->name('settings.index');
Route::get('/settings/pages/{page}', 'SettingController@page')
    ->where('page', 'about|terms|privacy')->name('settings.page');

Route::post('feedback', 'FeedbackController@store')->name('feedback.send');
Route::apiResource('categories', 'CategoryController');
Route::apiResource('cities', 'CityController');
Route::apiResource('roles', 'RoleController');
Route::get('/select/roles', 'RoleController@select')->name('roles.select');

// Countries
Route::get('/select/countries', 'SelectController@countries')->name('countries.select');
Route::get('/select/cities', 'SelectController@cities')->name('cities.select');
Route::get('/select/cities/{city}/areas', [CountrySelectController::class, 'cityAreas'])->name('cities.areas.select');
Route::get('/select/areas', 'SelectController@areas')->name('areas.select');
Route::get('/select/pages', 'SelectController@pages')->name('pages.select');
Route::get('/select/tags', 'TagController@select')->name('tags.select');

Route::apiResource('countries', 'SelectController')->only('index', 'show');
Route::get('country/default', 'SelectController@default')->name('countries.default');
Route::apiResource('cities', 'SelectController')->only('index', 'show');
Route::get('countries/cities/options', 'SelectController@options')->name('cities.options');
Route::get('areas', 'AreaController@index');
Route::get('areas/options', 'AreaController@options')->name('areas.options');

Route::apiResource('categories', 'CategoryController');
Route::get('/select/categories', 'CategoryController@select')->name('categories.select');
