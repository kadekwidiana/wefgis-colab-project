<?php

namespace App\Http\Controllers;

use App\Models\Spatial;
use App\Models\SpatialGroup;
use Illuminate\Http\Request;

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
                'url' => 'required',
                'attribute' => 'required|max:255',
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
        return view('backpage.spatial.detail');
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
        // $berita = Berita::where('slug', $slug)->first();
        $spatial = Spatial::where('sp_id', $sp_id)->first();

        $rules = [
            'group_id' => 'required|exists:spatial__groups,group_id',
            'name' => 'required|max:255',
            'url' => 'required',
            'attribute' => 'required|max:255',
            'description' => 'required|max:255',
        ];
        $validatedData = $request->validate($rules);



        // Perbarui data berita
        $spatial->update($validatedData);

        return redirect('/spatial')->with('success', 'Berita berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
