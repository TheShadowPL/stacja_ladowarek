<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stacja ładowarek - Twoje źródło energii</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/global-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/worker-index-page/worker-panel.css') }}">
</head>
<x-navbar />
<br>

@if ($notification['type'] == null)
@else
<x-notify :type="$notification['type']" :message="$notification['message']" />
@endif
<body>
<h2>Panel <span class="attention">pracownika</span></h2>
<div class="container">
    <a href="{{ route('chargers.index') }}" class="cta-button">🔋 Zarządzaj ładowarkami</a>
    <a href="{{ route('reservation_list') }}" class="cta-button">📝 Lista rezerwacji</a>
    <a href="{{ route('malfunction_list') }}" class="cta-button">🗿 Lista zgłoszonych ładowarek</a>
</div>
</body>

</html>
