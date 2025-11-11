<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\NailTechController;

// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Authenticated routes
Route::middleware('auth')->group(function () {

    /**
     * Clients CRUD + client-specific appointments
     */
    Route::prefix('clients')->name('clients.')->group(function () {
        Route::get('/', [ClientController::class, 'index'])->name('index');           
        Route::get('/create', [ClientController::class, 'create'])->name('create');   
        Route::post('/', [ClientController::class, 'store'])->name('store');          
        Route::get('/{client}', [ClientController::class, 'show'])->name('show');     
        Route::get('/{client}/edit', [ClientController::class, 'edit'])->name('edit'); 
        Route::put('/{client}', [ClientController::class, 'update'])->name('update');
        Route::delete('/{client}', [ClientController::class, 'destroy'])->name('destroy');

        // Client-specific appointments
        Route::get('/{client}/appointments/create', [AppointmentController::class, 'create'])
            ->name('appointments.create');  
        Route::post('/{client}/appointments', [AppointmentController::class, 'store'])
            ->name('appointments.store');
    });

    /**
     * Appointments CRUD (admin only)
     */
    Route::resource('appointments', AppointmentController::class)
         ->only(['index', 'show', 'edit', 'update', 'destroy']);

    /**
     * NailTech CRUD + client assignment
     */
    Route::prefix('nailtechs')->name('nailtechs.')->group(function () {
        Route::get('/', [NailTechController::class, 'index'])->name('index');           
        Route::get('/create', [NailTechController::class, 'create'])->name('create');   
        Route::post('/', [NailTechController::class, 'store'])->name('store');          
        Route::get('/{nailtech}', [NailTechController::class, 'show'])->name('show');     
        Route::get('/{nailtech}/edit', [NailTechController::class, 'edit'])->name('edit'); 
        Route::put('/{nailtech}', [NailTechController::class, 'update'])->name('update');
        Route::delete('/{nailtech}', [NailTechController::class, 'destroy'])->name('destroy');

        // Optional: assign clients to nail tech
        Route::post('/{nailtech}/assign-clients', [NailTechController::class, 'assignClients'])
            ->name('assign.clients');
    });
});

require __DIR__ . '/auth.php';



