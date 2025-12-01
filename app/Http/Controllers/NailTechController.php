<?php

namespace App\Http\Controllers;

use App\Models\NailTech;
use App\Models\Client;
use Illuminate\Http\Request;

class NailTechController extends Controller
{
    public function index()
    {
        $nailtechs = NailTech::with('clients')->get();
        return view('nailtechs.index', compact('nailtechs'));
    }

    public function create()
    {
        $clients = Client::all(); 
        return view('nailtechs.create', compact('clients'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'speciality' => 'required|string|max:255',
            'hourly_rate' => 'required|numeric|min:0',
            'clients' => 'nullable|array',
            'clients.*' => 'exists:clients,id',
        ]);

        $nailtech = NailTech::create($request->only('name', 'speciality', 'hourly_rate'));

       
        if ($request->has('clients')) {
            $nailtech->clients()->sync($request->clients);
        }

        return redirect()->route('nailtechs.index')->with('success', 'Nail Technician created successfully.');
    }

    public function show(NailTech $nailtech)
    {
        $nailtech->load('clients');
        return view('nailtechs.show', compact('nailtech'));
    }

    public function edit(NailTech $nailtech)
    {
        $clients = Client::all(); // all clients for multi-select
        $nailtech->load('clients'); // load assigned clients
        return view('nailtechs.edit', compact('nailtech', 'clients'));
    }

    public function update(Request $request, NailTech $nailtech)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'speciality' => 'required|string|max:255',
            'hourly_rate' => 'required|numeric|min:0',
            'clients' => 'nullable|array',
            'clients.*' => 'exists:clients,id',
        ]);

        $nailtech->update($request->only('name', 'speciality', 'hourly_rate'));

        // Update client assignments
        $nailtech->clients()->sync($request->clients ?? []);

        return redirect()->route('nailtechs.show', $nailtech)->with('success', 'Nail Technician updated successfully.');
    }

    public function destroy(NailTech $nailtech)
    {
        $nailtech->clients()->detach(); // remove all client assignments
        $nailtech->delete();

        return redirect()->route('nailtechs.index')->with('success', 'Nail Technician deleted successfully.');
    }
}
