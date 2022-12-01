<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\TravelPackageController;
use App\Http\Controllers\CheckoutContoroller;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\TransactionController;
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
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'verified']], function () {

    // untuk memproses data dari checkout, ketika klik join now. untuk data ini masuk ke checkout index dan user mendapatkan id transaction
    Route::post('/checkout/{id}', [CheckoutContoroller::class, 'process'])->name('checkout-process');

    // id transaction, get untuk mengambil data id
    Route::get('/checkout/{id}', [CheckoutContoroller::class, 'index'])->name('checkout');

    // menambahkan orang di detail checkout
    Route::post('/checkout/create/{detail_id}', [CheckoutContoroller::class, 'create'])->name('checkout-create');

    // menghapus orang di detail checkout
    Route::get('/checkout/remove/{detail_id}', [CheckoutContoroller::class, 'remove'])->name('checkout-remove');

    // mengganti status menjadi sukses
    Route::get('/checkout/confirm/{id}', [CheckoutContoroller::class, 'success'])->name('checkout-success');
});


Route::get('/detail/{slug}', [DetailController::class, 'index'])->name('detail');
Route::prefix('admin')->group(function() {
    
    Route::get('/', [DashboardController::class, 'index'])
        ->middleware(['auth', 'admin'])
        ->name('dashboard');
        
    Route::resource('travel-package', TravelPackageController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('transaction', TransactionController::class);
});


// ini merah, karena gw pake laravel/ui dan ui vue-nya si laravel, ngga tau kenapa merah, tapi masih bisa jalan. bingung gw 
Auth::routes(['verify' => true]);
