<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    // ----------------------------
    // USERS + ADMIN: View all appointments
    // ----------------------------
    public function index()
    {
        $appointments = Appointment::with(['client', 'user'])
                                   ->latest()
                                   ->get();

        return view('appointments.index', compact('appointments'));
    }

    // ----------------------------
    // USERS + ADMIN: View appointment details
    // ----------------------------
    public function show(Appointment $appointment)
    {
        $appointment->load(['client', 'user']);

        return view('appointments.show', compact('appointment'));
    }

    // ----------------------------
    // USERS + ADMIN: Create appointment form
    // ----------------------------
    public function create(Client $client)
    {
        return view('appointments.create', compact('client'));
    }

    // ----------------------------
    // USERS + ADMIN: Store new appointment
    // ----------------------------
    public function store(Request $request, Client $client)
    {
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

        return redirect()
            ->route('clients.show', $client)
            ->with('success', 'Appointment created successfully.');
    }

    // ----------------------------
    // ADMIN ONLY: Edit
    // ----------------------------
    public function edit(Appointment $appointment)
    {
        if (auth()->user()->role !== 'admin') abort(403, 'Admins only.');

        $clients = Client::all();
        return view('appointments.edit', compact('appointment', 'clients'));
    }

    // ----------------------------
    // ADMIN ONLY: Update
    // ----------------------------
    public function update(Request $request, Appointment $appointment)
    {
        if (auth()->user()->role !== 'admin') abort(403, 'Admins only.');

        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'appointment_date' => 'required|date',
            'status' => 'required|in:pending,confirmed,completed,cancelled',
        ]);

        $appointment->update($request->only(['client_id', 'appointment_date', 'status']));

        return redirect()
            ->route('appointments.index')
            ->with('success', 'Appointment updated successfully.');
    }

    // ----------------------------
    // ADMIN ONLY: Delete
    // ----------------------------
    public function destroy(Appointment $appointment)
    {
        if (auth()->user()->role !== 'admin') abort(403, 'Admins only.');

        $appointment->delete();

        return redirect()
            ->route('appointments.index')
            ->with('success', 'Appointment deleted successfully.');
    }
}
