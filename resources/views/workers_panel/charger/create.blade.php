<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj nową ładowarkę</title>
</head>

<body>
    <x-navbar />

    <h2>Dodaj nową ładowarkę</h2>

    <form method="post" action="{{ route('chargers.store') }}">
        @csrf
        <label for="city">Miasto:</label>
        <input type="text" name="city" required>

        <label for="street">Ulica:</label>
        <input type="text" name="street" required>

        <label for="number">Numer:</label>
        <input type="text" name="number" required>

        <label for="comment">Komentarz:</label>
        <textarea name="comment"></textarea>

        <label for="status">Status:</label>
        <input type="text" name="status" required>

        <label for="closestTermTime">Najbliższy Termin (czas):</label>
        <input type="text" name="closestTermTime">

        <label for="closestTermDate">Najbliższy Termin (data):</label>
        <input type="text" name="closestTermDate">

        <label for="standard">Standard:</label>
        <input type="text" name="standard" required>

        <label for="power">Moc:</label>
        <input type="text" name="power" required>

        <label for="price">Cena:</label>
        <input type="text" name="price" required>

        <button type="submit">Dodaj Ładowarkę</button>
    </form>

</body>

</html>
