<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Redirect_Controler extends Controller
{
    public function login()
    {
        $notification = [
            'type' => 'success', // success, error, info, warning
            'message' => 'Zalogowano Pomyślnie!' // wiadomość
        ];
        return view('preloadings.login_redirect', compact('notification'));
    }
    public function register()
    {
        $notification = [
            'type' => 'info', // success, error, info, warning
            'message' => 'Zarejestrowano i zalogowano pomyslnie!' // wiadomość
        ];
        return view('preloadings.register_redirect', compact('notification'));
    }

    public function chargers_list()
    {
        $notification = [
            'type' => 'warning', // success, error, info, warning
            'message' => 'Ładowanie Listy ładowarek!' // wiadomość
        ];
        return view('preloadings.chargers_list', compact('notification'));
    }
    //
}
