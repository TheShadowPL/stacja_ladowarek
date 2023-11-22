<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--<link rel="stylesheet" href="../css/global-style.css" />
    <link rel="stylesheet" href="../css/index/chargers-list-style.css" />
    <link rel="stylesheet" href="../css/index/filters-style.css" /> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/global-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/index/chargers-list-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/index/filters-style.css') }}">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300;500;700&display=swap");
    </style>
    <title>Charger</title>
</head>
<body>
<section class="filters">
    <form>
        <div class="title">
            <h1>Filtry</h1>
        </div>
        <div class="input">
            <label for="loc" class="input-title">Lokalizacja</label>
            <input id="loc" type="text" placeholder="Jelenia góra" />
        </div>
        <div class="input">
            <label for="dis" class="input-title">Odległość</label>
            <input id="dis" type="range" />
        </div>
        <div class="input">
            <label for="pwr" class="input-title">Moc ładowarki</label>
            <input id="pwr" type="range" />
        </div>

        <div id="comp" class="input">
            <label for="comp" class="input-title">Kompatybilność</label>
            <div class="checkbox-container">
                <div class="checkbox">
                    <input id="stdA" type="checkbox" />
                    <label for="stdA">Standard A</label>
                </div>
                <div class="checkbox">
                    <input id="stdB" type="checkbox" />
                    <label for="stdB">Standard B</label>
                </div>
                <div class="checkbox">
                    <input id="stdC" type="checkbox" />
                    <label for="stdC">Standard C</label>
                </div>
                <div class="checkbox">
                    <input id="stdD" type="checkbox" />
                    <label for="stdD">Standard D</label>
                </div>
            </div>
        </div>
        <div class="input">
            <label for="brand" class="input-title">Marka ładowarki</label>
            <input id="brand" type="text" placeholder="Samsung" />
        </div>
        <div class="input">
            <label for="avab" class="input-title">Dostępność</label>
            <input id="avab" type="text" placeholder="Dostępne" />
        </div>
        <div class="input">
            <label for="btt" class="input-title">&nbsp</label>
            <div class="filter-butt">
                <button id="btt">Zatwierdź</button>
            </div>
        </div>
    </form>
</section>
<section class="container">
    <div class="title"><h1>Ładowarki</h1></div>
    <table class="charger-list">
        <tr class="table-header">
            <th>
                Dostępność
            </th>
            <th>
                Lokalizacja
            </th>
            <th>
                Cena [kWh]
            </th>
            <th>
                Wolny termin
            </th>
            <th>
                Google maps
            </th>
        </tr>
        <tr class="charger">
            <td></td>
        </tr>
    </table>
</section>
</body>
</html>
