<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

//BACKEND CONTROLLERS
use App\Http\Controllers\Backend\DashboardController AS BackendDashboard;
use App\Http\Controllers\Backend\ProductsController AS BackendProducts;
use App\Http\Controllers\Backend\ProductLabelsController AS BackendProductLabels;
use App\Http\Controllers\Backend\ProductThicknessesController AS BackendProductThicknesses;

//FRONTEND CONTROLLERS
use App\Http\Controllers\Frontend\FrontendController AS Frontend;

//1 - Frontend Routes
Route::group([ 'prefix' =>'/'], function () {

    Route::get('/', [Frontend::class, 'index'])->name('frontend.homepage');
    Route::get('/about-us', [Frontend::class, 'aboutUs'])->name('frontend.about.aboutUs');
    Route::get('/contact-us', [Frontend::class, 'contactUs'])->name('frontend.contactUs');
    Route::get('/services', [Frontend::class, 'services'])->name('frontend.services');
    Route::get('/gallery', [Frontend::class, 'gallery'])->name('frontend.gallery');

    Route::post('/contact/send-message', [Frontend::class, 'sendMessage'])->name('frontend.contacts.sendMessage');
    Route::post('/app-logout', [Frontend::class, 'appLogout'])->name('frontend.auth.appLogout');


});


Route::middleware('auth')->group(function () {

    //2 - Admin Routes
    Route::group([ 'prefix' =>'admin'], function () {

        // D
        Route::get('/', [BackendDashboard::class, 'index'])->name('backend.dashboard');


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
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
