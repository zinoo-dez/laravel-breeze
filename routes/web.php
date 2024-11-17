<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\CategoryCrud;
use Illuminate\Support\Facades\Route;
use App\Livewire\ProductCrud;
use App\Livewire\BrandCrud;
use App\Livewire\NewsCrud;

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

Route::get('/categories', CategoryCrud::class)->name('categories');
Route::get('/brands', BrandCrud::class)->name('brands');
Route::get('/products', ProductCrud::class)->name('products');
Route::get('/news', NewsCrud::class)->name('news');
require __DIR__ . '/auth.php';
