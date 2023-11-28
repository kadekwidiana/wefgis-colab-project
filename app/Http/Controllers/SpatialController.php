<?php

namespace App\Http\Controllers;

use App\Models\Spatial;
use App\Models\SpatialGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SpatialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $spatials = Spatial::all();
        return view('backpage.spatial.index', compact('spatials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $spatialGroups = SpatialGroup::all();
        return view('backpage.spatial.create', compact('spatialGroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'group_id' => 'required|exists:spatial__groups,group_id',
                'name' => 'required|max:255',
                'url' => 'required|max:255',
                'attribute' => 'required|max:50',
                'description' => 'required|max:255',
            ]
        );

        Spatial::create($request->all());
        return redirect()->route('spatial.index')->with('success', 'spatial data success to add');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $spatial = Spatial::findOrFail($id);

        return view('backpage.spatial.detail', compact('spatial'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($sp_id)
    {
        $spatial = Spatial::where('sp_id', $sp_id)->first();
        $spatialGroups = SpatialGroup::all();
        return view('backpage.spatial.edit', compact('spatial', 'spatialGroups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sp_id)
    {
        $request->validate([
            'group_id' => 'required|exists:spatial__groups,group_id',
            'name' => 'required|max:255',
            'url' => 'required|max:255',
            'attribute' => 'required|max:255',
            'description' => 'required|max:255',
        ]);
        $spatial = Spatial::findOrFail($sp_id);
        $spatial->update($request->all());

        
        return redirect()->route('spatial.index')->with('success', 'Spatial updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $spatial = Spatial::findOrFail($id);
        $spatial->delete();
        return redirect()->route('spatial.index')->with('success', 'Spatial deleted successfully.');
    }
}
