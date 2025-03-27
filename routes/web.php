<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouterConfigController;
use App\Http\Controllers\SystemLogController;
use App\Http\Controllers\SystemTimeController;
use App\Http\Controllers\SystemLanguageStyleController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::middleware(['auth'])->group(function () {
    Route::get('/router-config', [RouterConfigController::class, 'show'])->name('router.config');
    Route::post('/router-config', [RouterConfigController::class, 'update'])->name('router.update');
});
Route::get('/router/system', [RouterConfigController::class, 'show'])->name('router.system');
Route::post('/router/system/update', [RouterConfigController::class, 'updateSystemConfig'])->name('router.system.update');
Route::post('/router/log/update', [RouterConfigController::class, 'updateLogConfig'])->name('router.log.update');


Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/system', function () {
    return view('system');
})->name('system');


Route::get('/system/log-settings', [SystemLogController::class, 'showLogSettings'])->name('system.log.settings');
Route::post('/system/log-settings', [SystemLogController::class, 'updateLogSettings']);

Route::get('/system/time-settings', [SystemTimeController::class, 'showTimeSettings'])->name('system.time.settings');
Route::post('/system/time-settings', [SystemTimeController::class, 'updateTimeSettings']);

Route::get('/system/language-style', [SystemLanguageStyleController::class, 'showLanguageStyleSettings'])->name('system.language.style');
Route::post('/system/language-style', [SystemLanguageStyleController::class, 'updateLanguageStyleSettings']);