<?php

namespace App\Http\Controllers\EndpointAPI;

use App\Http\Controllers\Controller;
use App\Models\CropChachoengsao;
use App\Models\LandUse;
use App\Models\Water;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class EndpointController extends Controller
{
    private $baseUrl = "http://rs.wefgis.com";
    public function pointCrop()
    {
        $result = CropChachoengsao::all();
        return json_encode($result);

        // $result = DB::table('spatial__groups')
        // ->join('crop_chachoengsaos', 'spatial__groups.group_id', '=', 'crop_chachoengsaos.group_id')
        // ->where('spatial__groups.group_id', '=', 1)
        // ->select('spatial__groups.group_id', 'crop_chachoengsaos.*')
        // ->get();
        // return json_encode($result);
        // $landUses2 = LandUse::all();
        // $waters2 = Water::all();

        // $result = [
        //     "data" => [
        //         "landUses2" => $landUses2,
        //         "waters2" => $waters2,
        //     ],
        // ];

        // return Response::json($result);
    }
    public function pointNakhon()
    {
        $result = DB::table('data_nakhons')
            ->join('project_codes', 'data_nakhons.project_code', '=', 'project_codes.project_code')
            ->select('data_nakhons.*', 'project_codes.icon')
            ->get();

        return response()->json($result);
    }

    public function waterOccurrence()
    {
        try {
            $url = $this->baseUrl . '/wateroccurence';
            $response = Http::get($url);
            $data = $response->json();
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => 'API request failed'], 500);
        }
    }

    public function precipitation(Request $request)
    {
        $geometry = $request->input('geometry');
        $type = $request->input('type');
        $startYear = $request->input('startYear');
        $endYear = $request->input('endYear');

        $client = new Client;

        $url = $this->baseUrl . "/precipitation";
        $response = $client->post($url, [
            // 'headers' => $headers,
            'form_params' => [
                'geometry' => $geometry,
                'type' => $type,
                'startYear' => $startYear,
                'endYear' => $endYear,
            ]
        ]);
        $responseData = json_decode($response->getBody(), true);

        return response()->json($responseData);
    }
    public function vci(Request $request)
    {
        $geometry = $request->input('geometry');
        $type = $request->input('type');
        $startYear = $request->input('startYear');
        $endYear = $request->input('endYear');

        $client = new Client;
        $url = $this->baseUrl . "/vci";
        $response = $client->post($url, [
            'form_params' => [
                'geometry' => $geometry,
                'type' => $type,
                'startYear' => $startYear,
                'endYear' => $endYear,
            ]
        ]);
        $responseData = json_decode($response->getBody(), true);

        return response()->json($responseData);
    }
    public function evi(Request $request)
    {
        $geometry = $request->input('geometry');
        $type = $request->input('type');
        $startYear = $request->input('startYear');
        $endYear = $request->input('endYear');

        $client = new Client;
        $url = $this->baseUrl . "/evi";
        $response = $client->post($url, [
            'form_params' => [
                'geometry' => $geometry,
                'type' => $type,
                'startYear' => $startYear,
                'endYear' => $endYear,
            ]
        ]);
        $responseData = json_decode($response->getBody(), true);

        return response()->json($responseData);
    }

    // GEE Nakhon Pathom
    public function nakhonWater()
    {
        try {
            $url = $this->baseUrl . '/nakhonwater';
            $response = Http::get($url);
            $data = $response->json();
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => 'API request failed'], 500);
        }
    }
    public function nakhonMap()
    {
        try {
            $url = $this->baseUrl . '/nakhonmap';
            $response = Http::get($url);
            $data = $response->json();
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => 'API request failed'], 500);
        }
    }
    // model phenology crop
    public function phenologyCrop(Request $request)
    {
        $point = $request->input('point');
        $year = $request->input('year');
        $month = $request->input('month');

        $client = new Client;
        $response = $client->post('https://mapping.wefgis.com/detect_phenology', [
            'form_params' => [
                'point' => $point,
                'year' => $year,
                'month' => $month,
            ]
        ]);
        $responseData = json_decode($response->getBody(), true);

        return response()->json($responseData);
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
        try {
            $latitude = $request->input('latitude');
            $longitude = $request->input('longitude');

            $apiUrl = "https://nominatim.openstreetmap.org/reverse?format=json&lat=$latitude&lon=$longitude";

            $response = Http::get($apiUrl);

            $address = $response->json('display_name');

            return response()->json(['address' => $address]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e]);
        }
    }

    public function showData()
    {
        // Ambil semua data land_uses
        $landUses2 = LandUse::all();

        // Array untuk menampung hasil akhir
        $result_waters = [];

        // Loop melalui setiap land_use
        foreach ($landUses2 as $landUse) {
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

        // Convert array ke JSON dan kirimkan sebagai respons
        return response()->json($resultFormatted);
    }
    public function showData2()
    {
        // Ambil semua data land_uses
        $landUses2 = Water::all();

        // Convert array ke JSON dan kirimkan sebagai respons
        return response()->json($landUses2);
    }
}
