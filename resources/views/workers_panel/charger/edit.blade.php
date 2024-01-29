<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/global-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/worker-page/edit-charger.css') }}">
    <title>Edytuj ładowarkę</title>
    <!-- Dodaj ewentualne stylizacje CSS -->
</head>

<body>
    <x-navbar />
    <h2>Edytuj ładowarkę</h2>

    <form method="post" action="{{ route('chargers.update', $charger->id) }}">
        @csrf
        @method('PUT')

        <label for="city">Miasto:</label>
        <input type="text" name="city" value="{{ $charger->city }}" required>

        <label for="street">Ulica:</label>
        <input type="text" name="street" value="{{ $charger->street }}" required>

        <label for="number">Numer:</label>
        <input type="text" name="number" value="{{ $charger->number }}" required>

        <label for="status">Status:</label>
        <input type="text" name="status" value="{{ $charger->status }}" required>

        <label for="standard">Standard:</label>
        <input type="text" name="standard" value="{{ $charger->standard }}" required>

        <label for="power">Moc:</label>
        <input type="text" name="power" value="{{ $charger->power }}" required>

        <label for="price">Cena:</label>
        <input type="text" name="price" value="{{ $charger->price }}" required>

        <button type="submit">Zapisz edycję</button>
    </form>

</body>

</html>
