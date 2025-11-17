<?php

namespace App\Http\Controllers;

use App\Models\NailTech;
use App\Models\Client;
use Illuminate\Http\Request;

class NailTechController extends Controller
{
    public function index()
    {
        $nailtechs = NailTech::with('clients')->get(); // eager load clients
        return view('nailtechs.index', compact('nailtechs'));
    }

    public function create()
    {
        return view('nailtechs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'speciality' => 'required|string|max:255',
            'hourly_rate' => 'required|numeric|min:0',
        ]);

        NailTech::create($request->only('name', 'speciality', 'hourly_rate'));

        return redirect()->route('nailtechs.index')->with('success', 'Nail Technician created successfully.');
    }

    public function show(NailTech $nailtech)
    {
        $nailtech->load('clients');
        return view('nailtechs.show', compact('nailtech'));
    }

    public function edit(NailTech $nailtech)
    {
        return view('nailtechs.edit', compact('nailtech'));
    }

    public function update(Request $request, NailTech $nailtech)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'speciality' => 'required|string|max:255',
            'hourly_rate' => 'required|numeric|min:0',
        ]);

        $nailtech->update($request->only('name', 'speciality', 'hourly_rate'));

        return redirect()->route('nailtechs.show', $nailtech)->with('success', 'Nail Technician updated successfully.');
    }

    public function destroy(NailTech $nailtech)
    {
        $nailtech->clients()->detach(); // remove all client assignments
        $nailtech->delete();

        return redirect()->route('nailtechs.index')->with('success', 'Nail Technician deleted successfully.');
    }
}
