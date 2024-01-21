<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/global-form.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/malfunction-page/malfunction-page.css') }}">

    <title>Profil</title>
</head>

<body>
<x-navbar/>
<div class="container">
    <br>
    <a href="{{route('charge_history')}}">Historia ładowań</a>
    <form action="">
        <h1>Profil</h1>
        <label for="login">Imię</label>
        <input type="text" name="login" id="">
        <br />
        &nbsp
        <label for="login">Nazwisko</label>
        <input type="text" name="login" id="">
        <br />
        &nbsp
        <label for="login">Email</label>
        <input type="text" name="login" id="">
        <br />
        &nbsp
        <label for="login">Hasło</label>
        <input type="text" name="login" id="">
        <br />
        &nbsp
        <label for="login">Powtórz hasło</label>
        <input type="text" name="login" id="">
        <br />
        &nbsp
        <button type="submit">Zapisz</button>
    </form>


</div>
</body>
</html>
