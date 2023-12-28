<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj Ładowarkę</title>
    <!-- Dodaj ewentualne stylizacje CSS -->
</head>
<body>
    <h2>Edytuj Ładowarkę</h2>

    <form method="post" action="{{ route('chargers.update', $charger->id) }}">
        @csrf
        @method('PUT')

        <label for="city">Miasto:</label>
        <input type="text" name="city" value="{{ $charger->city }}" required>



        <button type="submit">Zapisz Edycję</button>
    </form>

</body>
</html>
