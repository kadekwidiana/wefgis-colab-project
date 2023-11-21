<?php

use App\Http\Controllers\API\AUTH\LoginController;
use App\Http\Controllers\API\AUTH\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CropController;
use App\Http\Controllers\API\TypeController;
use App\Http\Controllers\API\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// login
Route::post('login', [LoginController::class, 'login']);
// register
Route::post('register', [RegisterController::class, 'register']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    // user
    Route::get('/user', [UserController::class, 'index']);
    // Crop
    Route::apiResource('crops', CropController::class);
    Route::post('/crops/{id}', [CropController::class, 'update']);

    // marker
    Route::get('/allData', [CropController::class, 'allDataCrop']);

    // Crop type
    Route::apiResource('types', TypeController::class);
    Route::post('/types/{id}', [TypeController::class, 'update']);

    // data agregat
    Route::get('data-agregat', [CropController::class, 'dataAgregat'])->name('data-agregat');
});
