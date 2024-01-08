<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/global-form.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/malfunction-page/malfunction-page.css') }}">

    <title>Wynajmij</title>
</head>
<body>
<div class="container">
    <h1> Zarezerwuj ładowarke</h1>
    <form action="">
        <label for="login">Wybierz ładowarke</label>
        <select type="" name="login" id="">
            <option value="">Szklarska Poręba ul. Mickiewicza 30</option>
            <option value="">Karpacz ul. Batorego 66</option>
            <option value=""><b>Jelenia góra ul. Józefa Piłsudskiego 15</option>
        </select>
        <br />
        &nbsp
        <label for="login">Wybierz datę</label>
        <input type="date" name="date" id="">
        <br />
        &nbsp
        <label for="login">Wybierz godzinę</label>
        <input type="time" name="time" id="">
        <br />
        &nbsp
        <button type="submit">Zarezerwuj</button>
    </form>
</div>

</body>
</html>
