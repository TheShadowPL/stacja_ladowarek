<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function chargers()
    {
        $user = null;
        $chargers = [];

        if (session()->has('username')) {
            $uname = session('username');
            $user = DB::table('users')->where('username', $uname)->first();
            $chargers = DB::table('ladowarki')->get();
        }

        return view('users_panel.ladowarki1', ['user' => $user, 'chargers' => $chargers]);
    }

    public function malfunction()
    {
        return view('users_panel.malfunction');
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

        $request->validate([
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
        ]);

        $uname = session('username');
        $user = DB::table('users')->where('username', $uname)->first();
        $charger = DB::table('ladowarki')->find($charger_id);

        DB::table('reservations')->insert([
            'charger_id' => $charger_id,
            'user_id' => $uname,
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


        return redirect()->route('index')
            ->withSuccess('Rezerwacja zakończona pomyślnie!');

        //return redirect()->route('index')->with('success', 'Rezerwacja zakończona pomyślnie!');
    }
}
