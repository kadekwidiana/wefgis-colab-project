<?php

namespace App\Http\Controllers;

use App\Models\CropChachoengsao;
use App\Models\Spatial;
use App\Models\SpatialGroup;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CropChacoengsaoController extends Controller
{
    private $baseUrl = "http://rs.wefgis.com";
    public function index()
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

    public function pointCrop()
    {
        $result = CropChachoengsao::all();
        return json_encode($result);
    }

    public function waterOccurrence()
    {
        try {
            $url = $this->baseUrl.'/wateroccurence';
            $response = Http::get($url);
            $data = $response->json();
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => 'API request failed'], 500);
        }
    }

    public function precipitation(Request $request){
        $geometry = $request->input('geometry');
        $type = $request->input('type');
        $startYear = $request->input('startYear');
        $endYear = $request->input('endYear');

        $client = new Client;

        $url = $this->baseUrl."/precipitation";
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
    public function vci(Request $request){
        $geometry = $request->input('geometry');
        $type = $request->input('type');
        $startYear = $request->input('startYear');
        $endYear = $request->input('endYear');

        $client = new Client;
        $url = $this->baseUrl."/vci";
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
    public function evi(Request $request){
        $geometry = $request->input('geometry');
        $type = $request->input('type');
        $startYear = $request->input('startYear');
        $endYear = $request->input('endYear');

        $client = new Client;
        $url = $this->baseUrl."/evi";
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
            $url = $this->baseUrl.'/nakhonwater';
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
            $url = $this->baseUrl.'/nakhonmap';
            $response = Http::get($url);
            $data = $response->json();
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => 'API request failed'], 500);
        }
    }

    // API phenology crop
    public function phenology_crop(Request $request){
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
}
