<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="../css/global-style.css" />
        <link rel="stylesheet" href="../css/index/chargers-list-style.css" />
        <link rel="stylesheet" href="../css/index/filters-style.css" />
        <style>
            @import url("https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300;500;700&display=swap");
        </style>
        <title>Charger</title>
    </head>
    <body>
        <section class="filters">
            <div class="title">
                <h1>Filtry</h1>
            </div>
            <div class="input">
                <div class="input-title">Lokalizacja</div>
                <input type="text" placeholder="Jelenia góra" />
            </div>
            <div class="input">
                <div class="input-title">Ogległość</div>
                <input type="range" />
            </div>
            <div class="input">
                <div class="input-title">Moc ładowarki</div>
                <input type="range" />
            </div>
            <div class="input">
                <div class="input-title">Kompatybilność</div>
                <div class="checkbox-container">
                    <div class="checkbox">
                        <input type="checkbox" />
                        Standard A
                    </div>
                    <div class="checkbox">
                        <input type="checkbox" />
                        Standard B
                    </div>
                    <div class="checkbox">
                        <input type="checkbox" />
                        Standard C
                    </div>
                    <div class="checkbox">
                        <input type="checkbox" />
                        Standard D
                    </div>
                </div>
            </div>
            <div class="input">
                <div class="input-title">Marka ładowarki</div>
                <input type="text" placeholder="Samsung" />
            </div>
            <div class="input">
                <div class="input-title">Dostępność</div>
                <input type="text" placeholder="Dostępne" />
            </div>
            <div class="filter-butt">
                <button>Zatwierdź</button>
            </div>
        </section>
        <section class="container">
            <div class="title"><h1>Ładowarki</h1></div>
        </section>
    </body>
</html>
