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
        $clients = Client::with('nailtechs')->get();
        return view('clients.index', compact('clients'));
    }

  
    public function show(Client $client)
    {
        $client->load('nailtechs');
        return view('clients.show', compact('client'));
    }

   
    public function create()
    {
        $nailtechs = NailTech::all();
        return view('clients.create', compact('nailtechs'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone_number' => 'nullable|string|max:20',
            'design_choice' => 'nullable|string|max:255',
            'charms' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'nailtechs' => 'nullable|array',
            'nailtechs.*' => 'exists:nail_techs,id',
        ]);

        $imagePath = $request->hasFile('image') 
            ? $request->file('image')->store('images/clients', 'public') 
            : null;

        $client = Client::create(array_merge(
            $request->only(['name', 'email', 'phone_number', 'design_choice', 'charms', 'notes']),
            ['image' => $imagePath]
        ));

        $client->nailtechs()->sync($request->nailtechs ?? []);

        return redirect()->route('clients.index')->with('success', 'Client created successfully.');
    }

   
    public function edit(Client $client)
    {
        $nailtechs = NailTech::all();
        $client->load('nailtechs');
        return view('clients.edit', compact('client', 'nailtechs'));
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'phone_number' => 'nullable|string|max:20',
            'design_choice' => 'nullable|string|max:255',
            'charms' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
            'nailtechs' => 'nullable|array',
            'nailtechs.*' => 'exists:nail_techs,id',
        ]);

        if ($request->hasFile('image')) {
            if ($client->image) Storage::disk('public')->delete($client->image);
            $client->image = $request->file('image')->store('images/clients', 'public');
        }

        $client->update($request->only(['name', 'email', 'phone_number', 'design_choice', 'charms', 'notes']));
        $client->nailtechs()->sync($request->nailtechs ?? []);

        return redirect()->route('clients.show', $client)->with('success', 'Client updated successfully.');
    }

 
    public function destroy(Client $client)
    {
        if ($client->image) Storage::disk('public')->delete($client->image);
        $client->nailtechs()->detach();
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
    }
}
