<?php

namespace App\Http\Controllers;
// app/Http/Controllers/ChargingHistoryController.php

use Illuminate\Http\Request;
use App\Models\ChargingSession;
class ChargingHistoryController extends Controller
{
    public function index()
    {
        // Pobierz wszystkie sesje ładowań dla zalogowanego użytkownika
        $chargingSessions = ChargingSession::where('user_id', auth()->id())->latest()->get();

        return view('users_panel.charge_history', compact('chargingSessions'));
    }
}
