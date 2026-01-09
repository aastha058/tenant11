<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Tenant\ProductController;
use Illuminate\Support\Facades\Route;


Route::group(['domain'=>config('tenancy.central_domains.0')], function () {
  

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
     Route::get('/products', [ProductController::class, 'index'])
        ->name('tenant.products.index');

    Route::get('/products/create', [ProductController::class, 'create'])
        ->name('tenant.products.create');

    Route::post('/products', [ProductController::class, 'store'])
        ->name('tenant.products.store');
});

require __DIR__.'/auth.php';
});
