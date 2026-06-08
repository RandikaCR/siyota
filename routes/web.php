<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//BACKEND CONTROLLERS
use App\Http\Controllers\Backend\DashboardController AS BackendDashboard;
use App\Http\Controllers\Backend\ProductsController AS BackendProducts;
use App\Http\Controllers\Backend\ProductLabelsController AS BackendProductLabels;
use App\Http\Controllers\Backend\ProductThicknessesController AS BackendProductThicknesses;
use App\Http\Controllers\Backend\ProductCategoriesController AS BackendProductCategories;
use App\Http\Controllers\Backend\LandscapesController AS BackendLandscapes;
use App\Http\Controllers\Backend\MachineryHiresController AS BackendMachineryHires;
use App\Http\Controllers\Backend\MachineriesController AS BackendMachineries;
use App\Http\Controllers\Backend\MachineryCategoriesController AS BackendMachineryCategories;

//FRONTEND CONTROLLERS
use App\Http\Controllers\Frontend\FrontendController AS Frontend;
use App\Http\Controllers\Frontend\ProductsController AS FrontendProducts;

//1 - Frontend Routes
Route::group([ 'prefix' =>'/'], function () {

    Route::get('/', [Frontend::class, 'index'])->name('frontend.homepage');
    Route::get('/about-us', [Frontend::class, 'aboutUs'])->name('frontend.about.aboutUs');
    Route::get('/contact-us', [Frontend::class, 'contactUs'])->name('frontend.contactUs');
    Route::get('/services', [Frontend::class, 'services'])->name('frontend.services');
    Route::get('/gallery', [Frontend::class, 'gallery'])->name('frontend.gallery');
    Route::get('/landscapes', [Frontend::class, 'landscapes'])->name('frontend.landscapes');
    Route::get('/machinery-hire', [Frontend::class, 'machineryHire'])->name('frontend.machinery-hire');

    Route::get('/product-categories', [FrontendProducts::class, 'index'])->name('frontend.products.index');
    Route::get('/product-categories/{slug}', [FrontendProducts::class, 'index'])->name('frontend.products.indexWithCategory');
    Route::get('/product/{slug}', [FrontendProducts::class, 'view'])->name('frontend.products.view');
    Route::post('/product/get-pricing-details', [FrontendProducts::class, 'getPricingDetails'])->name('frontend.products.getPricingDetails');

    Route::post('/contact/send-message', [Frontend::class, 'sendMessage'])->name('frontend.contacts.sendMessage');
    Route::post('/app-logout', [Frontend::class, 'appLogout'])->name('frontend.auth.appLogout');


});


Route::middleware('auth')->group(function () {

    //2 - Admin Routes
    Route::group([ 'prefix' =>'admin'], function () {

        // D
        Route::get('/', [BackendDashboard::class, 'index'])->name('backend.dashboard');

        // L
        Route::get('/landscapes', [BackendLandscapes::class, 'index'])->name('backend.landscapes.index');
        Route::get('/landscapes/create', [BackendLandscapes::class, 'create'])->name('backend.landscapes.create');
        Route::get('/landscapes/edit/{slug}', [BackendLandscapes::class, 'edit'])->name('backend.landscapes.edit');
        Route::post('/landscapes/store', [BackendLandscapes::class, 'store'])->name('backend.landscapes.store');
        Route::post('/landscapes/delete', [BackendLandscapes::class, 'delete'])->name('backend.landscapes.delete');
        Route::post('/landscapes/upload-image', [BackendLandscapes::class, 'imageUpload'])->name('backend.landscapes.imageUpload');
        Route::post('/landscapes/status', [BackendLandscapes::class, 'status'])->name('backend.landscapes.status');

        // M
        Route::get('/machinery-hires', [BackendMachineryHires::class, 'index'])->name('backend.machineryHires.index');
        Route::post('/machinery-hires/store', [BackendMachineryHires::class, 'store'])->name('backend.machineryHires.store');

        Route::get('/machineries', [BackendMachineries::class, 'index'])->name('backend.machineries.index');
        Route::get('/machineries/create', [BackendMachineries::class, 'create'])->name('backend.machineries.create');
        Route::get('/machineries/edit/{slug}', [BackendMachineries::class, 'edit'])->name('backend.machineries.edit');
        Route::post('/machineries/store', [BackendMachineries::class, 'store'])->name('backend.machineries.store');
        Route::post('/machineries/delete', [BackendMachineries::class, 'delete'])->name('backend.machineries.delete');
        Route::post('/machineries/slug-generator', [BackendMachineries::class, 'slugGenerator'])->name('backend.machineries.slugGenerator');
        Route::post('/machineries/upload-image', [BackendMachineries::class, 'imageUpload'])->name('backend.machineries.imageUpload');
        Route::post('/machineries/set-primary-image', [BackendMachineries::class, 'setPrimaryImage'])->name('backend.machineries.setPrimaryImage');
        Route::post('/machineries/image-delete', [BackendMachineries::class, 'deleteImage'])->name('backend.machineries.deleteImage');
        Route::post('/machineries/status', [BackendMachineries::class, 'status'])->name('backend.machineries.status');
        Route::post('/machineries/get-details-for-price', [BackendMachineries::class, 'getDetailsForPriceRow'])->name('backend.machineries.getDetailsForPriceRow');


        Route::get('/machinery-categories', [BackendMachineryCategories::class, 'index'])->name('backend.machineryCategories.index');
        Route::post('/machinery-categories/store', [BackendMachineryCategories::class, 'store'])->name('backend.machineryCategories.store');
        Route::post('/machinery-categories/get', [BackendMachineryCategories::class, 'get'])->name('backend.machineryCategories.get');
        Route::post('/machinery-categories/status', [BackendMachineryCategories::class, 'status'])->name('backend.machineryCategories.status');
        Route::post('/machinery-categories/slug-generator', [BackendMachineryCategories::class, 'slugGenerator'])->name('backend.machineryCategories.slugGenerator');

        // P
        Route::get('/products', [BackendProducts::class, 'index'])->name('backend.products.index');
        Route::get('/products/create', [BackendProducts::class, 'create'])->name('backend.products.create');
        Route::get('/products/edit/{slug}', [BackendProducts::class, 'edit'])->name('backend.products.edit');
        Route::post('/products/store', [BackendProducts::class, 'store'])->name('backend.products.store');
        Route::post('/products/delete', [BackendProducts::class, 'delete'])->name('backend.products.delete');
        Route::post('/products/slug-generator', [BackendProducts::class, 'slugGenerator'])->name('backend.products.slugGenerator');
        Route::post('/products/upload-image', [BackendProducts::class, 'imageUpload'])->name('backend.products.imageUpload');
        Route::post('/products/set-primary-image', [BackendProducts::class, 'setPrimaryImage'])->name('backend.products.setPrimaryImage');
        Route::post('/products/image-delete', [BackendProducts::class, 'deleteImage'])->name('backend.products.deleteImage');
        Route::post('/products/status', [BackendProducts::class, 'status'])->name('backend.products.status');
        Route::post('/products/get-details-for-price', [BackendProducts::class, 'getDetailsForPriceRow'])->name('backend.products.getDetailsForPriceRow');

        Route::get('/labels', [BackendProductLabels::class, 'index'])->name('backend.labels.index');
        Route::post('/labels/store', [BackendProductLabels::class, 'store'])->name('backend.labels.store');
        Route::post('/labels/get', [BackendProductLabels::class, 'get'])->name('backend.labels.get');
        Route::post('/labels/status', [BackendProductLabels::class, 'status'])->name('backend.labels.status');
        Route::post('/labels/slug-generator', [BackendProductLabels::class, 'slugGenerator'])->name('backend.labels.slugGenerator');

        Route::get('/thicknesses', [BackendProductThicknesses::class, 'index'])->name('backend.thicknesses.index');
        Route::post('/thicknesses/store', [BackendProductThicknesses::class, 'store'])->name('backend.thicknesses.store');
        Route::post('/thicknesses/get', [BackendProductThicknesses::class, 'get'])->name('backend.thicknesses.get');
        Route::post('/thicknesses/status', [BackendProductThicknesses::class, 'status'])->name('backend.thicknesses.status');
        Route::post('/thicknesses/slug-generator', [BackendProductThicknesses::class, 'slugGenerator'])->name('backend.thicknesses.slugGenerator');


        Route::get('/product-categories', [BackendProductCategories::class, 'index'])->name('backend.productCategories.index');
        Route::post('/product-categories/store', [BackendProductCategories::class, 'store'])->name('backend.productCategories.store');
        Route::post('/product-categories/get', [BackendProductCategories::class, 'get'])->name('backend.productCategories.get');
        Route::post('/product-categories/status', [BackendProductCategories::class, 'status'])->name('backend.productCategories.status');
        Route::post('/product-categories/slug-generator', [BackendProductCategories::class, 'slugGenerator'])->name('backend.productCategories.slugGenerator');

    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
