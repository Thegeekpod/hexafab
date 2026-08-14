<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ResourceController;
use App\Http\Controllers\Admin\PartnerApplicationController;
use App\Http\Controllers\Admin\ContactMessageController;

// Public facing routes
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/about', [PublicController::class, 'about'])->name('about');
Route::get('/products', [PublicController::class, 'products'])->name('products');
Route::get('/products/{slug}', [PublicController::class, 'productDetail'])->name('products.detail');
Route::get('/projects', [PublicController::class, 'projects'])->name('projects');
Route::get('/resources', [PublicController::class, 'resources'])->name('resources');
Route::get('/contact', [PublicController::class, 'contact'])->name('contact');
Route::post('/contact', [PublicController::class, 'submitContact'])->name('contact.submit');
Route::get('/store-locator', [PublicController::class, 'storeLocator'])->name('store-locator');
Route::get('/become-a-partner', [PublicController::class, 'becomePartner'])->name('become-a-partner');
Route::post('/become-a-partner', [PublicController::class, 'submitBecomePartner'])->name('become-a-partner.submit');
Route::get('/ims-policy', [PublicController::class, 'imsPolicy'])->name('ims-policy');
Route::get('/privacy-policy', [PublicController::class, 'privacyPolicy'])->name('privacy-policy');
Route::get('/blog-details', [PublicController::class, 'blogDetails'])->name('blog-details');

// Admin panel routes
Route::prefix('admin')->name('admin.')->group(function () {
    // Guest auth routes
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminController::class, 'login'])->name('login.submit');

    // Authenticated admin routes
    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

        // CRUD resources
        Route::resource('products', ProductController::class);
        Route::resource('projects', ProjectController::class);
        Route::resource('resources', ResourceController::class);
        Route::resource('partners', PartnerApplicationController::class);
        Route::resource('contacts', ContactMessageController::class);
    });
});
