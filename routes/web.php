<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemTypeController;
use App\Http\Controllers\BarStockController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\StoreStockController;
use App\Http\Controllers\StockPurchaseController;
use App\Http\Controllers\RequisitionController;
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
    Route::controller(ItemTypeController::class)->prefix('/item_type')->name('itemType.')->group(function() {
        Route::get('/manage', 'index')->name('manage');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::get('/delete/{id}', 'destroy')->name('delete');
        Route::post('/store', 'store')->name('store');
        Route::put('/update/{id}', 'update')->name('update');
    });
    Route::controller(ItemController::class)->prefix('/items')->name('item.')->group(function() {
        Route::get('/manage', 'index')->name('manage');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/store', 'store')->name('store');
        Route::get('/delete/{id}', 'destroy')->name('delete');
        Route::put('/update/{id}', 'update')->name('update');
    });
    Route::controller(StoreStockController::class)->prefix('/stocks')->name('stock.')->group(function() {
        Route::get('/manage', 'index')->name('manage');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/store', 'store')->name('store');
        Route::get('/delete/{id}', 'destroy')->name('delete');
        Route::put('/update/{id}', 'update')->name('update');
    });
    Route::controller(StockPurchaseController::class)->prefix('/stock/purchase')->name('stockPurchase.')->group(function() {
        Route::get('/manage', 'index')->name('manage');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/store', 'store')->name('store');
        Route::get('/delete/{id}', 'destroy')->name('delete');
        Route::put('/update/{id}', 'update')->name('update');
    });    
    Route::controller(BarStockController::class)->prefix('/bar/stocks')->name('barStock.')->group(function() {
        Route::get('/manage', 'index')->name('manage');
        Route::post('/store', 'store')->name('store');
        Route::get('/delete/{id}', 'destroy')->name('delete');
    });
    Route::controller(RequisitionController::class)->prefix('/requisition')->name('requisition.')->group(function() {
        Route::get('/manage', 'index')->name('manage');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/store', 'store')->name('store');
        Route::get('/delete/{id}', 'destroy')->name('delete');
        Route::put('/update/{id}', 'update')->name('update');
    });  
    
    
});

