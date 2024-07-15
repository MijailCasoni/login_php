<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PasswordMigrationController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/migrate-passwords', [PasswordMigrationController::class, 'migratePasswords']);

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'adminDashboard'])->name('admin.dashboard');
    // Otras rutas para admin si es necesario
});

Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', [UserController::class, 'userDashboard'])->name('user.dashboard');
    // Otras rutas para usuario si es necesario
});

Route::get('/', function () {
    return view('auth.login');
});

// Esta ruta parece redundante ya que se define con AuthController arriba, se puede eliminar
// Route::get('/logout', 'Auth\AuthController@logout')->name('logout');

Route::post('refresh-csrf', function () {
    return csrf_token();
})->name('refresh-csrf');

Auth::routes();
