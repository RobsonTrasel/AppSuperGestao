<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\aboutController;
use App\Http\Controllers\contactController;
use App\Http\Controllers\homeController;
use App\Http\Middleware\LogAcessoMiddleware;
use App\Http\Controllers\loginController;
use App\Http\Controllers\appController;
use App\Http\Controllers\clienteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\fornecdorController;

Route::get('/', [homeController::class, 'index'])->name('site.index');
Route::get('/contato',[contactController::class, 'index'] )->name('site.contato');
Route::get('/sobre-nos', [aboutController::class, 'index'])->name('site.sobrenos');
Route::post('/contato',[contactController::class, 'create'] )->name('site.contato');
Route::get('/login/{erro?}', [loginController::class, 'index'])->name('site.login');
Route::post('/login', [loginController::class, 'auth'])->name('site.login');

Route::prefix('/app')->middleware('auth.rotas:padrão')->group(function () {
    Route::get('/home', [appController::class, 'index'])->name('site.home');
    Route::get('/sair', [loginController::class, 'logout'])->name('site.exit');
    Route::get('/cliente', [clienteController::class, 'index'])->name('site.client');


    Route::get('/fornecedor', [fornecdorController::class, 'index'])->name('site.fornecedor');
    Route::post('/fornecedor/listar', [fornecdorController::class, 'list'])->name('site.fornecedor.listar');
    Route::get('/fornecedor/listar', [fornecdorController::class, 'list'])->name('site.fornecedor.listar');
    Route::get('/fornecedor/adicionar', [fornecdorController::class, 'adicionar'])->name('site.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', [fornecdorController::class, 'adicionar'])->name('site.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}/{msg?}', [fornecdorController::class, 'edit'])->name('site.fornecedor.editar');
    Route::get('/fornecedor/excluir/{id}', [fornecdorController::class, 'excluir'])->name('site.fornecedor.excluir');


    Route::resource('/produto', ProdutoController::class);
});


Route::fallback(function() {
    return 'Erro';
});
