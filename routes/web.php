<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RouterConfigController;
use App\Http\Controllers\SystemLogController;
use App\Http\Controllers\SystemTimeController;
use App\Http\Controllers\SystemLanguageStyleController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LedController;
use App\Http\Controllers\FirmwareController;
use App\Http\Controllers\StartupController;
use App\Http\Controllers\LocalStartupController;

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
//administracion


Route::get('/admin/password', function () {
    return view('admin.security');
})->name('admin.password');

Route::get('/admin/ssh-access', function () {
    return view('admin.ssh_access');
})->name('admin.ssh_access');

Route::get('/admin/ssh-keys', function () {
    return view('admin.ssh_keys');
})->name('admin.ssh_keys');

Route::post('/admin/update-password', [AdminController::class, 'updatePassword'])->name('admin.update_password');


Route::view('/admin/startup', 'admin.startup')->name('admin.startup');
Route::view('/admin/arranque', 'admin.arranque')->name('admin.arranque');
Route::view('/admin/tareas', 'admin.tareas')->name('admin.tareas');
Route::view('/admin/grab', 'admin.grab')->name('admin.grab');

Route::get('/admin/password', [AdminController::class, 'passwordForm'])->name('admin.password');
Route::post('/admin/update-password', [AdminController::class, 'updatePassword'])->name('admin.update_password');

Route::get('/admin/crontab', [AdminController::class, 'crontabForm'])->name('admin.crontab');
Route::post('/admin/update-crontab', [AdminController::class, 'updateCrontab'])->name('admin.update_crontab');
Route::post('/admin/restart-crond', [AdminController::class, 'restartCrond'])->name('admin.restart_crond');

Route::get('leds', [LedController::class, 'index'])->name('leds.index');
    
// Crear un nuevo LED
Route::get('leds/create', [LedController::class, 'create'])->name('leds.create');
Route::post('leds', [LedController::class, 'store'])->name('leds.store');

// Editar un LED existente
Route::get('leds/{id}/edit', [LedController::class, 'edit'])->name('leds.edit');
Route::put('leds/{id}', [LedController::class, 'update'])->name('leds.update');

// Restablecer un LED
Route::delete('leds/{id}/reset', [LedController::class, 'reset'])->name('leds.reset');



Route::get('/generate-backup', [FirmwareController::class, 'generateBackup'])->name('generateBackup');
Route::post('/reset-factory', [FirmwareController::class, 'resetToFactory'])->name('resetToFactory');
Route::post('/upload-firmware', [FirmwareController::class, 'uploadFirmwareImage'])->name('uploadFirmwareImage');
Route::post('/save-mudblock', [FirmwareController::class, 'saveMudblock'])->name('saveMudblock');
Route::post('/upload-image-synupgrade', [FirmwareController::class, 'uploadImageForSynupgrade'])->name('uploadImageForSynupgrade');


Route::post('/admin/start/{script}', [StartupController::class, 'startScript'])->name('admin.startScript');
Route::post('/admin/restart/{script}', [StartupController::class, 'restartScript'])->name('admin.restartScript');
Route::post('/admin/stop/{script}', [StartupController::class, 'stopScript'])->name('admin.stopScript');

Route::get('/admin/arranque-local', [LocalStartupController::class, 'getRcLocalContent'])->name('admin.arranque');
Route::post('/admin/arranque-local', [LocalStartupController::class, 'saveRcLocal'])->name('admin.saveArranque');
