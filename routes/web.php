<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AppointmentController;

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Authenticated routes
Route::middleware('auth')->group(function () {

    // Clients CRUD
    Route::prefix('clients')->name('clients.')->group(function () {
        Route::get('/', [ClientController::class, 'index'])->name('index');           // List all clients
        Route::get('/create', [ClientController::class, 'create'])->name('create');   // Create client
        Route::post('/', [ClientController::class, 'store'])->name('store');          // Store client
        Route::get('/{client}', [ClientController::class, 'show'])->name('show');     // Show client
        Route::get('/{client}/edit', [ClientController::class, 'edit'])->name('edit'); 
        Route::put('/{client}', [ClientController::class, 'update'])->name('update');
        Route::delete('/{client}', [ClientController::class, 'destroy'])->name('destroy');

        // Client-specific appointments
        Route::get('/{client}/appointments/create', [AppointmentController::class, 'create'])
            ->name('appointments.create');  // Form to add appointment
        Route::post('/{client}/appointments', [AppointmentController::class, 'store'])
            ->name('appointments.store');
    });

    // Appointments CRUD (for admin)
    Route::resource('appointments', AppointmentController::class)
         ->only(['index', 'show', 'edit', 'update', 'destroy']);
});


require __DIR__ . '/auth.php';



