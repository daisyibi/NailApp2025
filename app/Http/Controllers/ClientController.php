<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\NailTech;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::with('nailTech')->get(); // eager load nail tech
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('clients.index')->with('error', 'Unauthorized access.');
        }

        $nailtechs = NailTech::all(); // pass all nail techs to the view
        return view('clients.create', compact('nailtechs'));
    }

    public function store(Request $request)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('clients.index')->with('error', 'Unauthorized access.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone_number' => 'nullable|string|max:20',
            'design_choice' => 'nullable|string|max:255',
            'nail_tech_id' => 'nullable|exists:nail_techs,id', // new field
            'charms' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'notes' => 'nullable|string',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images/clients', 'public');
        }

        Client::create($validated);

        return redirect()->route('clients.index')->with('success', 'Client created successfully.');
    }

    public function show(Client $client)
    {
        $client->load('appointments.user', 'nailTech'); // eager load appointments and nail tech
        return view('clients.show', compact('client'));

          $client->load('nailtech'); // nailtech() relation in Client model
          return view('clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('clients.index')->with('error', 'Unauthorized access.');
        }

        $nailtechs = NailTech::all();
        return view('clients.edit', compact('client', 'nailtechs'));
    }

    public function update(Request $request, Client $client)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('clients.index')->with('error', 'Unauthorized access.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone_number' => 'nullable|string|max:20',
            'design_choice' => 'nullable|string|max:255',
            'nail_tech_id' => 'nullable|exists:nail_techs,id', // new field
            'charms' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'notes' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            if ($client->image) Storage::disk('public')->delete($client->image);
            $validated['image'] = $request->file('image')->store('images/clients', 'public');
        }

        $client->update($validated);

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
