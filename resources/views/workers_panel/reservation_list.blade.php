<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Ładowarek</title>
</head>
<body>
<x-navbar />
<h2>Lista Ładowarek</h2>
<table>
    <thead>
    <tr>
        <th>|Ładowarka|</th>
        <th>Użytkownik|</th>
        <th>Rozpoczecie Wynajmu|</th>
        <th>Zakonczenie Wynajmu|</th>
        <th>Akcje|</th>
    </tr>
    </thead>
    <tbody>
    @foreach($reservations as $result)
        <tr>
            <td>{{ $result->charger->city }}</td>
            <td>{{ $result->user->username }}</td>
            <td>{{ $result->start_time }}</td>
            <td>{{ $result->end_time }}</td>
            <td>
                <a href="{{ route('chargers.edit', $result->charger->id) }}">Edytuj</a>
                <!-- Dodać kiedyś na controlerze usuwanie stacji -->
            </td>
        </tr>
    @endforeach

    </tbody>
</table>
</body>
</html>
