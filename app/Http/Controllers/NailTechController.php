<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NailTech;
use App\Models\Client;

class NailTechController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nailtechs = NailTech::with('clients')->get();
        return view('nailtechs.index', compact('nailtechs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('clients.index')->with('error', 'Access denied.');
        }

        $clients = Client::all();
        return view('nailtechs.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('nailtechs.index')->with('error', 'Access denied.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'speciality' => 'required|string|max:255',
            'hourly_rate' => 'required|string|max:255',
        ]);

        $nailtech = NailTech::create($validated);

        if ($request->has('clients')) {
            $nailtech->clients()->attach($request->clients);
        }

        return redirect()->route('nailtechs.index')->with('success', 'Nail Tech created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(NailTech $nailtech)
    {
        $nailtech->load('clients');
        return view('nailtechs.show', compact('nailtech'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NailTech $nailtech)
    {
        $clients = Client::all();
        $nailtechClients = $nailtech->clients->pluck('id')->toArray();

        return view('nailtechs.edit', compact('nailtech', 'clients', 'nailtechClients'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NailTech $nailtech)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'speciality' => 'required|string|max:255',
            'hourly_rate' => 'required|string|max:255',
        ]);

        $nailtech->update($validated);

        if ($request->has('clients')) {
            $nailtech->clients()->sync($request->clients);
        } else {
            $nailtech->clients()->sync([]); // remove all if none selected
        }

        return redirect()->route('nailtechs.index')->with('success', 'Nail Tech updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NailTech $nailtech)
    {
        $nailtech->clients()->detach();
        $nailtech->delete();

        return redirect()->route('nailtechs.index')->with('success', 'Nail Tech deleted successfully');
    }
}
