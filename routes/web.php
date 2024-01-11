<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PhotoController; 
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/photos/search', function () {
    return view('photos.search');
})->name('search');

Route::middleware('auth')->group(function () {
    //Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
   
    // Photo Routes
    Route::get('/photos', [PhotoController::class, 'index'])->name('photos.index');
    Route::get('/photos/search', [PhotoController::class, 'search'])->name('photos.search');
    Route::get('/photos/create',[PhotoController::class, 'create'])->name('photos.create');
    Route::post('/photos',[PhotoController::class, 'store'])->name('photos.store');
    Route::post('/photos/like', [PhotoController::class, 'like'])->name('photos.like');
    Route::get('/photos/show/{photo}', [PhotoController::class, 'show'])->name('photos.show');
    Route::get('/photos/{photo}', [PhotoController::class, 'list'])->name('photos.list');
    Route::get('/photos/{photo}/edit', [PhotoController::class, 'edit'])->name('photos.edit');
    Route::put('/photos/{photo}', [PhotoController::class, 'update'])->name('photos.update');
    Route::post('/photos/upload', [PhotoController::class, 'upload'])->name('photos.upload'); // 
    Route::delete('/photos/{photo}', [PhotoController::class, 'delete'])->name('photos.delete');
   
    // Category Routes
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    
    
});

require __DIR__.'/auth.php';