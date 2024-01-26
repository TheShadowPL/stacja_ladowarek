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
    Route::post('/reservation/{charger_id}', [Sub_domainsController::class, 'storeReservation'])->name('reservation.store');
    Route::get('/malfunction', [Sub_domainsController::class, 'malfunction'])->name('malfunction');
    Route::post('/malfunction/store', [Sub_domainsController::class, 'malfunction_store'])->name('malfunction.store');

});

// Trasy dostępne dla pracowników w panelu pracownika
Route::middleware(['auth', 'worker'])->prefix('workers_panel')->group(function () {
    Route::get('/chargers/create', [ChargerController::class, 'create'])->name('chargers.create');
    Route::post('/chargers/store', [ChargerController::class, 'store'])->name('chargers.store');
    Route::get('/chargers/index', [ChargerController::class, 'index'])->name('chargers.index');
    Route::delete('/chargers/delete/{id}', [ChargerController::class, 'delete'])->name('chargers.delete');
    Route::get('/chargers/delete/{id}', [ChargerController::class, 'delete'])->name('chargers.delete');
    Route::get('/index', [ChargerController::class, 'worker_page'])->name('workers.index');
    Route::get('/', [ChargerController::class, 'worker_page']);
    Route::get('/malfunction_list', [ChargerController::class, 'mallfunction_list'])->name('malfunction_list');
    Route::get('/malfunction_list/edit/{id}', [ChargerController::class, 'editMalfunction'])->name('malfunction_list.edit');
    Route::put('/malfunction_list/update/{id}', [ChargerController::class, 'updateMalfunction'])->name('malfunction_list.update');
    Route::delete('/malfunction_list/delete/{id}', [ChargerController::class, 'deleteMalfunction'])->name('malfunction_list.delete');
    Route::get('/reservation_list', [ChargerController::class, 'reservations_list'])->name('reservation_list');
    Route::get('/reservation_list/edit/{id}', [ChargerController::class, 'editReservation'])->name('reservation_list.edit');
    Route::put('/reservation_list/update/{id}', [ChargerController::class, 'updateReservation'])->name('reservation_list.update');
    Route::delete('/reservation_list/delete/{id}', [ChargerController::class, 'deleteReservation'])->name('reservation_list.delete');
    Route::get('/chargers/edit/{id}', [ChargerController::class, 'edit'])->name('chargers.edit');
    Route::put('/chargers/update/{id}', [ChargerController::class, 'update'])->name('chargers.update');

});
