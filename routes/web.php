<?php

use App\Http\Controllers\Admin\CategoryController;
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

// Route::group([
//     'prefix' => 'admin/categories',
//     'as' => 'admin.categories.'

// ], function () {
//     Route::get('/', [CategoryController::class, 'index'])->name('index');
//     Route::get('/create', [CategoryController::class, 'create'])->name('create');
//     Route::post('/create', [CategoryController::class, 'store'])->name('store');
//     Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('edit');
//     Route::put('/{id}', [CategoryController::class, 'update'])->name('update');
//     Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('destroy');
// });

Route::prefix('admin/categories')->as('admin.categories.')->group(function(){
    Route::get('/', [CategoryController::class, 'index'])->name('index');
    Route::get('/create', [CategoryController::class, 'create'])->name('create');
    Route::post('/create', [CategoryController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('edit');
    Route::put('/{id}', [CategoryController::class, 'update'])->name('update');
    Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('destroy');





    
});

// Route::resource('admin/categories', CategoryController::class);
