<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\CultureController;
use App\Http\Controllers\Api\V1\ScholarshipController;
use App\Http\Controllers\Api\V1\EmergencyController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
* Culture Master
*/
Route::get('listCulture', [CultureController::class,'getCultureList']);
Route::post('cultureById', [CultureController::class,'getCultureById']);

/*
* Scholarship Master
*/
Route::get('listScholarship', [ScholarshipController::class,'getScholarshipList']);
Route::post('scholarshipeById', [ScholarshipController::class,'getScholarshipById']);

/*
* Emergency Master
*/
Route::get('listEmergency', [EmergencyController::class,'getEmergencyList']);
Route::post('emergencyById', [EmergencyController::class,'getEmergencyById']);
Route::post('addCallCount', [EmergencyController::class,'addEmergencyCallCount']);