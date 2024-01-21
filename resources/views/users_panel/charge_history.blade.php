<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stacja Ładowarek - Twoje Źródło Energii</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
    body {
        margin: 0;
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        color: #333;
    }

    .x-navbar {
        background-color: #007bff;
        padding: 1rem;
    }

    .x-navbar a {
        color: #fff;
        text-decoration: none;
        margin-right: 20px;
    }

    h1 {
        text-align: center;
        color: #007bff;
    }

    p {
        text-align: center;
        margin: 20px 0;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    thead {
        background-color: #007bff;
        color: #fff;
    }

    th, td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    tbody tr:hover {
        background-color: #f9f9f9;
    }
</style>

</head>
<body>
    <x-navbar/>
    <br>
    <br>
    <h1>Historia ładowań</h1>

    @if($chargingSessions->isEmpty())
        <p>Brak dostępnych danych o ładowaniach.</p>
    @else
        <table>
            <thead>
            <tr>
                <th>Data rozpoczęcia</th>
                <th>Data zakończenia</th>
                <th>Ilość naładowanej energii</th>
                <th>Koszt</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
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
