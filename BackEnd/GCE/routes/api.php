<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');

});

Route::prefix('SC')->middleware('auth')->group(function () {
    Route::post('/createClient', 'ClientController@store');
    Route::delete('/{id}', 'ClientController@destroy');
    Route::put('/{id}', 'ClientController@update');
    Route::get('/searchByName', 'ClientController@searchByName');
    Route::get('/{id}', 'ClientController@searchById');
});
