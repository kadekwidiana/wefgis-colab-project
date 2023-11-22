<?php

use App\Http\Controllers\CropChacoengsaoController;
use App\Http\Controllers\NakhonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WaterController;
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

// FRONTPAGE
// view frontpage
Route::get('/', [CropChacoengsaoController::class, 'index'])->name('index');

Route::get('/pointCrop', [CropChacoengsaoController::class, 'pointCrop'])->name('json-crop');
// GEE
Route::get('/wateroccurence', [CropChacoengsaoController::class, 'waterOccurrence'])->name('waterOccurrence');
Route::post('/precipitation',[CropChacoengsaoController::class, 'precipitation'])->name('precipitation');
Route::post('/vci',[CropChacoengsaoController::class, 'vci'])->name('vci');
Route::post('/evi',[CropChacoengsaoController::class, 'evi'])->name('evi');
// phenology crop
Route::post('/phenology_crop',[CropChacoengsaoController::class, 'phenology_crop'])->name('phenology_crop');

// GEE Nakhon Pathom
Route::get('/nakhonwater', [CropChacoengsaoController::class, 'nakhonWater'])->name('nakhonWater');
Route::get('/nakhonmap', [CropChacoengsaoController::class, 'nakhonMap'])->name('nakhonMap');
Route::get('/pointNakhon', [NakhonController::class, 'pointNakhon'])->name('point-nakhon');

// BACKPAGE
Route::get('/dashboard', function () {
    return view('backpage.dashboard.index');
});

Route::resource('/water', WaterController::class);