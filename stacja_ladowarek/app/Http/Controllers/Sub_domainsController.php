<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class Sub_domainsController extends Controller
{
    public function index()
    {
        if (session()->has('username')) {
            $uname = session('username');
            $user = DB::table('users')->where('username', $uname)->first();

            if(!$user)
                return view('index');

            return view('index', ['user' => $user]);
        }

        return view('index');
    }

    public function chargers()
    {
        if (session()->has('username')) {
            $uname = session('username');
            $user = DB::table('users')->where('username', $uname)->first();
            $chargers = DB::table('ladowarki')->get();

            if(!$user)
                return view('index');

            return view('ladowarki1', ['user' => $user, 'chargers' => $chargers]);
        }


        return view('index');
    }

    public function malfunction()
    {
        return view('malfunction');
    }



    public function profile()
    {
        if (session()->has('username')) {
            $uname = session('username');
            $user = DB::table('users')->where('username', $uname)->first();

            if (!$user)
                return view('home');

            return view('profile', ['user' => $user]);
        }

        return view('home');
    }
}
