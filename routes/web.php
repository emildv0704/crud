<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;


Route::get('/', function () {
    return view('dashboard.pages.index');
});

Route::group(['prefix' => 'products'], function () {
    Route::get('/', [ProductController::class, 'viewIndex'])->name('products.viewIndex');
    Route::get('/create', [ProductController::class, 'viewCreate'])->name('products.viewCreate');
    Route::get('/edit/{product}', [ProductController::class, 'viewEdit'])->name('products.viewEdit');

    Route::post('/create_product', [ProductController::class, 'create'])->name('products.create_product');
    Route::put('/update/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/delete/{product}', [ProductController::class, 'delete'])->name('products.delete');
});


Route::group(['prefix' => 'categories'], function () {
    Route::get('/', [CategoryController::class, 'viewIndex'])->name('categories.viewIndex');
    Route::get('/create', [CategoryController::class, 'viewCreate'])->name('categories.viewCreate');
    Route::get('/edit/{category}', [CategoryController::class, 'viewEdit'])->name('categories.viewEdit');

    Route::post('/create_category', [CategoryController::class, 'create'])->name('categories.create_category');
    Route::put('/update/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/delete/{category}', [CategoryController::class, 'delete'])->name('categories.delete');
});





