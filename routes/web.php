<?php

use App\Enums\RolesEnum;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
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

Route::group(['middleware' => 'auth', 'prefix' => 'products'], function () {
    Route::get('/', [ProductController::class, 'index'])->name('products.index');

    Route::group(['middleware' => 'role:' . RolesEnum::ADMIN->value], function () {
        Route::get('/create', [ProductController::class, 'create'])->name('products.create');
        Route::get('/{product}', [ProductController::class, 'edit'])->name('products.edit');
        Route::get('/{product}/activities', [ProductController::class, 'activities'])->name('products.activities');

        Route::post('/', [ProductController::class, 'store'])->name('products.store');
        Route::put('/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    });
});


Route::get('login', [AuthController::class, 'login'])->name('login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
