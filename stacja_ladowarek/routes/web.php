<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Sub_domainsController;
use App\Http\Controllers\ChargingHistoryController;
use App\Http\Controllers\workers_panel\ChargerController;
use App\Http\Controllers\Auth\LoginRegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
|
*/

// Trasy dostępne dla wszystkich użytkowników
Route::get('/', [Sub_domainsController::class, 'index'])->name('users_panel.index');
Route::get('/index', [Sub_domainsController::class, 'index'])->name('users_panel.index');


Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::post('/logout', 'logout')->name('logout');
});




Route::get('/about', function () {
    return view('about');
});




// Trasy dostępne dla zalogowanych użytkowników w panelu użytkownika
Route::middleware(['auth', 'user'])->prefix('users_panel')->group(function () {
    Route::get('/profile', [Sub_domainsController::class, 'profile'])->name('profile');
    Route::get('/charging-history', [ChargingHistoryController::class, 'index'])->name('charge_history');
    Route::get('/chargers', [Sub_domainsController::class, 'chargers'])->name('chargers');
    Route::get('/reservation/{charger_id}', [Sub_domainsController::class, 'reservation'])->name('reservation');
    Route::get('/malfunction', [Sub_domainsController::class, 'malfunction'])->name('malfunction');
});

// Trasy dostępne dla pracowników w panelu pracownika
Route::middleware(['auth', 'worker'])->prefix('workers_panel')->group(function () {
    Route::get('/chargers/create', [ChargerController::class, 'create'])->name('chargers.create');
    Route::post('/chargers/store', [ChargerController::class, 'store'])->name('chargers.store');
    Route::get('/chargers', [ChargerController::class, 'index'])->name('chargers.index');
    Route::get('/chargers/edit/{id}', [ChargerController::class, 'edit'])->name('chargers.edit');
    Route::put('/chargers/update/{id}', [ChargerController::class, 'update'])->name('chargers.update');
});
