<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class authcontroller extends Controller
{
    public function login(Request $request)
    {
        try {
            $usernameEmail = $request->input('usernameEmail');
            $pass = $request->input('pass');

            $user = DB::table('users')->
            where('username', 'LIKE', $usernameEmail)->
            orWhere('email', 'LIKE', $usernameEmail)->
            first();

            if (!$user)
                return response()->json(['status' => 'error-log', 'message' => 'Błąd logowania: użytkownik nie istnieje']);

            if (Hash::check($pass, $user->password)) {
                session()->put('username', $user->username);
                session()->put('userid', $user->id);

                return response()->json(['status' => 'success-log', 'message' => 'Zalogowano pomyślnie']);
            } else
                return response()->json(['status' => 'error-log', 'message' => 'Błąd logowania: nieprawidłowe hasło']);
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

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return response()->json(['status' => 'error-reg', 'message' => 'Nieprawidłowy adres email']);
            }

            if ($passCheck != $pass) {
                return response()->json(['status' => 'error-reg', 'message' => 'Powtórz poprawnie hasło']);
            }

            $user = DB::table('users')->where('username', $username)->first();

            if (!$user) {
                DB::table('users')->insert([
                    'username' => $username,
                    'email' => $email,
                    'password' => Hash::make($pass),
                ]);

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
