<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

// Welcome page
Route::get('/', function () {
    return view('welcome');
});

// Dashboard route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authenticated user routes
Route::middleware('auth')->group(function () {

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Client routes (CRUD)
    Route::prefix('clients')->name('clients.')->group(function () {
        Route::get('/', [ClientController::class, 'index'])->name('index');          // List all clients
        Route::get('/create', [ClientController::class, 'create'])->name('create');   // Show create form
        Route::post('/', [ClientController::class, 'store'])->name('store');          // Store new client
        Route::get('/{client}', [ClientController::class, 'show'])->name('show');     // Show single client
        Route::get('/{client}/edit', [ClientController::class, 'edit'])->name('edit'); // Show edit form
        Route::put('/{client}', [ClientController::class, 'update'])->name('update'); // Update client
        Route::delete('/{client}', [ClientController::class, 'destroy'])->name('destroy'); // Delete client
    });

});

require __DIR__.'/auth.php';
