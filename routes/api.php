<?php

use App\Http\Controllers\UplodImagController;
use App\Models\UplodImag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('/create',[UplodImagController::class,'create']);
Route::get('/getid/{id}',[UplodImagController::class,'getID']);
Route::post('/update/{id}',[UplodImagController::class,'update']);