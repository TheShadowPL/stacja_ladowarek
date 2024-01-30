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
@if (session('notification'))
    <x-notify :type="session('notification')['type']" :message="session('notification')['message']" />
@endif
<h2>Przyszłe <span class="attention">Rezerwacje</span></h2>

@if($futureReservations->isEmpty())
    <p>Brak dostępnych danych o planowanych rezerwacjach.</p>
@else
    <table>
        <thead class="tbl-header">
        <tr>
            <th>Miasto</th>
            <th>Data rozpoczęcia</th>
            <th>Data zakończenia</th>
            <th>Koszt</th>
            <th>Status</th>
            <th>Akcje</th>
        </tr>
        </thead>
        <tbody class="tbl-content">
        @foreach($futureReservations as $reservation)
            @php
                $currentTime = now();
                $startTime = \Carbon\Carbon::parse($reservation->start_time);
            @endphp
            @if($startTime->gt($currentTime))
                <tr>
                    <td>{{ $reservation->charger->city }}</td>
                    <td>{{ $reservation->start_time }}</td>
                    <td>{{ $reservation->end_time }}</td>
                    <td>{{ $reservation->cost }}</td>
                    <td>@if ($reservation->status == 'reserved') Zarezerwowana @endif</td>
                    <td>
                        <form action="{{ route('charge_history.delete', $reservation->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="border: none; background: none; color: #153131; cursor: pointer;">🗑️ Anuluj</button>
                        </form>
                    </td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
@endif

<h2>Trwające <span class="attention">Rezerwacje</span></h2>

@if($currentReservations->isEmpty())
    <p>Brak trwających rezerwacji.</p>
@else
    <table>
        <thead class="tbl-header">
        <tr>
            <th>Miasto</th>
            <th>Data rozpoczęcia</th>
            <th>Data zakończenia</th>
            <th>Koszt</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody class="tbl-content">
        @foreach($currentReservations as $reservation)
            @php
                $currentTime = now();
                $startTime = \Carbon\Carbon::parse($reservation->start_time);
            @endphp
            @if($startTime->lt($currentTime))
                <tr>
                    <td>{{ $reservation->charger->city }}</td>
                    <td>{{ $reservation->start_time }}</td>
                    <td>{{ $reservation->end_time }}</td>
                    <td>{{ $reservation->cost }}</td>
                    <td style="border: none; background: none; color: #153131; cursor: pointer;">@if ($reservation->status == 'reserved') Trwająca @endif</td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
@endif

<h2>Historia <span class="attention">Ładowań</span></h2>

@if($chargingSessions->isEmpty())
    <p>Brak dostępnych danych o ładowaniach.</p>
@else
    <table>
        <thead class="tbl-header">
        <tr>
            <th>Miasto</th>
            <th>Data rozpoczęcia</th>
            <th>Data zakończenia</th>
            <th>Koszt</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody class="tbl-content">
        @foreach($chargingSessions as $session)
            @php
                $currentTime = now();
                $startTime = \Carbon\Carbon::parse($session->end_time);
            @endphp
            @if($startTime->lt($currentTime))
                <tr>
                    <td>{{ $session->charger->city }}</td>
                    <td>{{ $session->start_time }}</td>
                    <td>{{ $session->end_time }}</td>
                    <td>{{ $session->cost }}</td>
                    <td style="border: none; background: none; color: #153131; cursor: pointer;">@if ($reservation->status == 'reserved') Zakonczony @endif</td>
                </tr>
            @endif
        @endforeach
        </tbody>
    </table>
@endif

</body>

</html>
