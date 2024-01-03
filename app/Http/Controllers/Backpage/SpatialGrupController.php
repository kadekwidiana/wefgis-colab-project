<?php

namespace App\Http\Controllers\Backpage;

use App\Http\Controllers\Controller;
use App\Models\Regency;
use App\Models\SpatialGroup;
use Illuminate\Http\Request;
use Alert;

class SpatialGrupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $spatialGroups = SpatialGroup::all();
        $perPage = 3;
        $currentPage = request()->query('page', 1);
        $offset = ($currentPage - 1) * $perPage;


        $spatialGroups = SpatialGroup::with('regency:regency_id,regency')
            ->filter(request(['search']))
            ->skip($offset)
            ->take($perPage)
            ->paginate($perPage);

        return view('backpage.spatial-grup.index', compact('spatialGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $regencies = Regency::all();
        return view('backpage.spatial-grup.create', compact('regencies'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([

            'regency_id' => 'required|exists:regencies,regency_id',
            'name' => 'required|max:45',
            'active' => 'required|'
        ]);
        Alert::success('succes title', 'Success Message');
        // $title = 'Delete Data!';
        // $text = "Are you sure you want to delete?";
        // confirmDelete($title, $text);

        SpatialGroup::create($data);
        return redirect()->route('spatialGroup.index')->with('success', 'spatial data success to add');
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
    public function edit($group_id)
    {
        // $spatial = Spatial::where('sp_id', $sp_id)->first();
        $spatialGroups = SpatialGroup::where('group_id', $group_id)->first();
        // $spatialGroups = SpatialGroup::all();
        $regencies = Regency::all();
        return view('backpage.spatial-grup.edit', compact('spatialGroups', 'regencies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $group_id)
    {
        $data = $request->validate([
            'regency_id' => 'required|exists:regencies,regency_id',
            'name' => 'required|max:45',
            'active' => 'required|'
        ]);
        // $spatial = Spatial::findOrFail($sp_id);
        $spatialGroup = SpatialGroup::findOrFail($group_id);
        $spatialGroup->update($data);

        alert()->success('Hore!', 'Data Updated Successfully');
        return redirect()->route('spatialGroup.index')->with('success', 'Spatial Group updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($group_id)
    {
        $spatialGroup = SpatialGroup::findOrFail($group_id);
        $spatialGroup->delete();
        alert()->success('Hore!', 'Data Deleted Successfully');
        return redirect()->route('spatialGroup.index')->with('success', 'Spatial deleted successfully.');
    }
}
