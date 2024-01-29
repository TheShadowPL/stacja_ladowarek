<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/global-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/malfunction-page/malfunction-page.css') }}">

    <title>Zgłoś awarie</title>
</head>

<body>
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Błąd!</strong> Wystąpił problem podczas zapisywania usterki.
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('malfunction.store') }}" method="POST">
            @csrf
            <h2 class="exclamation">!</h2>
            <h1>Zgłoś awarie</h1>
            <label for="login">Wybierz ładowarke</label>
            <select name="charger_id" id="charger_id">
                @foreach($chargers as $charger)
                <option value="{{ $charger->id }}">{{ $charger->city }} ul. {{ $charger->street }} {{$charger->number}}</option>
                @endforeach
            </select>
            <label for="description">Opis awarii:</label>
            <textarea name="description" rows="4" cols="50" placeholder="Opisz awarię" required></textarea>
            <br />
            &nbsp
            <button type="submit">Zgłoś</button>
        </form>
    </div>
</body>

</html>
