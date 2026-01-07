<?php

declare(strict_types=1);

use App\Http\Controllers\ProfileController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::get('/', function () {
        $user = User::get();
        dd($user->toArray());
        return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
    });
    

    Route::get('/login', function () {
        return 'This is the text for tenant ' . tenant('id');
    });
});

use App\Http\Controllers\Tenant\ProductController;

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
    'auth',
]);

    Route::get('/products', [ProductController::class, 'index'])
        ->name('tenant.products.index');

    Route::get('/products/create', [ProductController::class, 'create'])
        ->name('tenant.products.create');

    Route::post('/products', [ProductController::class, 'store'])
        ->name('tenant.products.store');



