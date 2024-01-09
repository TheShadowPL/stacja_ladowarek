<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;

class authcontroller extends Controller
{
    public function authenticate(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);

            if(Auth::attempt($credentials))
            {
                $request->session()->regenerate();
                return redirect()->route('chargers')
                    ->withSuccess('You have successfully logged in!');
            }

            return back()->withErrors([
                'email' => 'Your provided credentials do not match in our records.',
            ])->onlyInput('email');

        } catch (\Exception $e) {
            return response()->json(['status' => 'error-reg', 'message' => $e->getMessage()]);
        }
    }

    public function register(Request $request)
    {
        try {
            $username = $request->input('username');
            $email = $request->input('email');
            $pass = $request->input('pass');
            $passCheck = $request->input('passCheck');
            $firstName = $request->input('firstName');
            $lastName = $request->input('lastName');
            $dob = $request->input('dob');
            $phone = $request->input('phone');

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return response()->json(['status' => 'error-reg', 'message' => 'Nieprawidłowy adres email']);
            }

            if ($firstName == '' || $lastName == '' ) { //|| $dob == ''
                return response()->json(['status' => 'error-reg', 'message' => 'Wypełnij wszystkie pola']);
            }

            if ($passCheck != $pass) {
                return response()->json(['status' => 'error-reg', 'message' => 'Powtórz poprawnie hasło']);
            }

            $user = DB::table('users')->where('username', $username)->first();

            if (!$user) {
                $createdUser = DB::table('users')->insertGetId([
                    'username' => $username,
                    'email' => $email,
                    'password' => Hash::make($pass),
                    'first_name' => $firstName,
                    'last_name' => $lastName,
                    'dob' => $dob,
                    'phone' => $phone,
                ]);
                Auth::loginUsingId($createdUser);

                return response()->json(['status' => 'success-reg', 'message' => 'Rejestracja udana']);
            } else {
                return response()->json(['status' => 'error-reg', 'message' => 'Użytkownik o podanym loginie już istnieje']);
            }
        } catch (\Exception $e) {
            return response()->json(['status' => 'error-reg', 'message' => $e->getMessage()]);
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('home');
    }
}
