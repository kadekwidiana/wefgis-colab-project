<?php

namespace App\Http\Controllers\EndpointAPI;

use App\Http\Controllers\Controller;
use App\Models\CropChachoengsao;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class EndpointController extends Controller
{
    private $baseUrl = "http://rs.wefgis.com";
    public function pointCrop()
    {
        // $result = CropChachoengsao::all();
        // return json_encode($result);

        $result = DB::table('spatial__groups')
        ->join('crop_chachoengsaos', 'spatial__groups.group_id', '=', 'crop_chachoengsaos.group_id')
        ->where('spatial__groups.group_id', '=', 1)
        ->select('spatial__groups.group_id', 'crop_chachoengsaos.*')
        ->get();
        return json_encode($result);
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
    // model phenology crop
    public function phenologyCrop(Request $request){
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

}
