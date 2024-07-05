<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MaterielController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/materiels', [MaterielController::class, 'index'])->name('materiels');
    Route::get('/materiels/create', [MaterielController::class, 'create'])->name('materiels.create');
    Route::post('/materiels/save', [MaterielController::class, 'save'])->name('materiels.save');
    Route::get('/materiels/edit/{id}', [MaterielController::class, 'edit'])->name('materiels.edit');
    Route::put('/materiels/edit/{id}', [MaterielController::class, 'update'])->name('materiels.update');
    Route::get('/materiels/view/{id}', [MaterielController::class, 'view'])->name('materiels.view');
    Route::resource('user', UserController::class);
});


// Route::get('/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
