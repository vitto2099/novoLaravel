<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

// Rotas Públicas
Route::get('/', [PrincipalController::class, 'home'])->name('index');
Route::get('/sobre-nos', [SobreNosController::class, 'aboutUs'])->name('about');
Route::get('/contato', [ContatoController::class, 'contact'])->name('contact');
Route::post('/contato', [ContatoController::class, 'salvar'])->name('contact.salvar');

// Grupo de Rotas do Admin
Route::prefix('admin')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('admin.login');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
});