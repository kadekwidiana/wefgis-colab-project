<?php

use App\Http\Controllers\Backpage\DashboardController;
use App\Http\Controllers\Frontpage\CropChacoengsaoController;
use App\Http\Controllers\Backpage\NakhonController;
use App\Http\Controllers\Backpage\ProfileController;
use App\Http\Controllers\Backpage\SpatialController;
use App\Http\Controllers\Backpage\WaterController;
use App\Http\Controllers\Frontpage\MapController;
use App\Http\Controllers\EndpointAPI\EndpointController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';

// ENDPOINT API
// point crop chachoengsao
Route::get('/pointCrop', [EndpointController::class, 'pointCrop'])->name('json-crop');
// point spatial nakhon phatom
Route::get('/pointNakhon', [EndpointController::class, 'pointNakhon'])->name('point-nakhon');
// gee integration
Route::get('/wateroccurence', [EndpointController::class, 'waterOccurrence'])->name('waterOccurrence');
Route::post('/precipitation', [EndpointController::class, 'precipitation'])->name('precipitation');
Route::post('/vci', [EndpointController::class, 'vci'])->name('vci');
Route::post('/evi', [EndpointController::class, 'evi'])->name('evi');
// gee Nakhon Pathom
Route::get('/nakhonwater', [EndpointController::class, 'nakhonWater'])->name('nakhonWater');
Route::get('/nakhonmap', [EndpointController::class, 'nakhonMap'])->name('nakhonMap');
// phenology crop
Route::post('/phenology_crop', [EndpointController::class, 'phenologyCrop'])->name('phenologyCrop');
// get altitude & get address
Route::post('/get-altitude', [EndpointController::class, 'getAltitude'])->name('getAltitude');
Route::post('/get-address', [EndpointController::class, 'getAddress'])->name('getAddress');

// FRONTPAGE
Route::get('/', [MapController::class, 'map'])->name('map');

// BACKPAGE
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::resource('/water', WaterController::class);
Route::resource('/spatial', SpatialController::class);