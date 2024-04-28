<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobBoardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('/dashboard', [JobBoardController::class, 'index'])->name('dashboard.index');
    Route::get('/dashboard/create', [JobBoardController::class, 'create'])->name('dashboard.create');
    Route::post('/dashboard', [JobBoardController::class, 'store'])->name('dashboard.store');
    Route::get('/dashboard/{jobBoard}', [JobBoardController::class, 'show'])->name('dashboard.show');
    Route::get('/dashboard/{jobBoard}/edit', [JobBoardController::class, 'edit'])->name('dashboard.edit');
    Route::put('/dashboard/{jobBoard}', [JobBoardController::class, 'update'])->name('dashboard.update');
    Route::delete('/dashboard/{jobBoard}', [JobBoardController::class, 'destroy'])->name('dashboard.destroy');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/home/{jobBoard}', [HomeController::class, 'show'])->name('home.show');
});

Route::redirect('/', '/home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
