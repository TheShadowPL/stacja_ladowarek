<?php

namespace App\Http\Controllers\admin_panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Chargers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function index()
    {
        return view('admin_panel.index');
    }

    public function users()
    {
        $users = User::all();
        return view('admin_panel.users_control.users' , compact('users'));
    }

    public function edit_user($id)
    {
        $user = User::find($id);
        return view('admin_panel.users_control.user_edit' , compact('user'));
    }

    public function update_user(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        $notification = [
            'type' => 'success', // success, error, info, warning
            'message' => 'Zaktualizowano Dane Użytkownika!' // wiadomość
        ];


        return redirect()->route('admin.users')->with('notification', $notification);
    }

    public function delete_user($id)
    {
        $user = User::find($id);
        $user->delete();

        $notification = [
            'type' => 'success', // success, error, info, warning
            'message' => 'Użytkownik Zostal usunięty.' // wiadomość
        ];

        return redirect()->route('admin.users')->with('notification', $notification);
    }

    public function create_user()
    {
        return view('admin_panel.users_control.user_create');
    }

    public function store_user(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed',
            'first_name' => 'required|string|max:250',
            'last_name' => 'required|string|max:250',
            'phone_number' => 'required|string|max:20',
            'dob' => 'required|date',



        ]);

        User::create([
            'username' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone_number,
            'dob' => $request->dob,
            'permission' => 'user',
        ]);

        $notification = [
            'type' => 'info', // success, error, info, warning
            'message' => 'Użytkownik Zostal Dodany.' // wiadomość
        ];


        return redirect()->route('admin.users')->with('notification', $notification);
    }

    public function worker_list()
    {
        $workers = User::all();
        return view('admin_panel.workers_control.workers' , compact('workers'));
    }

    public function edit_worker($id)
    {
        $worker = User::find($id);
        return view('admin_panel.workers_control.worker_edit' , compact('worker'));
    }

    public function update_worker(Request $request, $id)
    {
        $worker = User::findOrFail($id);
        $worker->update($request->all());
        $notification = [
            'type' => 'success', // success, error, info, warning
            'message' => 'Zaktualizowano Dane Pracownika!' // wiadomość
        ];


        return redirect()->route('admin.worker_list')->with('notification', $notification);
    }

    public function delete_worker($id)
    {
        $worker = User::find($id);
        $worker->delete();

        $notification = [
            'type' => 'success', // success, error, info, warning
            'message' => 'Pracownik Zostal usunięty.' // wiadomość
        ];

        return redirect()->route('admin.worker_list')->with('notification', $notification);
    }

    public function create_worker()
    {
        return view('admin_panel.workers_control.worker_create');
    }

    public function store_worker(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users',
            'password' => 'required|min:8|confirmed',
            'first_name' => 'required|string|max:250',
            'last_name' => 'required|string|max:250',
            'phone_number' => 'required|string|max:20',
            'dob' => 'required|date',



        ]);

        User::create([
            'username' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone_number,
            'dob' => $request->dob,
            'permission' => 'worker',
        ]);

        $notification = [
            'type' => 'info', // success, error, info, warning
            'message' => 'Pracownik Zostal Dodany.' // wiadomość
        ];


        return redirect()->route('admin.worker_list')->with('notification', $notification);
    }


    public function create_charger()
    {
        return view('admin_panel.chargers_control.charers_crearte');
    }

    public function store_charger(Request $request)
    {
        $request->validate([
            'city' => 'required|string|max:250',
            'street' => 'required|string|max:250',
            'number' => 'required|integer|max:250',
            'comment' => 'required|string|max:250',
            'status' => 'required|string|max:250',
            'standard' => 'required|string|max:250',
            'power' => 'required|integer',
            'price' => 'required|integer',
            'locked' => 'required|string|max:250'
        ]);

        Chargers::create([
            'city' => $request->city,
            'street' => $request->street,
            'number' => $request->number,
            'comment' => $request->comment,
            'status' => $request->status,
            'standard' => $request->standard,
            'power' => $request->power,
            'price' => $request->price,
            'locked' => $request->locked,
        ]);

        $notification = [
            'type' => 'info', // success, error, info, warning
            'message' => 'Ładowarka została dodana.' // wiadomość
        ];

        return redirect()->route('admin.index')->with('notification', $notification);
    }







}
