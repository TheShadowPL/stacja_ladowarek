<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stacja Ładowarek - Twoje Źródło Energii</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/global-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/history-page/history.css') }}">

</head>

<body>
    <x-navbar />
    <h2>Historia <span class="attention">ładowań</span></h2>

    @if($chargingSessions->isEmpty())
    <p>Brak dostępnych danych o ładowaniach.</p>
    @else
    <table>
        <thead class="tbl-header">
            <tr>
                <th>Data rozpoczęcia</th>
                <th>Data zakończenia</th>
                <th>Ilość naładowanej energii</th>
                <th>Koszt</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody class="tbl-content">
            @foreach($chargingSessions as $session)
            <tr>
                <td>{{ $session->start_time }}</td>
                <td>{{ $session->end_time }}</td>
                <td>{{ $session->energy_charged }}</td>
                <td>{{ $session->cost }}</td>
                <td>{{ $session->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</body>

</html>
