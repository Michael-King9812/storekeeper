<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

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


Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard', [
            'page' => 'dashboard'
        ]);
    })->name('dashboard');

    Route::controller(ItemController::class)->prefix('/items')->name('items.')->group(function() {
        Route::get('', 'index')->name('all');
        Route::post('/store', 'store')->name('store')->middleware('has.privilege:canAddItem');
        Route::post('/delete', 'destroy')->name('delete')->middleware('has.privilege:canRemoveItem');
        Route::put('/update', 'update')->name('update')->middleware('has.privilege:canAddItem');
    });

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
