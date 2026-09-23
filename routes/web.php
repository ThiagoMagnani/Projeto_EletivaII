<?php

use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\InstituicaoController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\MaterialController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('agendamentos', AgendamentoController::class);
Route::resource('alunos', AlunoController::class)->except('show');
Route::resource('servicos', ServicoController::class)->except('show');
Route::resource('instituicoes', InstituicaoController::class)->except('show');
Route::resource('pagamentos', PagamentoController::class)->except('show');
Route::resource('materiais', MaterialController::class)->except('show');
