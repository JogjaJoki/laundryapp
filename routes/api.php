<?php

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

//API route for register new user
Route::post('/register', [App\Http\Controllers\Api\AuthController::class, 'register'])->name('api.register');
//API route for login user
Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function (){
    // API route for logout user
    Route::post('/logout', [App\Http\Controllers\Api\AuthController::class, 'logout']);
    
    Route::get('/me', [App\Http\Controllers\Pelanggan\ProfileController::class, 'me']);
    Route::post('/me-update', [App\Http\Controllers\Pelanggan\ProfileController::class, 'update']);

    Route::get('/services/{id}', [App\Http\Controllers\Pelanggan\ServiceController::class, 'services']);

    Route::get('/jenis', [App\Http\Controllers\Pelanggan\JenisController::class, 'jenis']);
    
    Route::post('/make-order', [App\Http\Controllers\Pelanggan\PesananController::class, 'makeOrder']);
    Route::post('/layanan-list', [App\Http\Controllers\Pelanggan\PesananController::class, 'getlayananList']);
});
