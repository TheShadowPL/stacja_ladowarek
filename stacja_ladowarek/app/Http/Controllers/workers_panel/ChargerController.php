<?php

namespace App\Http\Controllers\workers_panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Charger;

class ChargerController extends Controller
{
    public function index()
    {
        $chargers = Charger::all();
        return view('workers_panel.charger.index', compact('chargers'));
    }

    public function edit($id)
    {
        $charger = Charger::findOrFail($id);
        return view('workers_panel.charger.edit', compact('charger'));
    }

    public function update(Request $request, $id)
    {
        $charger = Charger::findOrFail($id);
        $charger->update($request->all());



        return redirect()->route('chargers.index')->with('success', 'Ładowarka zaktualizowana pomyślnie!');
    }

    public function create()
    {
        return view('workers_panel.charger.create');
    }

    public function store(Request $request)
    {
        $charger = Charger::create($request->all());


        return redirect()->route('chargers.create')->with('success', 'Ładowarka dodana pomyślnie!');
    }
}
