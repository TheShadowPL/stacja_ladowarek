<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/global-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/register-page/register-form.css') }}">
    <title>Edycja zgłoszenia</title>
    <style>
    </style>
</head>
<x-navbar />

<body>
    <div class="container">
        <h2>Edycja Zgłoszenia</h2>

        <form action="{{ route('malfunction_list.update', $report->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="charger_city">Ładowarka:</label>
            <input type="text" name="charger_city" value="{{ $report->charger->city }}" disabled>

            <label for="user_username">Użytkownik:</label>
            <input type="text" name="user_username" value="{{ $report->user->username }}" disabled>

            <label for="description">Opis usterki:</label>
            <input type="text" name="description" value="{{ $report->description }}">

            <label for="report_time">Data zgłoszenia:</label>
            <input type="text" name="report_time" value="{{ $report->reported_time }}" disabled>


            <button type="submit">Zapisz zmiany</button>
        </form>

        <a href="{{ route('malfunction_list') }}">Powrót do listy</a>
    </div>
</body>

</html>
