<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\Sub_domainsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChargingHistoryController;

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

Route::middleware(['auth'])->group(function () {
    Route::get('user/charging-history', [ChargingHistoryController::class, 'index'])->name('users_panel.charge_history');
});

Route::post('register', [authcontroller::class, 'register']) -> name('register');
Route::post('login', [authcontroller::class, 'login']) -> name('login');
Route::post('logout', [authcontroller::class, 'logout']) -> name('logout');



