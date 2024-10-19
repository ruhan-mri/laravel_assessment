<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AddressController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/create', [HomeController::class, 'create'])->name('create');
    Route::post('/home', [HomeController::class, 'store'])->name('store');
    Route::get('/{id}/show', [HomeController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [HomeController::class, 'edit'])->name('edit');
    Route::put('/{id}/update', [HomeController::class, 'update'])->name('update');
    Route::delete('/{id}/softDelete', [HomeController::class, 'softDelete'])->name('softDelete');
    Route::get('/trash', [HomeController::class, 'trash'])->name('trash');
    Route::post('/{id}/restore', [HomeController::class, 'restore'])->name('restore');
    Route::delete('/{id}/force_delete', [HomeController::class, 'force_delete'])->name('force_delete');
});


Route::middleware('auth')->group(function () {
    Route::get('/{id}/address/create', [HomeController::class, 'addressCreate'])->name('address.create');
    Route::post('/{id}/show', [HomeController::class, 'addressStore'])->name('address.store');
});

Route::middleware('auth')->group(function () {
    Route::get('users/{user}/addresses', [AddressController::class, 'index'])->name('addresses.index');
    Route::get('addresses/{address}/edit', [AddressController::class, 'edit'])->name('addresses.edit');
    Route::put('addresses/{address}', [AddressController::class, 'update'])->name('addresses.update');
    Route::delete('addresses/{address}', [AddressController::class, 'destroy'])->name('addresses.destroy');
    Route::get('users/{user}/addresses/trash', [AddressController::class, 'trashedAddresses'])
        ->name('addresses.trash');
    Route::post('addresses/{address}/restore', [AddressController::class, 'restoreAddress'])
        ->name('address.restore');
    Route::delete('addresses/{address}/force-delete', [AddressController::class, 'forceDeleteAddress'])
        ->name('address.force_delete');
});
