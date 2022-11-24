<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\TravelPackageController;
use App\Http\Controllers\CheckoutContoroller;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
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

// Versi Tutorial Laravel 6

// Route::get('/', 'HomeController@index')->name('home');
// Route::get('/detail', 'DetailController@index')->name('detail');
// Route::get('/checkout', 'CheckoutController@index')->name('checkout');
// Route::get('/checkout/success', 'CheckoutController@index')->name('checkout');

// Route::prefix('admin')
//     ->namespace('Admin')
//     ->group(function() {
//         Route::get('/', 'DashboardController@index')
//             ->name('dashboard');
//     });


// Versi sendiri Laravel 8

// kasih group middileware, buat route yang harus login dan terverifikasi emailnya
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
});

Route::get('/detail', [DetailController::class, 'index'])->name('detail');
Route::get('/checkout', [CheckoutContoroller::class, 'index'])->name('checkout');
Route::get('/checkout/success', [CheckoutContoroller::class, 'success'])->name('checkout-success');

Route::prefix('admin')->group(function() {
    Route::get('/', [DashboardController::class, 'index'])
        ->middleware(['auth', 'admin'])
        ->name('dashboard');
        
    Route::resource('travel-package', TravelPackageController::class);
    Route::resource('gallery', GalleryController::class);
});


// ini merah, karena gw pake laravel/ui dan ui vue-nya si laravel, ngga tau kenapa merah, tapi masih bisa jalan. bingung gw 
Auth::routes(['verify' => true]);
