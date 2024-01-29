<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/global-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/profile-page/profile.css') }}">

    <title>Profil</title>
</head>

<body>
    <x-navbar />
    <div class="container">
        <h2 class="attention">Profil</h2>
        <div class="avatar"></div>
        <a class="button_a" href="{{route('charge_history')}}">Historia ładowań</a>
    </div>
</body>

</html>
