<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/',[PagesController::class, 'home'])->name('home');

Route::get('/about', [PagesController::class, 'about'])->name('about');

Route::get('/contact', [PagesController::class, 'contact'])->name('contact');

Route::get('/categoryproducts/{catid}', [PagesController::class, 'categoryproducts'])->name('categoryproducts');

Route::get('/viewproduct/{id}', [PagesController::class, 'viewproduct'])->name('viewproduct');

Route::middleware('auth')->group(function(){
    Route::post('/cart/store', [CartController::class, 'store'])->name('cart.store');

});

Route::middleware(['auth','isadmin'])->group(function () {
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories/store', [CategoryController::class, 'store'])->name('categories.store');
Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::post('/categories/{id}/update', [CategoryController::class, 'update'])->name('categories.update');
Route::get('/categories/{id}/destroy', [CategoryController::class, 'destroy'])->name('categories.destroy');

//Product routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::post('/products/{id}/update', [ProductController::class, 'update'])->name('products.update');
Route::get('/products/{id}/destroy', [ProductController::class, 'destroy'])->name('products.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
