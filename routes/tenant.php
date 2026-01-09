<?php

declare(strict_types=1);

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Tenant\AuthController;
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
    

   
Route::get('/index', function () {
    return view('tenant.index');
});
});

use App\Http\Controllers\Tenant\ProductController;

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
    'auth',
]);

Route::prefix('tenant1')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('tenant1.login');
    Route::post('/login', [AuthController::class, 'login'])->name('tenant1.login.post');

    Route::get('/register', [AuthController::class, 'register'])->name('tenant1.register');
    Route::post('/register', [AuthController::class, 'register'])->name('tenant1.register.post');

    Route::post('/logout', [AuthController::class, 'logout'])->name('tenant1.logout');
});




  

   



