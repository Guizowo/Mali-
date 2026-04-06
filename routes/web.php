<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UsuarioController;

/*
|--------------------------------------------------------------------------
| Rotas públicas — acessíveis sem login
|--------------------------------------------------------------------------
*/
Route::get('/auth', [AuthController::class, 'index'])->name('auth.index');
Route::post('/auth', [AuthController::class, 'store'])->name('auth.store');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

/*
|--------------------------------------------------------------------------
| Rotas protegidas — exigem login
|--------------------------------------------------------------------------
*/
Route::middleware('autenticacao')->group(function () {
    // Página inicial redireciona para as tarefas
    Route::get('/', [TaskController::class, 'index']);

    // Tarefas
    Route::resource('tasks', TaskController::class);

    // Clientes (usuarios do sistema — não confundir com a tabela de auth)
    Route::resource('usuarios', UsuarioController::class);
});
