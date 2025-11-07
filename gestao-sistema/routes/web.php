<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\GrupoEconomicoController;
use App\Http\Controllers\BandeiraController;
use App\Http\Controllers\UnidadeController;
use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\AuditoriaController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetController;

// 🏠 PÁGINA INICIAL PERSONALIZADA
Route::view('/', 'home')->name('home');

// DASHBOARD E PERFIL
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// 🔐 AUTENTICAÇÃO (para visitantes)
Route::middleware('guest')->group(function () {

    // Registro
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);

    // Login
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    // Esqueci a senha
    Route::get('esqueci-a-senha', [PasswordResetController::class, 'request'])->name('password.request');
    Route::post('esqueci-a-senha', [PasswordResetController::class, 'email'])->name('password.email');
    Route::get('reset-password/{token}', [PasswordResetController::class, 'reset'])->name('password.reset');
    Route::post('reset-password', [PasswordResetController::class, 'update'])->name('password.update');
});

// 🔒 ROTAS AUTENTICADAS
Route::middleware(['auth'])->group(function () {

    // Logout
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    // CRUDs
    Route::resource('grupos', GrupoEconomicoController::class);
    Route::resource('bandeiras', BandeiraController::class);
    Route::resource('unidades', UnidadeController::class);

    // Relatório de Colaboradores
    Route::get('colaboradores/relatorio', [ColaboradorController::class, 'relatorio'])
        ->name('colaboradores.relatorio');

    // CRUD Colaboradores
    Route::resource('colaboradores', ColaboradorController::class)
        ->parameters(['colaboradores' => 'colaborador']);

    // Auditoria
    Route::get('auditoria', [AuditoriaController::class, 'index'])->name('auditoria.index');

    // Exportações Excel
    Route::get('/export/grupos', [ExportController::class, 'exportGrupos'])->name('export.grupos');
    Route::get('/export/bandeiras', [ExportController::class, 'exportBandeiras'])->name('export.bandeiras');
    Route::get('/export/unidades', [ExportController::class, 'exportUnidades'])->name('export.unidades');
    Route::get('/export/colaboradores', [ExportController::class, 'exportColaboradores'])->name('export.colaboradores');
});
