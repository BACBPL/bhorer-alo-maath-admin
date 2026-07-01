<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceProviderController;
use App\Http\Controllers\ProviderServiceController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\LaptopServiceController;
use App\Http\Controllers\LaptopServiceCategoryController;
use App\Http\Controllers\LaptopBrandController;
use App\Http\Controllers\LaptopModelController;

Route::get('/admin', function () {
    return redirect('/admin/login');
});

Route::get('/admin/login', [AdminController::class, 'login']);
Route::post('/admin/login', [AdminController::class, 'loginSubmit']);

Route::middleware('admin.auth')->group(function () {

Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);

// Categories
Route::get('/admin/categories', [CategoryController::class, 'categories']);
Route::get('/admin/categories/create', [CategoryController::class, 'createCategory']);
Route::post('/admin/categories/store', [CategoryController::class, 'storeCategory']);
Route::get('/admin/categories/edit/{id}', [CategoryController::class, 'editCategory']);
Route::post('/admin/categories/update/{id}', [CategoryController::class, 'updateCategory']);
Route::get('/admin/categories/delete/{id}', [CategoryController::class, 'deleteCategory']);

// Sub Categories
Route::get('/admin/subcategories', [SubCategoryController::class, 'subCategories']);
Route::get('/admin/subcategories/create', [SubCategoryController::class, 'createSubCategory']);
Route::post('/admin/subcategories/store', [SubCategoryController::class, 'storeSubCategory']);
Route::get('/admin/subcategories/edit/{id}', [SubCategoryController::class, 'editSubCategory']);
Route::post('/admin/subcategories/update/{id}', [SubCategoryController::class, 'updateSubCategory']);
Route::get('/admin/subcategories/delete/{id}', [SubCategoryController::class, 'deleteSubCategory']);

// Services
Route::get('/admin/services', [ServiceController::class, 'services']);
Route::get('/admin/services/create', [ServiceController::class, 'createService']);
Route::post('/admin/services/store', [ServiceController::class, 'storeService']);
Route::get('/admin/services/edit/{id}', [ServiceController::class, 'editService']);
Route::post('/admin/services/update/{id}', [ServiceController::class, 'updateService']);
Route::get('/admin/services/delete/{id}', [ServiceController::class, 'deleteService']);

// Laptop Services
Route::get('/admin/laptop-services', [LaptopServiceController::class, 'index']);
Route::get('/admin/laptop-services/create', [LaptopServiceController::class, 'create']);
Route::post('/admin/laptop-services/store', [LaptopServiceController::class, 'store']);
Route::get('/admin/laptop-service-categories', [LaptopServiceCategoryController::class, 'index']);
Route::get('/admin/laptop-service-categories/create', [LaptopServiceCategoryController::class, 'create']);
Route::post('/admin/laptop-service-categories/store', [LaptopServiceCategoryController::class, 'store']);

// Laptop Brands
Route::get('/admin/laptop-brands', [LaptopBrandController::class, 'index']);
Route::get('/admin/laptop-brands/create', [LaptopBrandController::class, 'create']);
Route::post('/admin/laptop-brands/store', [LaptopBrandController::class, 'store']);

// Laptop Models
Route::get('/admin/laptop-models', [LaptopModelController::class, 'index']);
Route::get('/admin/laptop-models/create', [LaptopModelController::class, 'create']);
Route::post('/admin/laptop-models/store', [LaptopModelController::class, 'store']);

// Providers
Route::get('/admin/providers', [ProviderController::class, 'providers']);
Route::get('/admin/providers/create', [ProviderController::class, 'createProvider']);
Route::post('/admin/providers/store', [ProviderController::class, 'storeProvider']);
Route::get('/admin/providers/edit/{id}', [ProviderController::class, 'editProvider']);
Route::post('/admin/providers/update/{id}', [ProviderController::class, 'updateProvider']);
Route::get('/admin/providers/delete/{id}', [ProviderController::class, 'deleteProvider']);
Route::get('/admin/pincode/search', [ProviderController::class, 'searchPincode']);
Route::get('/admin/pincode/details', [ProviderController::class, 'getPincodeDetails']);

// Skills
Route::get('/admin/skills', [SkillController::class, 'index']);
Route::get('/admin/skills/create', [SkillController::class, 'create']);
Route::post('/admin/skills/store', [SkillController::class, 'store']);
Route::get('/admin/skills/edit/{id}', [SkillController::class, 'edit']);
Route::post('/admin/skills/update/{id}', [SkillController::class, 'update']);
Route::get('/admin/skills/delete/{id}', [SkillController::class, 'delete']);

// Provider Services
Route::get('/admin/provider-services', [ProviderServiceController::class, 'providerServices']);
Route::get('/admin/provider-services/create', [ProviderServiceController::class, 'createProviderService']);
Route::post('/admin/provider-services/store', [ProviderServiceController::class, 'storeProviderService']);
Route::get('/admin/provider-services/edit/{id}', [ProviderServiceController::class, 'editProviderService']);
Route::post('/admin/provider-services/update/{id}', [ProviderServiceController::class, 'updateProviderService']);
Route::get('/admin/provider-services/delete/{id}', [ProviderServiceController::class, 'deleteProviderService']);

Route::get('/admin/banners', [BannerController::class, 'index']);
Route::get('/admin/banners/create', [BannerController::class, 'create']);
Route::post('/admin/banners/store', [BannerController::class, 'store']);
Route::get('/admin/banners/edit/{id}', [BannerController::class, 'edit']);
Route::post('/admin/banners/update/{id}', [BannerController::class, 'update']);
Route::get('/admin/banners/delete/{id}', [BannerController::class, 'delete']);

// Bookings
Route::get('/admin/bookings', [BookingController::class, 'bookings']);

// Users
Route::get('/admin/users', [UserController::class, 'users']);

// Reviews
Route::get('/admin/reviews', [ReviewController::class, 'reviews']);

// Payments
Route::get('/admin/payments', [PaymentController::class, 'payments']);

// Logout
Route::get('/admin/logout', [AdminController::class, 'logout']);

});
