<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['prefix' => 'brands'], function () {
    Route::get('/', [BrandController::class, 'index'])->name('brands.index');
    Route::get('/create', [BrandController::class, 'create'])->name('brands.create');
    Route::post('/', [BrandController::class, 'store'])->name('brands.store');
    Route::get('/{brand}', [BrandController::class, 'show'])->name('brands.show');
    Route::get('/{brand}/edit', [BrandController::class, 'edit'])->name('brands.edit');
    Route::put('/{brand}', [BrandController::class, 'update'])->name('brands.update');
    Route::delete('/{brand}', [BrandController::class, 'destroy'])->name('brands.destroy');
});

Route::get('/categories', function () {
    return view('categories.index');
})->name('categories.index');
require __DIR__ . '/auth.php';
