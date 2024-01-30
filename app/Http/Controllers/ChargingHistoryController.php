<?php

namespace App\Http\Controllers;
// app/Http/Controllers/ChargingHistoryController.php

use Illuminate\Http\Request;
use App\Models\ChargingSession;
class ChargingHistoryController extends Controller
{
    public function index()
    {
        $notification = [
            'type' => null, // success, error, info, warning
            'message' => 'Anulowano Rezerwację!' // wiadomość
        ];
        $chargingSessions = ChargingSession::where('user_id', auth()->id())->latest()->get();
        $futureReservations = $chargingSessions;
        $currentReservations = $chargingSessions;

        return view('users_panel.charge_history', compact('chargingSessions', 'futureReservations', 'currentReservations'))->with('notification', $notification);
    }

    public function delete($id)
    {
        $notification = [
            'type' => 'info', // success, error, info, warning
            'message' => 'Anulowano Rezerwację' // wiadomość
        ];
        $chargingSession = ChargingSession::findOrFail($id);
        $chargingSession->delete();

        return redirect()->route('charge_history')->with('notification', $notification);
    }
}
