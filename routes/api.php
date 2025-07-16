<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Route de test
Route::get('/', function () {
    return response()->json(['message' => 'Hello world!']);
});

// // Routes publiques d'authentification
// Route::post('/register', [AuthController::class, 'register']);
// Route::post('/login', [AuthController::class, 'login']);

// // Routes protégées nécessitant un token JWT
// Route::middleware('jwt')->group(function () {
//     Route::get('/me', [AuthController::class, 'me']);
//     Route::post('/logout', [AuthController::class, 'logout']);
//     Route::post('/refresh', [AuthController::class, 'refresh']);
// });

// Groupe de routes avec préfixe 'auth'
Route::group([
    'prefix' => 'auth'
], function () {
    // Routes publiques (avec protection contre les utilisateurs déjà connectés)
    Route::post('/register', [AuthController::class, 'register'])->name('auth.register')->middleware('guest');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

    // Routes protégées
    Route::middleware('jwt')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
        Route::post('/refresh', [AuthController::class, 'refresh'])->name('auth.refresh');
        Route::get('/me', [AuthController::class, 'me'])->name('auth.me');
    });
});
