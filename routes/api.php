<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CotizacionController;
use App\Http\Controllers\DocDocumentoController;
use App\Http\Controllers\ProductoController;
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

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('/login', [AuthController::class,'login'])->name('login');
    Route::post('/logout', [AuthController::class,'logout'])->name('logout');
    Route::post('/refresh', [AuthController::class,'refresh'])->name('refresh');
    Route::post('/me', [AuthController::class,'me'])->name('me');

});

Route::group(['middleware' => 'api','prefix' => 'store'], function () {
    // clientes
    Route::get('/clientes',[ClienteController::class,'index'])->name('clientes');

    // productos
    Route::get('/productos',[ProductoController::class,'index'])->name('prosuctos');

    // cotizaciones
    Route::get('/cotizaciones',[CotizacionController::class,'index'])->name('prosuctos');
    Route::post('cotizacion/create',[CotizacionController::class,'store'])->name('cotizacion_create');
    Route::get('cotizacion/{id}',[CotizacionController::class,'show'])->name('cotizacion');
    Route::put('cotizacion/update/{id}',[CotizacionController::class,'update'])->name('cotizacion_update');
    Route::delete('cotizacion/delete/{id}',[CotizacionController::class,'destroy'])->name('cotizacion_delete');
});
