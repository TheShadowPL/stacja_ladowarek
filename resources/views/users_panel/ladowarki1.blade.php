<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/global-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/chargers-page/chargers-list-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/chargers-page/filters-style.css') }}">

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@300;500;700&display=swap");
    </style>
    <title>Charger</title>
</head>

<body>
<x-navbar />
@if (session('notification'))
    <x-notify :type="session('notification')['type']" :message="session('notification')['message']" />
@endif
<section class="filters">
    <form id="filtersForm" action="{{ route('chargers') }}" method="GET">
        <div class="title">
            <h1>Filtry</h1>
        </div>
        <div class="input">
            <label for="loc" class="input-title">Lokalizacja</label>
            <input id="loc" name="location" type="text" placeholder="Jelenia góra" />
        </div>


        <div id="comp" class="input">
            <label for="comp" class="input-title">Kompatybilność</label>
            <div class="checkbox-container">
                <div class="checkbox">
                    <input id="stdCCS" name="compatibility[]" value="CCS" type="checkbox" />
                    <label for="CCS">CCS</label>
                </div>
                <div class="checkbox">
                    <input id="stdCHAdeMO" name="compatibility[]" value="CHAdeMO" type="checkbox" />
                    <label for="CHAdeMO">CHAdeMO</label>
                </div>
                <div class="checkbox">
                    <input id="stdTeslaSC" name="compatibility[]" value="Tesla Supercharger" type="checkbox" />
                    <label for="TeslaSC">Tesla Supercharger</label>
                </div>
                <div class="checkbox">
                    <input id="stdType2" name="compatibility[]" value="Type2" type="checkbox" />
                    <label for="Type2">Type 2</label>
                </div>
            </div>
        </div>
        <div class="input">
            <label for="btt" class="input-title">&nbsp</label>
            <div class="filter-butt">
                <button id="btt" type="submit">Zatwierdź</button>
            </div>
        </div>
        <br>
        <div style="
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                ">
            <a href="{{ route('malfunction') }}">Zgłoś awarię</a>
        </div>
    </form>
</section>
<section class="container">
    <div class="title">
        <h1>Ładowarki</h1>
    </div>
    <table id="chargerTable" class="charger-list">
        <thead class="table-header">
        <th>Dostępność</th>
        <th>Lokalizacja</th>
        <th>Odległość</th>
        <th>Cena [kWh]</th>
        <th>Standard</th>
        <th>Wolny termin</th>
        <th>Zarezerwuj</th>
        </thead>
        @foreach ($chargers as $charger)
            <tr class="charger">
                @if ($charger->status === 'available')
                    <td class="charger-availability available">
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <circle cx="6" cy="6" r="6" fill="#00BFA6"/>
                        </svg>
                        <span class="charger-available">Dostępna</span>
                    </td>
                @elseif ($charger->status === 'unavailable')
                    <td class="charger-availability unavailable">
                        <span class="charger-unavailable">Niedostępna</span>
                    </td>
                @endif
                <td class="charger-location">
                    <div>
                        <b>{{ $charger->city }}</b><br />
                        ul. {{ $charger->street }} {{ $charger->number }}
                    </div>
                </td>
                <td class="charger-distance">
                    @if ($charger->distance !== null)
                        {{ $charger->distance }} km
                    @else
                        Brak danych
                    @endif
                </td>

                <td class="charger-price">{{ $charger->price }}</td>
                <td class="charger-standard">{{ $charger->standard }}</td>
                <td>
                    @if ($charger->closestTerm_date && $charger->closestTerm_time)
                        {{ $charger->closestTerm_date }} {{ $charger->closestTerm_time }}
                    @else
                        <b>Teraz</b>
                    @endif
                </td>
                <td>
                    @if ($charger->locked == 'false' )
                        <a href="{{ route('reservation', ['charger_id' => $charger->id]) }}">
                            <svg width="33" height="34" viewBox="0 0 33 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <ellipse cx="12.8" cy="12.8" rx="12.8" ry="12.8" transform="matrix(4.37114e-08 -1 -1 -4.37114e-08 32 29.8)" fill="#7E869E" fill-opacity="0.25" />
                                <path d="M5.9 17C5.9 9.6546 11.8546 3.69999 19.2 3.69999C26.5454 3.69999 32.5 9.6546 32.5 17C32.5 24.3454 26.5454 30.3 19.2 30.3C11.8546 30.3 5.9 24.3454 5.9 17Z" stroke="#7E869E" stroke-opacity="0.25" />
                                <path d="M4.68629 28.3137C6.92393 30.5513 9.77486 32.0752 12.8786 32.6926C15.9823 33.3099 19.1993 32.9931 22.1229 31.7821C25.0466 30.5711 27.5454 28.5203 29.3035 25.8891C31.0616 23.2579 32 20.1645 32 17C32 13.8355 31.0616 10.7421 29.3035 8.11088C27.5454 5.47969 25.0466 3.42893 22.1229 2.21793C19.1993 1.00693 15.9823 0.690072 12.8786 1.30744C9.77486 1.9248 6.92393 3.44865 4.68629 5.68629" stroke="#153131" stroke-width="2" />
                                <path d="M20.8 17L21.5809 16.3753L22.0806 17L21.5809 17.6247L20.8 17ZM1.59999 18C1.0477 18 0.599987 17.5523 0.599987 17C0.599987 16.4477 1.0477 16 1.59999 16V18ZM15.1809 8.3753L21.5809 16.3753L20.0191 17.6247L13.6191 9.6247L15.1809 8.3753ZM21.5809 17.6247L15.1809 25.6247L13.6191 24.3753L20.0191 16.3753L21.5809 17.6247ZM20.8 18H1.59999V16H20.8V18Z" fill="#153131" />
                            </svg>
                        </a>
                    @else
                        <svg width="33" height="34" viewBox="0 0 33 34" fill="none"
                             xmlns="http://www.w3.org/2000/svg">
                            <ellipse cx="12.8" cy="12.8" rx="12.8" ry="12.8"
                                     transform="matrix(4.37114e-08 -1 -1 -4.37114e-08 32 29.8)" fill="#7E869E"
                                     fill-opacity="0.25"/>
                            <path d="M5.9 17C5.9 9.6546 11.8546 3.69999 19.2 3.69999C26.5454 3.69999 32.5 9.6546 32.5 17C32.5 24.3454 26.5454 30.3 19.2 30.3C11.8546 30.3 5.9 24.3454 5.9 17Z"
                                  stroke="#7E869E" stroke-opacity="0.25"/>
                            <path d="M4.68629 28.3137C6.92393 30.5513 9.77486 32.0752 12.8786 32.6926C15.9823 33.3099 19.1993 32.9931 22.1229 31.7821C25.0466 30.5711 27.5454 28.5203 29.3035 25.8891C31.0616 23.2579 32 20.1645 32 17C32 13.8355 31.0616 10.7421 29.3035 8.11088C27.5454 5.47969 25.0466 3.42893 22.1229 2.21793C19.1993 1.00693 15.9823 0.690072 12.8786 1.30744C9.77486 1.9248 6.92393 3.44865 4.68629 5.68629"
                                  stroke="#153131" stroke-width="2"/>
                            <path d="M20.8 17L21.5809 16.3753L22.0806 17L21.5809 17.6247L20.8 17ZM1.59999 18C1.0477 18 0.599987 17.5523 0.599987 17C0.599987 16.4477 1.0477 16 1.59999 16V18ZM15.1809 8.3753L21.5809 16.3753L20.0191 17.6247L13.6191 9.6247L15.1809 8.3753ZM21.5809 17.6247L15.1809 25.6247L13.6191 24.3753L20.0191 16.3753L21.5809 17.6247ZM20.8 18H1.59999V16H20.8V18Z"
                                    fill="#153131"/>
                        </svg>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const filtersForm = document.getElementById('filtersForm');
        const locInput = document.getElementById('loc');
        const compatibilityCheckboxes = document.querySelectorAll('input[name="compatibility[]"]');

        filtersForm.addEventListener('submit', function (event) {
            event.preventDefault();

            const locationFilter = locInput.value.trim().toLowerCase();
            const compatibilityFilters = Array.from(compatibilityCheckboxes)
                .filter(checkbox => checkbox.checked)
                .map(checkbox => checkbox.value);

            const chargers = document.querySelectorAll('.charger');
            chargers.forEach(charger => {
                const chargerLocation = charger.querySelector('.charger-location').textContent.trim().toLowerCase();
                const chargerCompatibility = charger.querySelector('.charger-standard').textContent.trim();

                const locationMatch = chargerLocation.includes(locationFilter);
                const compatibilityMatch = compatibilityFilters.length === 0 || compatibilityFilters.includes(chargerCompatibility);

                if (locationMatch && compatibilityMatch) {
                    charger.style.display = 'table-row';
                } else {
                    charger.style.display = 'none';
                }
            });
        });
    });
</script>
</body>

</html>
