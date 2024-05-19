<?php

use App\Http\Controllers\Client\AddressController;
use App\Http\Controllers\Client\AuthController;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ProfileController;
use App\Http\Controllers\Payment\TapController;
use App\Http\Middleware\CheckAuth;
use App\Http\Middleware\ForceSSL;
use App\Http\Middleware\Localization;
use Illuminate\Support\Facades\Route;

Route::group(['as' => 'client.', 'middleware' => [Localization::class, ForceSSL::class]], function () {

    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('/get-subcategories', [HomeController::class, 'getSubcategories'])->name('get-subcategories');
    Route::any('shop/{category_id?}', [HomeController::class, 'shop'])->name('shop');
    Route::post('changeWebsiteSettings', [HomeController::class, 'changeWebsiteSettings'])->name('changeWebsiteSettings');
    Route::get('product/{id}/{category_id?}', [HomeController::class, 'product'])->name('product');
    Route::post('productGallery', [HomeController::class, 'productGallery'])->name('productGallery');
    Route::post('add-to-cart', [HomeController::class, 'AddToCart'])->name('AddToCart');
    Route::post('add-to-whisList', [HomeController::class, 'AddToWhishList'])->name('AddToWhishList');
    Route::GET('shoping-cart', [HomeController::class, 'cart'])->name('cart');
    Route::any('wishList', [HomeController::class, 'washList'])->name('washList');
    Route::POST('washList-delete', [HomeController::class, 'deleteitemWishList'])->name('deleteitemWishList');
    Route::POST('washList-deleteAll', [HomeController::class, 'deleteitemWishListAll'])->name('deleteitemWishListAll');
    // Route::POST('transform', [HomeController::class, 'Transform'])->name('transform');
    Route::POST('cart-delete', [HomeController::class, 'deleteitem'])->name('deleteitem');
    Route::POST('cart-plus', [HomeController::class, 'plus'])->name('plus');
    Route::POST('cart-minus', [HomeController::class, 'minus'])->name('minus');
    Route::get('check-out', [HomeController::class, 'confirm'])->name('confirm');
    Route::post('getRigons', [HomeController::class, 'getRigons'])->name('getRigons');
    Route::post('getInailDeliveryCost', [HomeController::class, 'getInailDeliveryCost'])->name('getInailDeliveryCost');
    Route::post('getTotalBeforShipping', [HomeController::class, 'getTotalBeforShipping'])->name('getTotalBeforShipping');
    Route::post('getDeliveryCost', [HomeController::class, 'getDeliveryCost'])->name('getDeliveryCost');
    Route::POST('applayCode', [HomeController::class, 'applayCode'])->name('applayCode');
    Route::POST('place-order', [HomeController::class, 'submit'])->name('submit');
    Route::get('success/{id}', [HomeController::class, 'success'])->name('success');

    // Route::POST('place-order/{delivery_id}', [HomeController::class, 'submit'])->name('submit');


    Route::any('search', [HomeController::class, 'search'])->name('search');


    Route::get('about', [HomeController::class, 'about'])->name('about');
    Route::get('vacancy', [HomeController::class, 'Vacancy'])->name('vacancy');
    Route::post('career', [HomeController::class, 'Career'])->name('career.post');

    Route::get('faq', [HomeController::class, 'faq'])->name('faq');
    Route::view('terms', 'Client.terms')->name('terms');
    
    Route::view('return_refund_policy', 'Client.return_refund_policy')->name('return_refund_policy');
    Route::view('shipping_policy', 'Client.shipping_policy')->name('shipping_policy');

    Route::view('privacy', 'Client.privacy')->name('privacy');

    Route::POST('contact', [HomeController::class, 'contact'])->name('contact');
    Route::get('contact-us', [HomeController::class, 'contactUs'])->name('contactUs');

    Route::group(['middleware' => ['guest:client']], function () {
        Route::view('/login', 'Client.login')->name('login');
        Route::POST('/login', [AuthController::class, 'login'])->name('login');

        Route::view('/register', 'Client.register')->name('register');
        Route::POST('/register', [AuthController::class, 'register'])->name('register');

        Route::view('/forget', 'Client.forget')->name('forget');
        Route::POST('/forget', [AuthController::class, 'forget'])->name('forget');
        Route::get('/otpPage/{id}', [AuthController::class, 'otpPage'])->name('otpPage');
        Route::post('/sendOtp', [AuthController::class, 'sendOtp'])->name('sendOtp');
        Route::get('/restPasswordPage/{id}', [AuthController::class, 'restPasswordPage'])->name('restPasswordPage');
        Route::post('/restPassword', [AuthController::class, 'restPassword'])->name('restPassword');
        Route::post('resend', [AuthController::class, 'Resend'])->name('resend');


    });

    Route::group(['middleware' => [CheckAuth::class]], function () {
        Route::any('toggle-fav', [HomeController::class, 'ToggleFav'])->name('toggle-fav');
        Route::get('profile', [ProfileController::class, 'profile'])->name('profile');
        Route::get('edit-profile', [ProfileController::class, 'edit'])->name('edit-profile');
        Route::get('orderDetails', [ProfileController::class, 'orderDetails'])->name('orderDetails');
        Route::POST('orderView', [ProfileController::class, 'orderView'])->name('orderView');

        // Route::view('/edit-profile', 'Client.edit-profile')->name('edit-profile');
        Route::POST('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::POST('/client-review', [HomeController::class, 'ClientReview'])->name('ClientReview');
        Route::resource('/address', AddressController::class);
        // Route::resource('/profile', ProfileController::class);
        Route::any('/logout', [AuthController::class, 'logout'])->name('logout');
        Route::get('changePassword', [ProfileController::class, 'changePassword'])->name('change.password');
        Route::put('updatePassword', [ProfileController::class, 'updatePassword'])->name('update.password');

    });

    Route::group(['prefix' => 'payment', 'as' => 'payment.'], function () {
        Route::group(['prefix' => 'tap', 'as' => 'tap.'], function () {
            Route::any('init', [TapController::class, 'init'])->name('init'); // client.payment.tap.init
            Route::any('response', [TapController::class, 'response'])->name('response'); // client.payment.tap.response
        });
    });
});
