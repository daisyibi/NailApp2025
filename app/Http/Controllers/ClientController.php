<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('clients.index')->with('error', 'Unauthorized access.');
        }
        return view('clients.create');
    }

    public function store(Request $request)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('clients.index')->with('error', 'Unauthorized access.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone_number' => 'nullable|string|max:20',
            'design_choice' => 'nullable|string|max:255',
            'nail_tech_name' => 'nullable|string|max:255',
            'charms' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'notes' => 'nullable|string',
        ]);

        $imagePath = $request->hasFile('image') ? $request->file('image')->store('images/clients', 'public') : null;

        Client::create(array_merge($request->only([
            'name', 'email', 'phone_number', 'design_choice', 'nail_tech_name', 'charms', 'notes'
        ]), ['image' => $imagePath]));

        return redirect()->route('clients.index')->with('success', 'Client created successfully.');
    }

    public function show(Client $client)
    {
        $client->load('appointments.user'); // eager load appointments and user
        return view('clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('clients.index')->with('error', 'Unauthorized access.');
        }
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('clients.index')->with('error', 'Unauthorized access.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone_number' => 'nullable|string|max:20',
            'design_choice' => 'nullable|string|max:255',
            'nail_tech_name' => 'nullable|string|max:255',
            'charms' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'notes' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            if ($client->image) Storage::disk('public')->delete($client->image);
            $client->image = $request->file('image')->store('images/clients', 'public');
        }

        $client->update($request->only([
            'name', 'email', 'phone_number', 'design_choice', 'nail_tech_name', 'charms', 'notes'
        ]));

        return redirect()->route('clients.show', $client)->with('success', 'Client updated successfully.');
    }

    public function destroy(Client $client)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('clients.index')->with('error', 'Unauthorized access.');
        }

        if ($client->image) Storage::disk('public')->delete($client->image);
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
    }
}
