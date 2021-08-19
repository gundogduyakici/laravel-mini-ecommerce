<?php

use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Fortify;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Home\PagesController;
use App\Http\Controllers\Home\HomeProductController;
use App\Http\Controllers\Home\CategoryController as Category;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminPagesController;


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

// Home Route Functions
Route::get('/', [ HomeController::class, 'index' ])->name('home');

Route::resource('home_product', HomeProductController::class)->except([
    'show'
]);
Route::get('/product/{slug}/{id}', [ HomeProductController::class, 'show' ]);
Route::get('/category/{slug}/{id}', [ Category::class, 'category' ]);
Route::get('/404', [ HomeController::class, 'notFound' ]);
Route::get('/about-us', [ PagesController::class, 'about' ]);
Route::get('/contact', [ PagesController::class, 'contact' ]);
Route::post('/send-message', [ PagesController::class, 'sendMessage' ])->name('sendMessage');


// Admin Route Functions
Fortify::loginView(function () {
    return view('auth.login');
});

Fortify::registerView(function () {
    return view('auth.register');
});

Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [ DashboardController::class, 'index' ])->name('admin.dashboard');
    Route::get('/inbox', [ AdminPagesController::class, 'inbox' ])->name('admin.inbox');    
    Route::get('/pages/about-us', [ AdminPagesController::class, 'about' ])->name('admin.about');    
    Route::put('/pages/about-us/update/{id}', [ AdminPagesController::class, 'aboutUpdate' ])->name('about.update');
    Route::get('/pages/contact-information', [ AdminPagesController::class, 'contact' ])->name('admin.contact');
    Route::put('/pages/contact-information/update/{id}', [ AdminPagesController::class, 'contactUpdate' ])->name('contact.update');
    Route::resource('category', CategoryController::class);
    Route::resource('admin_product', AdminProductController::class);
    Route::delete('/admin_product/delete/{id}', [ AdminProductController::class, 'destroy' ])->name('admin_product.destroy');
    Route::delete('/category/delete/{id}', [ CategoryController::class, 'destroy' ])->name('category.destroy');
});