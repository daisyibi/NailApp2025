<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    /**
     * Display a listing of the clients.
     */
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new client.
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created client in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone_number' => 'nullable|string|max:20',
            'design_choice' => 'nullable|string|max:255',
            'nail_tech_name' => 'nullable|string|max:255',
            'charms' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'notes' => 'nullable|string'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/clients', 'public');
        }

        Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'design_choice' => $request->design_choice,
            'nail_tech_name' => $request->nail_tech_name,
            'charms' => $request->charms,
            'image' => $imagePath,
            'notes' => $request->notes,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return to_route('clients.index')->with('success', 'Client created successfully.');
    }

    /**
     * Display the specified client.
     */
    public function show(string $id)
    {
        $client = Client::findOrFail($id);
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified client.
     */
    public function edit(string $id)
    {
        $client = Client::findOrFail($id);
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified client in storage.
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone_number' => 'nullable|string|max:20',
            'design_choice' => 'nullable|string|max:255',
            'nail_tech_name' => 'nullable|string|max:255',
            'charms' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'notes' => 'nullable|string'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($client->image) {
                Storage::disk('public')->delete($client->image);
            }
            $client->image = $request->file('image')->store('images/clients', 'public');
        }

        $client->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'design_choice' => $request->design_choice,
            'nail_tech_name' => $request->nail_tech_name,
            'charms' => $request->charms,
            'notes' => $request->notes
        ]);

        return to_route('clients.show', $client)->with('success', 'Client updated successfully.');
    }

    /**
     * Remove the specified client from storage.
     */
    public function destroy(string $id)
    {
        $client = Client::findOrFail($id);

        if ($client->image) {
            Storage::disk('public')->delete($client->image);
        }

        $client->delete();
        return to_route('clients.index')->with('success', 'Client successfully removed.');
    }
}


