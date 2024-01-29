<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/global-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/worker-page/reservation-list.css') }}">
    <title>Lista rezerwacji</title>
</head>

<body>
    <x-navbar />
    <div class="container">
        <h2>Lista <span class="attention">rezerwacji</span></h2>
        <div class="chargers-list">
            <div class="tbl-header">
                <table cellpadding="0" cellspacing="0" border="0">
                    <thead>
                        <tr>
                            <th>Ładowarka</th>
                            <th>Użytkownik</th>
                            <th>Rozpoczecie Wynajmu</th>
                            <th>Zakonczenie Wynajmu</th>
                            <th>Akcje</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="tbl-content">
                <table cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                        @foreach($reservations as $result)
                        <tr>
                            <td>{{ $result->charger->city }}</td>
                            <td>{{ $result->user->username }}</td>
                            <td>{{ $result->start_time }}</td>
                            <td>{{ $result->end_time }}</td>
                            <td style="display: flex; justify-items: center; flex-direction: column; align-items: center;">
                                <a href="{{ route('reservation_list.edit', $result->id) }}">✏️ Edytuj</a>
                                <form action="{{ route('reservation_list.delete', $result->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="border: none; background: none; color: #153131; cursor: pointer;">🗑️ Usuń</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
