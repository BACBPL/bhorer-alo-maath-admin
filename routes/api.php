<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\LaptopServiceController;

Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/services', [ServiceController::class, 'index']);

Route::get('/services/{id}', [ServiceController::class, 'show']);

Route::get('/featured-services', [ServiceController::class, 'featuredServices']);

Route::get('/most-booked-services', [ServiceController::class, 'mostBookedServices']);

Route::get('/hero-banners', [BannerController::class, 'heroBanners']);

Route::get('/offer-banners', [BannerController::class, 'offerBanners']);

Route::get('/most-booked-banners', [BannerController::class, 'mostBookedBanners']);

Route::get('/service-banners', [BannerController::class, 'serviceBanners']);

Route::post('/user-login', [LoginController::class, 'verifyOtp']);

Route::post('/send-otp', [LoginController::class, 'sendOtp']);

Route::post('/customer', [LoginController::class, 'getCustomer']);
Route::post('/verify-otp', [LoginController::class, 'verifyOtp']);

Route::middleware('auth:sanctum')->group(function () {

    Route::get('/profile', [LoginController::class, 'getCustomer']);

    Route::post('/complete-profile', [LoginController::class, 'completeProfile']);

    Route::post('/upload-profile-image', [LoginController::class, 'uploadProfileImage']);

});

Route::middleware('auth:sanctum')->post(
    '/upload-profile-image',
    [LoginController::class,'uploadProfileImage']
);

Route::get('/laptop-services', [LaptopServiceController::class, 'index']);

Route::get('/laptop-services/{id}', [LaptopServiceController::class, 'show']);

Route::get('/most-booked-laptop-services', [LaptopServiceController::class, 'mostBooked']);