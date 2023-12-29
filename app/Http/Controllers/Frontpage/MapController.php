<?php

namespace App\Http\Controllers\Frontpage;

use App\Http\Controllers\Controller;
use App\Models\CropChachoengsao;
use App\Models\Regency;
use App\Models\Spatial;
use App\Models\SpatialGroup;
use App\Models\Water;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function map()
    {
        $results = CropChachoengsao::all();
        $spatials = Spatial::all();
        $waters = Water::all();
        $spatialGroups = SpatialGroup::all();
        $regencies = Regency::all();
        return view('frontpage.maps', compact([
            'results',
            'spatials',
            'waters',
            'spatialGroups',
            'regencies'
        ]));
    }
}
