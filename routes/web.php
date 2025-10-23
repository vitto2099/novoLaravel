<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\Admin\ProdutoController;



Route::get('/', [PrincipalController::class, 'home'])->name('index');
Route::get('/sobre-nos', [SobreNosController::class, 'aboutUs'])->name('about');
Route::get('/contato', [ContatoController::class, 'contact'])->name('contact');
Route::post('/contato', [ContatoController::class, 'salvar'])->name('contact.salvar');

Route::get('/cadastro', [ClienteController::class, 'create'])->name('cadastro.create'); 
Route::post('/cadastro', [ClienteController::class, 'store'])->name('cadastro.store'); 
Route::get('/produto/{id}', [ProdutoController::class, 'show'])->name('produtos.show'); 



Route::prefix('admin')->group(function () {

    Route::get('/login', [LoginController::class, 'index'])->name('admin.login');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

 
    Route::get('/clientes', [ClienteController::class, 'index'])->name('admin.clientes.index'); 

    Route::get('produtos/create', [ProdutoController::class, 'create'])->name('admin.produtos.create'); 
    Route::post('produtos', [ProdutoController::class, 'store'])->name('admin.produtos.store'); 
    Route::get('produtos', [ProdutoController::class, 'index'])->name('admin.produtos.index'); 
});