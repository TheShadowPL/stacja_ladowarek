<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/global-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/worker-page/edit-charger.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Rejestracja</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<x-navbar />


<body>
<div class="container">
    <h1>Tworzenie Ładowarki</h1>
    <form action="{{ route('admin.chargers.store') }}" method="post">
        @csrf
        <label for="city">Miasto:</label>
        <input type="text" name="city" id="city" required>

        <label for="street">Ulica:</label>
        <input type="text" name="street" required>

        <label for="number">Numer:</label>
        <input type="number" name="number" required>

        <label for="comment">Komentarz:</label>
        <textarea name="comment"></textarea>

        <label for="status">Status:</label>
        <select name="status" required>
            <option value="available">Dostępna</option>
            <option value="unavailable">Niedostępna</option>
        </select>

        <label for="standard">Standard:</label>
        <select name="standard" required>
            <option value="CCS">CCS (CCS)</option>
            <option value="CHAdeMO" >CHAdeMO (CHAdeMO)</option>
            <option value="Tesla Supercharger">Tesla Supercharger (Tesla Supercharger)</option>
            <option value="Type2">Type 2 (Type2)</option>
        </select>

        <label for="power">Moc:</label>
        <input type="number" name="power" required>

        <label for="price">Cena:</label>
        <input type="number" name="price" required>

        <label for="locked">Blokada: </label>
        <select name="locked" required>
            <option value="false" >Odblokuj</option>
            <option value="true" >Zablokuj</option>
        </select>

        <button type="submit">Dodaj ładowarke</button>

    </form>


</body>
</html>
