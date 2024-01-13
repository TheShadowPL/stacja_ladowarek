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
    @foreach($reports as $results)
        @foreach($charger as $chargers)
            @foreach($user as $users)
                <tr>
                    <td>{{$charger -> id($results->charger_id)}}</td>
                    <td>{{$user -> id($results->user_id)}}</td>
                    <td>{{$results -> desc}}</td>
                    <td>{{$results -> start_time}}</td>
                    <td>{{$results -> end_time}}</td>
                    <td>
                        <a href="{{ route('chargers.edit', $results->id) }}">Edytuj</a>
                        <!-- Dodać kiedys na controlerze ze usunieto stacje  -->
                    </td>
                </tr>
            @endforeach
        @endforeach
    @endforeach

    </tbody>
</table>
</body>
</html>
