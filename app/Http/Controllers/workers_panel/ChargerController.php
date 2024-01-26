<?php

namespace App\Http\Controllers\workers_panel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Chargers;
use App\Models\Mallfunctions_List;
use App\Models\Reservation_list;
use Illuminate\Database\QueryException;
class ChargerController extends Controller
{
    public function index()
    {
        $chargers = Chargers::all();
        $notification = [
            'type' => null,
            'message' => null
        ];
        return view('workers_panel.charger.index', compact('chargers', 'notification'));
    }

    public function worker_page()
    {
        $notification = [
            'type' => null,
            'message' => 'Siema Murzynie!'
        ];
        return view('workers_panel.index', compact('notification'));
    }

    public function mallfunction_list()
    {

        $reports = Mallfunctions_List::with('user', 'charger')->get();
        return view('workers_panel.malfunction_list' ,compact('reports'));

    }

    public function editMalfunction($id)
    {
        $report = Mallfunctions_List::find($id);
        return view('workers_panel.malfunction_list_edit', compact('report'));
    }

    public function updateMalfunction(Request $request, $id)
    {
        $report = Mallfunctions_List::find($id);
        $report->update($request->all());

        return redirect()->route('malfunction_list.edit', $id)->with('success', 'Usterka została zaktualizowana.');
    }

    public function deleteMalfunction($id)
    {
        $report = Mallfunctions_List::find($id);
        $report->delete();

        return redirect()->route('malfunction_list')->with('success', 'Usterka została usunięta.');
    }

    public function reservations_list()
    {
        $reservations = Reservation_list::with('user', 'charger')->get();
        return view('workers_panel.reservation_list', compact('reservations'));
    }
    public function edit($id)
    {
        $charger = Chargers::findOrFail($id);
        return view('workers_panel.charger.edit', compact('charger'));
    }

    public function delete($id)
    {
        try {
            $charger = Chargers::findOrFail($id);
            $charger->delete();
        } catch (QueryException $e) {
            $notification = [
                'type' => 'error',
                'message' => 'Nie można usunąć ładowarki, ponieważ jest przypisana do rezerwacji!'
            ];

            session()->flash('notification_chargers_index', $notification);

            return redirect()->route('chargers.index');
        }
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

    public function editReservation($id)
    {
        $reservation = Reservation_list::find($id);
        return view('workers_panel.reservation_list_edit', compact('reservation'));
    }

    public function updateReservation(Request $request, $id)
    {
        $reservation = Reservation_list::find($id);
        $reservation->update($request->all());

        return redirect()->route('reservation_list.edit', $id)->with('success', 'Rezerwacja została zaktualizowana.');
    }

    public function deleteReservation($id)
    {
        $reservation = Reservation_list::find($id);
        $reservation->delete();

        return redirect()->route('reservation_list')->with('success', 'Rezerwacja została usunięta.');
    }
}
