<?php

namespace App\Http\Controllers;

use App\Models\DataNakhon;
use App\Models\ProjectCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NakhonController extends Controller
{
    public function pointNakhon()
    {
        $result = DB::table('data_nakhons')
        ->join('project_codes', 'data_nakhons.project_code', '=', 'project_codes.project_code')
        ->select('data_nakhons.*', 'project_codes.icon')
        ->get();

        return response()->json($result);
    }
}
