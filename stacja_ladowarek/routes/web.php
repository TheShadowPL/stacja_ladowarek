<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Sub_domainsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChargingHistoryController;
use App\Http\Controllers\workers_panel\ChargerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('', [Sub_domainsController::class, 'index'])->name('home');
Route::get('index', [Sub_domainsController::class, 'index'])->name('home');

// Trasy dostępne dla wszystkich użytkowników
Route::post('register', [authcontroller::class, 'register'])->name('register');
Route::post('login', [authcontroller::class, 'login'])->name('login');

Route::get('/about', function () {
    return view('about');
});

Route::get('/zaloguj', function () {
    return view('zaloguj');
});

Route::get('/rejestracja', function () {
    return view('register');
});

Route::post('logout', [authcontroller::class, 'logout'])->name('logout');


Route::get('chargers', [Sub_domainsController::class, 'chargers'])->name('chargers');
Route::get('/reservation/{charger_id}',[Sub_domainsController::class, 'reservation'])->name('reservation');
Route::get('malfunction', [Sub_domainsController::class, 'malfunction'])->name('malfunction');

Route::get('/about', function () {
    return view('about');
});
Route::get('/zaloguj', function () {
    return view('zaloguj');
});

Route::get('/rejestracja', function () {
    return view('register');
});

//trasy dostępne dla zalogowanych użytkowników w panelu użytkownika

Route::prefix('users_panel')->middleware(['web', 'user'])->group(function () {
    Route::get('charging-history', [ChargingHistoryController::class, 'index'])->name('charge_history');
});

// Trasy dostępne dla pracowników w panelu pracownika
Route::prefix('workers_panel')->middleware(['auth', 'worker'])->group(function () {
    Route::get('/chargers/create', [ChargerController::class, 'create'])->name('chargers.create');
    Route::post('/chargers/store', [ChargerController::class, 'store'])->name('chargers.store');
    Route::get('/chargers', [ChargerController::class, 'index'])->name('chargers.index');
    Route::get('/chargers/edit/{id}', [ChargerController::class, 'edit'])->name('chargers.edit');
    Route::put('/chargers/update/{id}', [ChargerController::class, 'update'])->name('chargers.update');
});



