<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginRegisterController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'index'
        ]);
    }


    public function register()
    {
        return view('auth.register');
    }


    public function store(Request $request)
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
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        session(['username' => Auth::user()->username]);
        $request->session()->regenerate();
        return redirect()->route('chargers')
            ->withSuccess('Pomyślnie zarejestrowano oraz zalogowano!');
    }


    public function login()
    {
        return view('auth.zaloguj');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials))
        {
            session(['username' => Auth::user()->username]);
            $request->session()->regenerate();
            return redirect()->route('chargers')
                ->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'email' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('email');

    }


    public function dashboard()
    {
        if(Auth::check())
        {
            return view('auth.dashboard');
        }

        return redirect()->route('login')
            ->withErrors(['email' => 'Musiz sie zalogować aby przejść dalej.',])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('Zostałeś wylogowany!');
    }

}
