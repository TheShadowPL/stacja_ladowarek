<?php

namespace App\Http\Controllers\workers_panel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Chargers;
use App\Models\Mallfunctions_List;
use App\Models\Reservation_list;
class ChargerController extends Controller
{
    public function index()
    {
        $chargers = Chargers::all();
        return view('workers_panel.charger.index', compact('chargers'));
    }

    public function worker_page()
    {
        return view('workers_panel.index');
    }

    public function mallfunction_list()
    {

        $reports = Mallfunctions_List::all();
        $user = User::all();
        $charger = Chargers::all();
        return view('workers_panel.malfunction_list' ,compact('reports','user','charger'));


    }

    public function reservations_list()
    {
        $reservations = Reservation_list::all();
        $user = User::all();
        $charger = Chargers::all();
        return view('workers_panel.reservation_list', compact('reservations', 'user', 'charger'));

    }

    public function edit($id)
    {
        $charger = Chargers::findOrFail($id);
        return view('workers_panel.charger.edit', compact('charger'));
    }

    public function update(Request $request, $id)
    {
        $charger = Chargers::findOrFail($id);
        $charger->update($request->all());



        return redirect()->route('chargers.index')->with('success', 'Ładowarka zaktualizowana pomyślnie!');
    }

    public function create()
    {
        return view('workers_panel.charger.create');
    }

    public function store(Request $request)
    {
        $charger = Chargers::create($request->all());


        return redirect()->route('chargers.create')->with('success', 'Ładowarka dodana pomyślnie!');
    }
}
