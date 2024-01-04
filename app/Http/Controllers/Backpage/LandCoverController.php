<?php

namespace App\Http\Controllers\Backpage;

use App\Http\Controllers\Controller;
use App\Models\LandCover;
use Illuminate\Http\Request;
use Alert;

class LandCoverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $landcovers = LandCover::all();

        $perPage = 3;
        $currentPage = request()->query('page', 1);
        $offset = ($currentPage - 1) * $perPage;
        $landcovers = LandCover::latest()
            ->filter(request(['search']))
            ->skip($offset)
            ->take($perPage)
            ->paginate($perPage);

        return view('backpage.landcovers.index', compact('landcovers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backpage.landcovers.create');
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
                'type' => 'required',
                'landcover' => 'required|string|max:100',
                'icon' => 'required|string|max:100',
            ]
        );
        Alert::success('succes title', 'data succesfully stored');

        LandCover::create($request->all());
        return redirect()->route('landcover.index')->with('success', 'spatial data success to add');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($lc_id)
    {
        $landcovers = LandCover::where('lc_id', $lc_id)->first();

        return view('backpage.landcovers.edit', compact('landcovers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $lc_id)
    {
        $request->validate([
            'type' => 'required',
            'landcover' => 'required|string|max:100',
            'icon' => 'required|string|max:100',
        ]);
        $landcover = LandCover::findOrFail($lc_id);
        $landcover->update($request->all());
        alert()->success('Hore!', 'Data Updated Successfully');


        return redirect()->route('landcover.index')->with('success', 'Spatial updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $landcovers = LandCover::findOrFail($id);
        $landcovers->delete();
        alert()->success('Hore!', 'Data Deleted Successfully');
        return redirect()->route('landcover.index')->with('success', 'Spatial deleted successfully.');
    }
}
