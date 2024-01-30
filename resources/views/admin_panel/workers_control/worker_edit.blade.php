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

<form method="post" action="{{ route('admin.worker.update', $worker->id) }}">
    @csrf
    @method('PUT')

    <label for="username">Nazwa Pracownika:</label>
    <input type="text" name="username" value="{{ $worker->username }}" required>

    <label for="email">Email:</label>
    <input type="text" name="email" value="{{ $worker->email }}" required>

    <label for="first_name">Imie:</label>
    <input type="text" name="first_name" value="{{ $worker->first_name }}" required>

    <label for="last_name">Nazwisko:</label>
    <input type="text" name="last_name" value="{{ $worker->last_name }}" required>

    <label for="phone">Numer Telefonu:</label>
    <input type="number" name="phone" value="{{ $worker->phone }}" required>

    <label for="dob">Data Urodzenia:</label>
    <input type="date" name="dob" value="{{ $worker->dob }}" required>

    <label for="locked">Rola: @if($worker->permission == 'worker' ) Pracownik @else Użytkownik @endif</label>
    <select name="locked" required>
        <option value="false" {{ $worker->permission == 'user' ? 'selected' : '' }}>Użytkownik</option>
        <option value="true" {{ $worker->permission == 'worker' ? 'selected' : '' }}>Pracownik</option>
    </select>
    <br>

    <button type="submit">Zapisz edycję</button>
</form>
</body>
</html>
