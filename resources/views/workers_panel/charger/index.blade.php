<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/global-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/worker-page/chargers-list.css') }}">
    <title>Lista ładowarek</title>
</head>

<body>
    <x-navbar />
    @if (session()->has('notification_chargers_index'))
    <x-notify :type="session('notification_chargers_index.type')" :message="session('notification_chargers_index.message')" />
    @endif
    <div class="container">
        <h2>Lista <span class="attention">ładowarek</span></h2>
        <div class="chargers-list">
            <div class="tbl-header">
                <table cellpadding="0" cellspacing="0" border="0">
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
                </table>
            </div>
            <div class="tbl-content">
                <table cellpadding="0" cellspacing="0" border="0">
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
                                <a href="{{ route('chargers.edit', $charger->id) }}">✏️ Edytuj</a>
                                <form method="post" action="">
                                    @csrf
                                    @method('DELETE')
                                    <a class="bin-icon" href="{{ route('chargers.delete', $charger->id) }}">🗑️ Usuń</a>
                                </form>
                                <!-- Dodać kiedys na controlerze ze usunieto stacje  -->
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
