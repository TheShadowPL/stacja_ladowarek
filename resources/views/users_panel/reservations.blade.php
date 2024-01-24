<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/global-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/reservation-page/reservation-page.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Wynajmij</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>

<body>
    <x-navbar />
    <div class="container">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        @if ($error === 'start_time' || $error === 'end_time')
                            <li>{{ ucfirst($error) }}: {{ $errors->first($error) }}</li>
                        @else
                            <li>{{ $error }}</li>
                        @endif
                    @endforeach
                </ul>
            </div>
        @endif
        <section class="left-container">
            <h1><span class="attention">Zarezerwuj</span> ładowarkę</h1>


            <form action="{{ route('reservation.store', $charger->id) }}" method="post">
                @csrf

                <p><b>Miasto</b><br><span class="attention">{{ $charger->city }}</span></p>
                <p><b>Ulica</b><br><span class="attention">{{ $charger->street }} {{ $charger->number }}</span></p>

                <p>
                    <label for="reservation_type">Typ rezerwacji</label>
                    <br>
                    <select name="reservation_type" id="reservation_type" required>
                        <option value="traditional">Tradycyjna rezerwacja</option>
                        <option value="capacity">Rezerwacja według pojemności baterii</option>
                    </select>
                </p>

                <p id="capacity_section" style="display:none;">
                    <label for="battery_capacity">Pojemność baterii (kWh)</label>
                    <br>
                    <input type="number" step="0.01" name="battery_capacity" id="battery_capacity">
                </p>

                <p>
                    <label for="charging_time">Czas ładowania (godziny)</label>
                    <br>
                    <input type="text" name="charging_time" id="charging_time" readonly>
                </p>

                <p>
                    <label for="start_time">Data rozpoczęcia</label>
                    <br>
                    <input type="datetime-local" name="start_time" id="start_time" required>
                </p>

                <p>
                    <label for="end_time">Data zakończenia</label>
                    <br>
                    <input type="datetime-local" name="end_time" id="end_time" required>
                </p>

                <button type="submit">Zarezerwuj ładowarkę</button>
            </form>

            <script>
                document.getElementById('start_time').addEventListener('input', function() {
                    var today = new Date();
                    var selectedDate = new Date(this.value);
                    if (selectedDate < today) {
                        alert('Nie można wybrać daty wcześniejszej niż dzisiaj.');
                        this.value = '';
                    }
                });
                document.getElementById('end_time').addEventListener('input', function() {
                    var startTime = new Date(document.getElementById('start_time').value);
                    var endTime = new Date(this.value);

                    if (endTime <= startTime) {
                        alert('Data zakończenia musi być późniejsza niż data rozpoczęcia.');
                        this.value = '';
                    }
                });

                document.getElementById('reservation_type').addEventListener('change', function() {
                    var capacitySection = document.getElementById('capacity_section');
                    var endTimeField = document.getElementById('end_time');

                    if (this.value === 'capacity') {
                        capacitySection.style.display = 'block';

                        document.getElementById('start_time').addEventListener('change', function() {
                            var startTime = new Date(this.value).getTime();
                            var chargingTime = parseFloat(document.getElementById('charging_time').value) || 0;
                            var endTime = startTime + (chargingTime * 60 * 60 * 1000);
                            //endTimeField.value = new Date(endTime).toISOString().slice(0, -1);
                            var formattedEndTime = new Date(endTime).toISOString().slice(0, 16);
                            endTimeField.value = formattedEndTime;
                        });
                    } else {
                        capacitySection.style.display = 'none';
                        endTimeField.value = '';
                    }
                });

                document.getElementById('battery_capacity').addEventListener('input', calculateChargingTime);

                function calculateChargingTime() {
                    var batteryCapacity = parseFloat(document.getElementById('battery_capacity').value) || 0;
                    var chargingPower = parseFloat("{{ $charger->power }}") || 0;

                    if (chargingPower > 0) {
                        var chargingTime = batteryCapacity / chargingPower;
                        chargingTime = chargingTime.toFixed(2);
                        document.getElementById('charging_time').value = chargingTime + ' godziny';

                        var startTime = new Date(document.getElementById('start_time').value).getTime();
                        var endTimeField = document.getElementById('end_time');
                        var endTime = startTime + (chargingTime * 60 * 60 * 1000);
                        endTimeField.value = new Date(endTime).toISOString().slice(0, -1);
                    } else {
                        document.getElementById('charging_time').value = '';
                    }
                }
            </script>
        </section>
        <section class="right-container"></section>
    </div>


</body>

</html>
