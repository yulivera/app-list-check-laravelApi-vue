<?php

use App\Http\Controllers\CardController;
use App\Http\Controllers\CheckController;

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

//todos los registros
Route::get('/cards',[CardController::class,'index']);
// un registro en especifico con sus checks
Route::get('/car/{id}',[CardController::class,'show']);

//crear una card
Route::post('/cards',[CardController::class,'store']);
// update card
Route::put('/cards/{id}',[CardController::class,'update']);
//delete card
Route::delete('/cards/{id}',[CardController::class,'destroy']);

// --- Check list ----------

//todos los registros
Route::get('/checks',[CheckController::class,'index']); 
//crear una card
Route::post('/checks',[CheckController::class,'store']);
// update card
Route::put('/checks/{id}',[CheckController::class,'update']);
//delete card
Route::delete('/checks/{id}',[CheckController::class,'destroy']);



