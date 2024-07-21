<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\HomeController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::any('/logout', function(){
    Auth::logout();
    return redirect()->route('home');
});


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');


    Route::prefix('category')->group(function(){
        Route::get('/', [CategoryController::class, 'index'])->name('admin.category');
        Route::post('/create', [CategoryController::class, 'create'])->name('admin.create.category');
        Route::post('/update', [CategoryController::class, 'update'])->name('admin.update.category');
        Route::get('/delete/{id}', [CategoryController::class, 'delete'])->name('admin.delete.category');
        Route::get('/search', [CategoryController::class, 'search'])->name('admin.search.category');
    });



    Route::prefix('product')->group(function(){
        Route::get('/', [ProductController::class, 'index'])->name('admin.product');
        Route::post('/create', [ProductController::class, 'create'])->name('admin.create.product');
        Route::get('/search', [ProductController::class, 'search'])->name('admin.search.products');
        Route::get('/edit/{product_id}', [ProductController::class, 'update'])->name('admin.update.product');

        Route::prefix('images')->group(function(){
            Route::get('delete/{id}', [ProductController::class, 'deleteImage'])->name('admin.delete.product.image');

            // Route::get('/update/{product_id}', [ProductController::class, 'update'])->name('admin.update.product');

        });
    });



});
