<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/global-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/worker-page/malfunctions-list.css') }}">
    <title>Lista awarii</title>
</head>

<body>
    <x-navbar />
    <div class="container">
        <h2>Lista awarii</h2>
        <div class="chargers-list">
            <div class="tbl-header">
                <table cellpadding="0" cellspacing="0" border="0">
                    <thead>
                        <tr>
                            <th>Ładowarka</th>
                            <th>Użytkownik</th>
                            <th>Opis Awari</th>
                            <th>Data Zgłoszenia</th>
                            <th>Akcje</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="tbl-content">
                <table cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                        @foreach($reports as $results)

                        <tr>
                            <td>{{ $results->charger->city }}</td>
                            <td>{{ $results->user->username }}</td>
                            <td>{{ $results->description }}</td>
                            <td>{{ $results->created_at }}</td>
                            <td style="display: flex; justify-items: center; flex-direction: column; align-items: center;">
                                <a href="{{ route('malfunction_list.edit', $results->id) }}">✏️ Edytuj</a>
                                <form action="{{ route('malfunction_list.delete', $results->id) }}" method="POST">
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
