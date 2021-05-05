<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/products', function () {
    return view('layout');
});

Route::get('/loginAdmin', function () {
    return view('loginAdmin');
});

Route::get('/loginUser', function () {
    return view('shop.loginUser');
});

Route::get('/users', function () {
    return view('index');
});

Route::get('/registerUser', function () {
    return view('auth.registerUser');
});

Route::get('/loginUserAuth', function () {
    return view('auth.loginUser');
});

Route::get('/thankyou', function () {
    return view('shop.thankYou');
});

Route::get('/wishlist', function () {
    return view('shop.wishlist');
});

// LogIn Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('login2', 'Auth\LoginControllerUser@showLoginForm')->name('login2');
Route::post('login2', 'Auth\LoginControllerUser@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');
Route::get('register2', 'Auth\RegisterControllerUser@showRegistrationForm')->name('register2');
Route::post('register2', 'Auth\RegisterControllerUser@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Confirm Password
Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');

// Email Verification Routes...
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify'); 
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

Route::get('shop', 'ShopController@indexShop');

Route::get('shop1', 'ShopController@checkout')->name('shop1');

Route::get('cart', 'ShopController@showcart');

Route::get('cart2', 'ShopController@showwishlist');

Route::get('add-to-cart/{id}', 'ShopController@addToCart');

Route::get('add-to-cart2/{id}', 'ShopController@addToWishlist');

Route::resource('products','ProductController');

Route::resource('users','UserController');

Route::resource('shop','ShopController');

Route::patch('update-cart', 'ShopController@update');
 
Route::delete('remove-from-cart', 'ShopController@remove');

// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('showcart','ShopController@showcart');

// Route::get('/loginAdmin','AdministradorController@index')->name('loginAdmin');


