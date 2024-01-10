<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/global-form.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Wynajmij</title>

</head>
<body>
<x-navbar />
<div class="container">
    <h1> Zarezerwuj ładowarkę</h1>
    <p>Miasto: {{ $charger->city }}</p>
    <p>Ulica: {{ $charger->street }} {{ $charger->number }}</p>


    <form action="{{ route('reservation.store', $charger->id) }}" method="post">
        @csrf

        <div>
            <label for="start_time">Data rozpoczęcia:</label>
            <input type="datetime-local" name="start_time" required>
        </div>

        <div>
            <label for="end_time">Data zakończenia:</label>
            <input type="datetime-local" name="end_time" required>
        </div>



        <button type="submit">Zarezerwuj ładowarkę</button>
    </form>
</div>

</body>
</html>
