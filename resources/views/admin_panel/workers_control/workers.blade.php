<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Plug&Go - Twoje Źródło Energii</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/global-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/worker-page/chargers-list.css') }}">
</head>

<x-navbar />
@if (session('notification'))
<x-notify :type="session('notification')['type']" :message="session('notification')['message']" />
@endif

<body>
    <div class="container">
        <h2>Lista <span class="attention">pracowników</span></h2>
        <div class="chargers-list">
            <div class="tbl-header">
                <table cellpadding="0" cellspacing="0" border="0">
                    <thead>
                        <tr>
                            <td>Nazwa Pracownika
                            <td>
                            <td>email
                            <td>
                            <td>Imie
                            <td>
                            <td>Nazwisko</td>
                            <td>Telefon</td>
                            <td>Data urodzenia</td>
                            <td>Akcje</td>
                        </tr>
                    </thead>
                </table>
            </div>
            <div class="tbl-content">
                <table cellpadding="0" cellspacing="0" border="0">
                    <tbody>
                        @foreach($workers as $worker)
                        @if ($worker->permission == 'worker')
                        <tr>
                            <td>{{$worker->username}}</td>
                            <td>{{$worker->email}}</td>
                            <td>{{$worker->first_name}}</td>
                            <td>{{$worker->last_name}}</td>
                            <td>{{$worker->phone}}</td>
                            <td>{{$worker->dob}}</td>
                            <td>
                                <a href="{{ route('admin.worker', $worker->id) }}">✏️ Edytuj</a>
                                <form action="{{ route('admin.worker.delete', $worker->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="border: none; background: none; color: #153131; cursor: pointer;">🗑️ Usuń</button>
                                </form>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>
