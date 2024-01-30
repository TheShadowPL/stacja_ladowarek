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
        <select name="status" required>
            <option value="available" {{ $charger->status == 'available' ? 'selected' : '' }}>Dostępna</option>
            <option value="unavailable" {{ $charger->status == 'unavailable' ? 'selected' : '' }}>Niedostępna</option>
        </select>

        <label for="standard">Standard:</label>
        <select name="standard" required>
            <option value="CCS" {{ $charger->standard == 'CCS' ? 'selected' : '' }}>CCS (CCS)</option>
            <option value="CHAdeMO" {{ $charger->standard == 'CHAdeMO' ? 'selected' : '' }}>CHAdeMO (CHAdeMO)</option>
            <option value="Tesla Supercharger" {{ $charger->standard == 'Tesla Supercharger' ? 'selected' : '' }}>Tesla Supercharger (Tesla Supercharger)</option>
            <option value="Type2" {{ $charger->standard == 'Type2' ? 'selected' : '' }}>Type 2 (Type2)</option>
        </select>

        <label for="power">Moc:</label>
        <input type="text" name="power" value="{{ $charger->power }}" required>

        <label for="price">Cena:</label>
        <input type="text" name="price" value="{{ $charger->price }}" required>

        <label for="locked">Blokada: @if($charger->locked == 'false' ) Odblokowana @else Zablokowana @endif</label>
        <select name="locked" required>
            <option value="false" {{ $charger->locked == 'false' ? 'selected' : '' }}>Odblokuj</option>
            <option value="true" {{ $charger->locked == 'true' ? 'selected' : '' }}>Zablokuj</option>
        </select>
        <br>

        <button type="submit">Zapisz edycję</button>
    </form>

</body>

</html>
