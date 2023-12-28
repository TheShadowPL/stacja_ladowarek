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
        $user = null;

        if (session()->has('username')) {
            $uname = session('username');
            $user = DB::table('users')->where('username', $uname)->first();
        }

        return view('index', ['user' => $user]);
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

        return view('ladowarki1', ['user' => $user, 'chargers' => $chargers]);
    }

    public function malfunction()
    {
        return view('malfunction');
    }



    public function profile()
    {
        $user = null;

        if (session()->has('username')) {
            $uname = session('username');
            $user = DB::table('users')->where('username', $uname)->first();
        }

        return view('profile', ['user' => $user]);
    }
}
