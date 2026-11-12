<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::all();
        return view('locations.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('locations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:locations,name',
            'description' => 'nullable|string|max:255'
        ]);

        Location::create($data);
        return redirect()->route('locations.index')->with('success', 'Data lokasi berhasil ditambahkan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        return view('locations.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:locations,name,' . $location->id,
            'description' => 'nullable|string|max:255'
        ]);

        $location->update($data);
        return redirect()->route('locations.index')->with('success','Data lokasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        if($location->items()->exists())
            {
                return redirect()->route('locations.index')->with('error', 'Data lokasi tidak dapat dihapus karena masih memiliki barang aktif.');
            }

        $location->delete();
        return redirect()->route('locations.index')->with('success', 'Data lokasi berhasil dihapus.');

    }
}
