<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MaterielController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InterventionController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/logs/log', [LogController::class, 'viewLogs'])->name('logs');
    Route::resource('user', UserController::class);
    Route::get('/materiels/create', [MaterielController::class, 'create'])->name('materiels.create');
    Route::post('/materiels/save', [MaterielController::class, 'save'])->name('materiels.save');
    Route::get('/materiels/edit/{id}', [MaterielController::class, 'edit'])->name('materiels.edit');
    Route::put('/materiels/edit/{id}', [MaterielController::class, 'update'])->name('materiels.update');
    Route::delete('/materiels/delete/{id}', [MaterielController::class, 'delete'])->name('materiels.delete');
});
Route::middleware(['auth', 'adminOrTechnician'])->group(function () {
    Route::get('materiels/{material}/interventions/create', [InterventionController::class, 'create'])->name('materiels.interventions.create');
    Route::post('materiels/{material}/interventions', [InterventionController::class, 'store'])->name('materiels.interventions.store');
    Route::get('materiels/interventions/edit/{id}', [InterventionController::class, 'edit'])->name('materiels.interventions.edit');
    Route::put('materiels/interventions/edit/{id}', [InterventionController::class, 'update'])->name('materiels.interventions.update');
    Route::delete('/materiels/interventions/delete/{id}', [InterventionController::class, 'delete'])->name('materiels.interventions.delete');
});

Route::get('/materels/{material}/interventions', [InterventionController::class, 'showMaterialInterventions'])->name('materiels.interventions');
Route::get('/materiels', [MaterielController::class, 'index'])->name('materiels');
Route::get('/materiels/view/{id}', [MaterielController::class, 'view'])->name('materiels.view');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

// routes/web.php

Route::get('/help', function () {
    return view('admin.help');
})->name('admin.help');


require __DIR__ . '/auth.php';
