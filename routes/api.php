<?php

use App\Http\Controllers\CompetenciasController;
use App\Models\Competencias;
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
Route::middleware('jwt.verify')->get('/protected', function () {
    return auth()->user();
});
Route::get('/competencias', [CompetenciasController::class, 'index']);
Route::post('/competencias', [CompetenciasController::class, 'store']);
Route::put('/competencias/{id}', [CompetenciasController::class, 'update']);
Route::delete('/DeleComp/{id}', [CompetenciasController::class, 'destroy']);
