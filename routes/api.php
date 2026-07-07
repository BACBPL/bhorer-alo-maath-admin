<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\BannerController;

Route::get('/categories', [CategoryController::class, 'index']);

Route::get('/services', [ServiceController::class, 'index']);

Route::get('/services/{id}', [ServiceController::class, 'show']);

Route::get('/featured-services', [ServiceController::class, 'featuredServices']);

Route::get('/most-booked-services', [ServiceController::class, 'mostBookedServices']);

Route::get('/hero-banners', [BannerController::class, 'heroBanners']);

Route::get('/offer-banners', [BannerController::class, 'offerBanners']);

Route::get('/most-booked-banners', [BannerController::class, 'mostBookedBanners']);

Route::get('/service-banners', [BannerController::class, 'serviceBanners']);
