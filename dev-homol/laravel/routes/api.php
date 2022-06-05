<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ConvenioController;
use App\Http\Controllers\api\InstituicaoController;
use App\Http\Controllers\api\CreditoController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// ROTA INSITUIÇÃO
Route::get('instituicoes', [InstituicaoController::class, 'findAll']);

// ROTA CONVÊNIO
Route::get('convenios', [ConvenioController::class, 'findAll']);

// ROTA SIMULAÇÃO CRÉDITO
Route::post('credito', [CreditoController::class, 'findSimulacoes']);