<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/global-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/reservation-page/reservation-page.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Wynajmij</title>

</head>

<body>
    <x-navbar />
    <div class="container">
        <section class="left-container">
            <h1><span class="attention">Zarezerwuj</span> ładowarkę</h1>


            <form action="{{ route('reservation.store', $charger->id) }}" method="post">
                @csrf

                <p><b>Miasto</b><br><span class="attention">{{ $charger->city }}</span></p>
                <p><b>Ulica</b><br><span class="attention">{{ $charger->street }} {{ $charger->number }}</span></p>
                <p><label for="start_time">Data rozpoczęcia</label>
                    <br>
                    <input type="datetime-local" name="start_time" required>
                </p>
                <p>
                    <label for="end_time">Data zakończenia</label>
                    <br>
                    <input type="datetime-local" name="end_time" required>
                </p>


                <button type="submit">Zarezerwuj ładowarkę</button>
            </form>
        </section>
        <section class="right-container"></section>
    </div>

</body>

</html>
