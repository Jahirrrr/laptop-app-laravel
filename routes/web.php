<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\LaptopController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;


//  jika user belum login
Route::group(['middleware' => 'guest'], function() {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'dologin']);

});

// untuk superadmin dan pegawai
Route::group(['middleware' => ['auth', 'checkrole:1,2']], function() {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/redirect', [RedirectController::class, 'cek']);
});


// untuk superadmin
Route::group(['middleware' => ['auth', 'checkrole:1']], function() {
    Route::get('/superadmin', [SuperadminController::class, 'index'])->name('superadmin.index');
    Route::get('/superadmin/create', [SuperadminController::class, 'create'])->name('superadmin.create');
    Route::post('/superadmin', [SuperadminController::class, 'store'])->name('superadmin.store');
    Route::get('/superadmin/{id}', [SuperadminController::class, 'show'])->name('superadmin.show');
    Route::get('/superadmin/{id}/edit', [SuperadminController::class, 'edit'])->name('superadmin.edit');
    Route::put('/superadmin/{id}', [SuperadminController::class, 'update'])->name('superadmin.update');
    Route::delete('/superadmin/{id}', [SuperadminController::class, 'destroy'])->name('superadmin.destroy');
});

// untuk pegawai
Route::group(['middleware' => ['auth', 'checkrole:2']], function() {
    Route::get('/products', [ProductController::class, 'index'])->name('product.index');
    Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::get('/cart/add', [CartController::class, 'store'])->name('cart.store');
    Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::get('/cart/confirmation', [CartController::class, 'confirmation'])->name('cart.confirmation');
    Route::delete('/cart/delete/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
    


});
