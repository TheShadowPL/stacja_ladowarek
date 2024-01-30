<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edycja Rezerwacji</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/global-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/worker-page/edit-reservation.css') }}">
</head>
<x-navbar />
<body>

<h2>Edycja Rezerwacji</h2>

<form action="{{ route('reservation_list.update', $reservation->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label for="charger_city">Ładowarka:</label>
    <input type="text" name="charger_city" value="{{ $reservation->charger->city }}" disabled>

    <label for="user_username">Użytkownik:</label>
    <input type="text" name="user_username" value="{{ $reservation->user->username }}" disabled>

    <label for="start_time">Rozpoczęcie Wynajmu:</label>
    <input type="text" name="start_time" value="{{ $reservation->start_time }}">

    <label for="end_time">Zakończenie Wynajmu:</label>
    <input type="text" name="end_time" value="{{ $reservation->end_time }}">

    <button type="submit">Zapisz zmiany</button>
</form>

<a href="{{ route('reservation_list') }}">Powrót do listy</a>

</body>
</html>
