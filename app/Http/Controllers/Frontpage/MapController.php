<?php

namespace App\Http\Controllers\Frontpage;

use App\Http\Controllers\Controller;
use App\Models\CropChachoengsao;
use App\Models\Spatial;
use App\Models\SpatialGroup;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function map()
    {
        $results = CropChachoengsao::all();
        $spatials = Spatial::all();
        $spatialGroups = SpatialGroup::all();
        return view('frontpage.maps', compact([
            'results',
            'spatials',
            'spatialGroups'
        ]));
    }
}