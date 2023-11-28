<?php
// app/Http/Controllers/WaterController.php

namespace App\Http\Controllers;

use App\Models\Water;
use App\Models\Regency;
use App\Models\LandUse;
use App\Models\LandCover;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WaterController extends Controller
{
    public function index()
    {
        $waters = Water::all();
        return view('backpage.water.index', compact('waters'));
    }

    public function getAltitude(Request $request)
    {
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        $apiUrl = "https://api.opentopodata.org/v1/srtm90m?locations=$latitude,$longitude";

        $response = Http::get($apiUrl);

         $altitude = $response->json('results.0.elevation');

        return response()->json(['altitude' => $altitude]);
    }
    public function getAddress(Request $request)
    {
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        $apiUrl = "https://nominatim.openstreetmap.org/reverse?format=json&lat=$latitude&lon=$longitude";

        $response = Http::get($apiUrl);

        $address = $response->json('display_name');

        return response()->json(['address' => $address]);
    }

    public function create()
    {
        $regencies = Regency::all();
        $landUses = LandUse::all();
        $landCovers = LandCover::all();

        return view('backpage.water.create', compact('regencies', 'landUses', 'landCovers'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            // 'water_id' => 1,
            'regency_id' => 'required|exists:regencies,regency_id',
            'lu_id' => 'required|exists:land_uses,lu_id',
            'lc_id' => 'required|exists:land_covers,lc_id',
            'name' => 'required|max:45',
            'latitude' => 'required|max:45',
            'longitude' => 'required|max:45',
            'altitude' => 'required|max:45',
            'address' => 'required',
            'wide' => 'required|max:45',
            'aoi' => 'required',
            'status_area' => 'required|in:private,public',
            'ownership' => 'required|max:45',
            'photo' => 'required',
            'permanence' => 'required|max:100',
            'description' => 'required',
            'related_photo' => 'required',
        ]);

        if ($request->file('photo')){
            $data['photo']= $request->file('photo')->store('water-photo');
        }
        if ($request->file('related_photo')){
            $data['related_photo']= $request->file('related_photo')->store('water-related-photo');
        }

        Water::create($data);

        return redirect()->route('water.index')->with('success', 'Water area created successfully.');
    }

    public function show($id)
    {
        $water = Water::findOrFail($id);
        return view('backpage.water.detail', compact('water'));
    }

    public function edit($id)
    {
        $water = Water::findOrFail($id);
        $regencies = Regency::all();
        $landUses = LandUse::all();
        $landCovers = LandCover::all();

        return view('backpage.water.edit', compact('water', 'regencies', 'landUses', 'landCovers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'regency_id' => 'required|exists:regencies,regency_id',
            'lu_id' => 'required|exists:land_uses,lu_id',
            'lc_id' => 'required|exists:land_covers,lc_id',
            'name' => 'required|max:45',
            'latitude' => 'required|max:45',
            'longitude' => 'required|max:45',
            'altitude' => 'required|max:45',
            'address' => 'required',
            'wide' => 'required|max:45',
            'aoi' => 'required',
            'status_area' => 'required|in:private,public',
            'ownership' => 'required|max:45',
            'photo' => 'required|max:100',
            'permanence' => 'required|max:100',
            'description' => 'required',
            'related_photo' => 'required',
        ]);

        $water = Water::findOrFail($id);
        $water->update($request->all());

        return redirect()->route('water.index')->with('success', 'Water area updated successfully.');
    }

    public function destroy($id)
    {   
        $water = Water::findOrFail($id);
        $water->delete();

        return redirect()->route('water.index')->with('success', 'Water area deleted successfully.');
    }
}
