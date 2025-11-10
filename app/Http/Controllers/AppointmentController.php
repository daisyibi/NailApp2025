<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    // List all appointments (Admin only)
    public function index()
    {
        if (auth()->user()->role !== 'admin') abort(403);

        $appointments = Appointment::with(['client', 'user'])->latest()->get();
        return view('appointments.index', compact('appointments'));
    }

    // Show a single appointment (Admin only)
    public function show(Appointment $appointment)
    {
        if (auth()->user()->role !== 'admin') abort(403);

        $appointment->load(['client', 'user']);
        return view('appointments.show', compact('appointment'));
    }

    // Show create form for a client (Admin only)
    public function create(Client $client)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('clients.show', $client)
                             ->with('error', 'Only admins can create appointments.');
        }

        return view('appointments.create', compact('client'));
    }

    // Store appointment (Admin only)
    public function store(Request $request, Client $client)
    {
        if (auth()->user()->role !== 'admin') abort(403);

        $request->validate([
            'appointment_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'status' => 'required|in:pending,confirmed,completed,cancelled',
        ]);

        $client->appointments()->create([
            'user_id' => auth()->id(),
            'appointment_date' => $request->appointment_date,
            'start_time' => $request->start_time,
            'status' => $request->status,
        ]);

        return redirect()->route('clients.show', $client)
                         ->with('success', 'Appointment created successfully.');
    }

    // ✅ Show edit form for appointment
    public function edit(Appointment $appointment)
    {
        if (auth()->user()->role !== 'admin') abort(403);

        $clients = Client::all();
        return view('appointments.edit', compact('appointment', 'clients'));
    }

    // ✅ Update appointment
    public function update(Request $request, Appointment $appointment)
    {
        if (auth()->user()->role !== 'admin') abort(403);

        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'appointment_date' => 'required|date',
            'status' => 'required|in:pending,confirmed,completed,cancelled',
        ]);

        $appointment->update([
            'client_id' => $request->client_id,
            'appointment_date' => $request->appointment_date,
            'status' => $request->status,
        ]);

        return redirect()->route('appointments.index')
                         ->with('success', 'Appointment updated successfully.');
    }

    // ✅ Delete appointment (optional but useful)
    public function destroy(Appointment $appointment)
    {
        if (auth()->user()->role !== 'admin') abort(403);

        $appointment->delete();

        return redirect()->route('appointments.index')
                         ->with('success', 'Appointment deleted successfully.');
    }
}
