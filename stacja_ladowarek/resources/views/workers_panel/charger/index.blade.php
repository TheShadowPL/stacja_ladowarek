<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Ładowarek</title>
</head>
<body>

    <h2>Lista Ładowarek</h2>

    <table>
        <thead>
        <tr>
            <th>Miasto</th>
            <th>Ulica</th>
            <th>Numer</th>
            <th>Status</th>
            <th>Standard</th>
            <th>Moc</th>
            <th>Cena</th>
            <th>Akcje</th>
        </tr>
        </thead>
        <tbody>
        @foreach($chargers as $charger)
            <tr>
                <td>{{ $charger->city }}</td>
                <td>{{ $charger->street }}</td>
                <td>{{ $charger->number }}</td>
                <td>{{ $charger->status }}</td>
                <td>{{ $charger->standard }}</td>
                <td>{{ $charger->power }}</td>
                <td>{{ $charger->price }}</td>
                <td>
                    <a href="{{ route('chargers.edit', $charger->id) }}">Edytuj</a>
                    <!-- Dodać kiedys na controlerze ze usunieto stacje  -->
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>
