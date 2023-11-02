<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DocDocumentoController;
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

Route::group(['middleware' => 'api','prefix' => 'documentos'], function () {
    // Documentos
    Route::get('/',[DocDocumentoController::class,'index'])->name('documentos');
    Route::post('/create',[DocDocumentoController::class,'store'])->name('documentos_create');
    Route::get('/{id}',[DocDocumentoController::class,'show'])->name('documentos');
    Route::put('/update/{id}',[DocDocumentoController::class,'update'])->name('documentos_update');
    Route::delete('/delete/{id}',[DocDocumentoController::class,'destroy'])->name('documentos_delete');
});
