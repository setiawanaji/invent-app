<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthAdminMiddleware;
use App\Http\Middleware\AuthMiddleware;
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

Route::get('/login', [AuthController::class, "login"])->name('login');
Route::post('/login', [AuthController::class, "auth"])->name('login.auth');
Route::get('/logout', [AuthController::class, "logout"])->name('logout');

Route::middleware([AuthMiddleware::class])->group(function () {
    Route::get('/', [ProfileController::class, "index"])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, "edit"])->name('profile.edit');
    Route::post('/profile/edit', [ProfileController::class, "update"])->name('profile.update');

    // Supplier
    Route::get('/supplier', [SupplierController::class, "list"])->name('supplier.list');
    Route::get('/supplier/insert', [SupplierController::class, "insert"])->name('supplier.insert');
    Route::post('/supplier/insert', [SupplierController::class, "store"])->name('supplier.store');
    Route::get('/supplier/edit/{id}', [SupplierController::class, "edit"])->name('supplier.edit');
    Route::post('/supplier/edit/{id}', [SupplierController::class, "update"])->name('supplier.update');
    Route::get('/supplier/destroy/{id}', [SupplierController::class, "destroy"])->name('supplier.destroy');

    // Product
    Route::get('/product', [ProductController::class, "list"])->name('product.list');
    Route::get('/product/insert', [ProductController::class, "insert"])->name('product.insert');
    Route::post('/product/insert', [ProductController::class, "store"])->name('product.store');
    Route::get('/product/edit/{id}', [ProductController::class, "edit"])->name('product.edit');
    Route::post('/product/edit/{id}', [ProductController::class, "update"])->name('product.update');
    Route::get('/product/destroy/{id}', [ProductController::class, "destroy"])->name('product.destroy');

    Route::middleware([AuthAdminMiddleware::class])->group(function () {
        // User
        Route::get('/user', [UserController::class, "list"])->name('user.list');
        Route::get('/user/insert', [UserController::class, "insert"])->name('user.insert');
        Route::post('/user/insert', [UserController::class, "store"])->name('user.store');
        Route::get('/user/edit/{id}', [UserController::class, "edit"])->name('user.edit');
        Route::post('/user/edit/{id}', [UserController::class, "update"])->name('user.update');
        Route::get('/user/destroy/{id}', [UserController::class, "destroy"])->name('user.destroy');
    });

    Route::get('/stock', [StockController::class, "list"])->name('stock.list');
    Route::get('/stock/in', [StockController::class, "stock_in"])->name('stock.in');
    Route::post('/stock/in', [StockController::class, "stock_in_store"])->name('stock.in.store');
    Route::get('/stock/out', [StockController::class, "stock_out"])->name('stock.out');
    Route::post('/stock/out', [StockController::class, "stock_out_store"])->name('stock.out.store');
    Route::get('/stock/opname', [StockController::class, "stock_opname"])->name('stock.opname');
    Route::post('/stock/opname', [StockController::class, "stock_opname_store"])->name('stock.opname.store');
});
Route::get('/linkstorage', function () {
    $exitCode = Artisan::call('storage:link', []);
    echo $exitCode;
});
