<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemTypeController;
use App\Http\Controllers\BarStockController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\StoreStockController;
use App\Http\Controllers\StockPurchaseController;
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
    return view('auth.login');
});

Auth::routes();

Route::middleware(['manager'])->group(function() {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

    // Items Routing
    Route::controller(ItemTypeController::class)->prefix('/item_type')->group(function() {
        Route::get('/manage', 'index')->name('itemType.manage');
        Route::get('/edit/{id}', 'edit')->name('itemType.edit');
        Route::get('/delete/{id}', 'destroy')->name('itemType.delete');
        Route::post('/store', 'store')->name('itemType.store');
        Route::put('/update/{id}', 'update')->name('itemType.update');
    });
    Route::controller(ItemController::class)->prefix('/items')->group(function() {
        Route::get('/manage', 'index')->name('item.manage');
        Route::get('/edit/{id}', 'edit')->name('item.edit');
        Route::post('/store', 'store')->name('item.store');
        Route::get('/delete/{id}', 'destroy')->name('item.delete');
        Route::put('/update/{id}', 'update')->name('item.update');
    });
    Route::controller(StoreStockController::class)->prefix('/stocks')->group(function() {
        Route::get('/manage', 'index')->name('stock.manage');
        Route::get('/edit/{id}', 'edit')->name('stock.edit');
        Route::post('/store', 'store')->name('stock.store');
        Route::get('/delete/{id}', 'destroy')->name('stock.delete');
        Route::put('/update/{id}', 'update')->name('stock.update');
    });
    Route::controller(StockPurchaseController::class)->prefix('/stock/purchase')->group(function() {
        Route::get('/manage', 'index')->name('stockPurchase.manage');
        Route::get('/edit/{id}', 'edit')->name('stockPurchase.edit');
        Route::post('/store', 'store')->name('stockPurchase.store');
        Route::get('/delete/{id}', 'destroy')->name('stockPurchase.delete');
        Route::put('/update/{id}', 'update')->name('stockPurchase.update');
    });    
    Route::controller(BarStockController::class)->prefix('/bar/stocks')->group(function() {
        Route::get('/manage', 'index')->name('barStock.manage');
        Route::post('/store', 'store')->name('barStock.store');
        Route::get('/delete/{id}', 'destroy')->name('barStock.delete');
    });
    
    
});

