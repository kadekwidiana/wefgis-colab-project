<?php

namespace App\Http\Controllers\Frontpage;

use App\Http\Controllers\Controller;
use App\Models\CropChachoengsao;
use App\Models\LandUse;
use App\Models\Regency;
use App\Models\Spatial;
use App\Models\SpatialGroup;
use App\Models\Water;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function map()
    {
        $agricultures = CropChachoengsao::all();
        $agri_classes = CropChachoengsao::distinct('class')->pluck('class');
        $spatials = Spatial::all();
        $waters = Water::with('landCover')->get();
        $spatialGroups = SpatialGroup::all();
        $regencies = Regency::all();
        $landUses = LandUse::all();

        // Ambil semua data land_uses
        $landUses2 = LandUse::all();

        // Array untuk menampung hasil akhir
        $result_waters = [];

        // Loop melalui setiap land_use
        foreach ($landUses as $landUse) {
            // Ambil data waters2 yang memiliki lu_id sesuai dengan land_use
            $waters2 = Water::whereJsonContains('lu_id', $landUse->lu_id)->get();

            // Buat array untuk menyimpan hasil akhir
            $landUseData = [
                'data_water' => []
            ];

            // Loop melalui setiap water dalam $waters2
            foreach ($waters2 as $water) {
                // Tambahkan landuse_id ke dalam data_water
                $water['landuse_id'] = $landUse['lu_id'];

                // Tambahkan landuse ke dalam data_water
                $water['landuse'] = $landUse['landuse'];

                // Tambahkan icon ke dalam data_water
                $water['icon'] = $landUse['icon'];

                // Tambahkan water ke dalam array data_water
                $landUseData['data_water'][] = $water;
            }

            // Tambahkan ke array hasil akhir
            $result_waters[] = $landUseData;
        }
        // Inisialisasi array untuk menyimpan hasil akhir
        $resultFormatted = [];

        // Loop melalui setiap elemen dalam $result_waters
        foreach ($result_waters as $landUseData) {
            // Loop melalui setiap water dalam data_water
            foreach ($landUseData['data_water'] as $water) {
                // Tambahkan water ke dalam array $resultFormatted
                $resultFormatted[] = $water;
            }
        }

        return view('frontpage.maps', compact([
            'agricultures',
            'agri_classes',
            'spatials',
            'waters',
            'resultFormatted',
            'spatialGroups',
            'regencies',
            'landUses'
        ]));
    }
}
