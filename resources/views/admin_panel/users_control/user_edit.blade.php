<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Plug&Go - Twoje Źródło Energii</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/global-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/worker-page/edit-charger.css') }}">
</head>

<x-navbar />
@if (session('notification'))
    <x-notify :type="session('notification')['type']" :message="session('notification')['message']" />
@endif
<body>
<x-navbar />
<h2>Edytuj Dane Pracownika</h2>

<form method="post" action="{{ route('admin.users.update', $user->id) }}">
    @csrf
    @method('PUT')

    <label for="username">Nazwa Użytkownika:</label>
    <input type="text" name="username" value="{{ $user->username }}" required>

    <label for="email">Email:</label>
    <input type="text" name="email" value="{{ $user->email }}" required>

    <label for="first_name">Imie:</label>
    <input type="text" name="first_name" value="{{ $user->first_name }}" required>

    <label for="last_name">Nazwisko:</label>
    <input type="text" name="last_name" value="{{ $user->last_name }}" required>

    <label for="phone">Numer Telefonu:</label>
    <input type="number" name="phone" value="{{ $user->phone }}" required>

    <label for="dob">Data Urodzenia:</label>
    <input type="date" name="dob" value="{{ $user->dob }}" required>

    <label for="locked">Rola: @if($user->permission == 'user' ) Użytkownik @else Pracownik @endif</label>
    <select name="locked" required>
        <option value="false" {{ $user->permission == 'user' ? 'selected' : '' }}>Użytkownik</option>
        <option value="true" {{ $user->permission == 'worker' ? 'selected' : '' }}>Pracownik</option>
    </select>
    <br>

    <button type="submit">Zapisz edycję</button>
</form>
</body>
</html>
