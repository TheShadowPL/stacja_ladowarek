<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Chargers;
use App\Models\Mallfunctions_List;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Services\OpenStreetMapService;

class Sub_domainsController extends Controller
{
    public function index()
    {
        $user = null;

        if (session()->has('username')) {
            $uname = session('username');
            $user = DB::table('users')->where('username', $uname)->first();
        }

        return view('users_panel.index', ['user' => $user]);
    }

    protected $openStreetMapService;

    public function __construct(OpenStreetMapService $openStreetMapService)
    {
        $this->openStreetMapService = $openStreetMapService;
    }

    public function chargers()
    {
        $user = null;
        $chargers = [];

        if (session()->has('username')) {
            $uname = session('username');
            $user = DB::table('users')->where('username', $uname)->first();
            $chargers = Chargers::all();

            // Lokalizacja użytkownika ustawione na statyczne bo po podpieciu lokalizacji uzytkownika api strasznie dlugo ładowało dane
            $userAddress = 'Wrocław';


            foreach ($chargers as $charger) {
                $userCoordinates = $this->openStreetMapService->getCoordinates($userAddress);
                $chargerCoordinates = $this->openStreetMapService->getCoordinates($charger->fullAddress());

                if ($userCoordinates && $chargerCoordinates) {
                    $distanceInMeters = $this->calculateDistance($userCoordinates, $chargerCoordinates);

                    //api zwraca w metrach XD
                    $distanceInKilometers = $distanceInMeters / 1000;

                    $charger->distance = $distanceInKilometers;
                } else {
                    $charger->distance = null;
                }
            }

            // Sortowanko
            //$chargers = $chargers->sortBy('distance');
        }

        return view('users_panel.ladowarki1', ['user' => $user, 'chargers' => $chargers]);
    }

    private function calculateDistance($userCoordinates, $chargerCoordinates)
    {
        $earthRadius = 6371000;

        $latFrom = deg2rad($userCoordinates['latitude']);
        $lonFrom = deg2rad($userCoordinates['longitude']);
        $latTo = deg2rad($chargerCoordinates['latitude']);
        $lonTo = deg2rad($chargerCoordinates['longitude']);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
            cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));

        return round($angle * $earthRadius);
    }

    public function malfunction()
    {
        $chargers = Chargers::all();
        $notification = [
            'type' =>  null, // success, error, info, warning, null (brak powiadomienia)
            'message' => '' // wiadomość
        ];
        return view('users_panel.malfunction', compact('chargers'))->with('notification', $notification);
    }

    public function malfunction_store(Request $request)
    {
        try{
            $request->validate([
                'charger_id' => 'required',
                'description' => 'required',
            ]);
            $notification = [
                'type' => 'info', // success, error, info, warning
                'message' => 'Zgłoszono Awarie ładowarki!' // wiadomość
            ];

            $uname = session('username');
            $user = DB::table('users')->where('username', $uname)->first();

            Mallfunctions_List::create([
                'charger_id' => $request->charger_id,
                'user_id' => $user->id,
                'reported_time' => now(),
                'description' => $request->description,

            ]);

            return redirect()->back()->with('notification', $notification);
        }
        catch(\Exception $e){
            $notification = [
                'type' => 'error', // success, error, info, warning
                'message' => 'Wystąpił błąd podczas zapisywania usterki. Szczegóły: ' . $e->getMessage() , $request->charger_id, $request->description, $user->id // wiadomość
            ];
            return redirect()->back()->with('notification', $notification);
        }
    }



    public function profile()
    {
        $user = null;

        if (session()->has('username')) {
            $uname = session('username');
            $user = DB::table('users')->where('username', $uname)->first();
        }

        return view('users_panel.profile', ['user' => $user]);
    }

    public function reservation($charger_id)
    {
        $charger = DB::table('ladowarki')->find($charger_id);

        if (!$charger) {
            abort(404);
        }


        return view('users_panel.reservations', ['charger' => $charger]);

    }

    public function storeReservation(Request $request, $charger_id)
    {
        try {
            $request->validate([
                'start_time' => 'required',
                'end_time' => 'required',
            ]);


            $uname = session('username');
            $user = DB::table('users')->where('username', $uname)->first();
            $user_id = $user -> id;
            $charger = DB::table('ladowarki')->find($charger_id);

            $notification = [
                'type' => 'success', // success, error, info, warning
                'message' => 'Rezerwacja zakończona pomyślnie!' // wiadomość
            ];

            DB::table('reservations')->insert([
                'charger_id' => $charger_id,
                'user_id' => $user->id,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
            ]);

            DB::table('ladowarki')->where('id', $charger_id)->update([
                'status' => 'unavailable',
                'closestTerm_date' => $request->end_time,
            ]);

            DB::table('charging_sessions')->insert([
                'user_id' => $user->id,
                'charger_id' => $charger_id,
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
                'energy_charged' => 0,
                'cost' => 0,
                'status' => 'reserved',
                'created_at' => now(),
            ]);

            return redirect()->route('chargers_list')->with('notification', $notification);
        } catch (\Exception $e) {
            // Dodaj obsługę błędu - możesz zalogować błąd lub zwrócić odpowiedni widok
            return redirect()->back()->withErrors([
                'error' => 'Wystąpił błąd podczas zapisywania rezerwacji. Szczegóły: ' . $e->getMessage(),
                'start_time' => $request->start_time,
                'end_time' => $request->end_time,
            ])->withInput($request->all());
        }
    }
}
