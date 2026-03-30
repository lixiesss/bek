<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ArchiclashController;
use App\Http\Controllers\Api\ArchidrawController;
use App\Http\Controllers\Admin\AuthAdminController;
use App\Http\Controllers\Admin\ApiDashboardController;

Route::prefix('auth')->group(function () {
    Route::get('google/redirect', [AuthController::class, 'redirectToGoogle']);
    Route::get('google/callback', [AuthController::class, 'handleGoogleCallback']);
    Route::get('admin/google/redirect', [AuthController::class, 'redirectToGoogleAdmin']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('logout', [AuthController::class, 'logout']);
        Route::get('user', [AuthController::class, 'user']);
    });
});

Route::prefix('archiclash')->group(function () {
    Route::post('/register', [ArchiclashController::class, 'store']);
});

Route::prefix('archidraw')->group(function () {
    Route::post('/register', [ArchidrawController::class, 'store']);
});


Route::prefix('admin')->group(function () {
    Route::post('/login', [AuthAdminController::class, 'login']);

    Route::middleware(['auth:sanctum', 'ability:admin'])->group(function () {
        Route::get('/teams', [ApiDashboardController::class, 'getTeams']);
        Route::post('/teams/{id}/verify', [ApiDashboardController::class, 'verifyTeam']);
    });
});
