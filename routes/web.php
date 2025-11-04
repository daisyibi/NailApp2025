<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AppointmentController;

// Welcome page
Route::get('/', function () {
    return view('welcome');
});

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authenticated routes
Route::middleware('auth')->group(function () {

    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Clients routes (CRUD)
    Route::prefix('clients')->name('clients.')->group(function () {
        Route::get('/', [ClientController::class, 'index'])->name('index');             // List all clients
        Route::get('/create', [ClientController::class, 'create'])->name('create');     // Create form
        Route::post('/', [ClientController::class, 'store'])->name('store');            // Store new client
        Route::get('/{client}', [ClientController::class, 'show'])->name('show');       // Show client
        Route::get('/{client}/edit', [ClientController::class, 'edit'])->name('edit');  // Edit form
        Route::put('/{client}', [ClientController::class, 'update'])->name('update');   // Update client
        Route::delete('/{client}', [ClientController::class, 'destroy'])->name('destroy'); // Delete client

        // Client-specific appointments (store only)
        Route::post('/{client}/appointments', [AppointmentController::class, 'store'])
             ->name('appointments.store');
        Route::get('/{client}/appointments/create', [AppointmentController::class, 'create'])
             ->name('appointments.create'); // Form for creating appointment for this client
    });

    // Appointments routes (admin only checks inside controller/Blade)
    Route::resource('appointments', AppointmentController::class)
         ->only(['index', 'show', 'edit', 'update', 'destroy']);
});

require __DIR__ . '/auth.php';



