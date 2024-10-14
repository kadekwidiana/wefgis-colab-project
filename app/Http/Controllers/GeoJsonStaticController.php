<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeoJsonStaticController extends Controller
{
    public function getFile($file)
    {
        // Menentukan path ke folder 'resources/layer'
        $path = resource_path('layer/' . $file);

        // Mengecek apakah file ada
        if (!file_exists($path)) {
            return response()->json(['error' => 'File not found'], 404);
        }

        // Mengambil konten file dan menentukan header
        return response()->file($path);
    }
}
