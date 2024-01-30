<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Plug&Go - Twoje Źródło Energii</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/global-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/worker-index-page/worker-panel.css') }}">
</head>
<x-navbar />
@if (session('notification'))
    <x-notify :type="session('notification')['type']" :message="session('notification')['message']" />
@endif
<body>
<h2>Panel <span class="attention">Administratora</span></h2>
<div class="container">
    <a href="{{ route('admin.users') }}" class="cta-button">🔋 Zarządzaj użytkownikami</a>
    <a href="{{route('admin.users.create')}}" class="cta-button">🗿 Dodaj Użytkownika</a>
    <a href="{{route('admin.worker_list')}}" class="cta-button">📝 Zarządzaj Pracownikami</a>
    <a href="{{route('admin.worker.create')}}" class="cta-button">🗿 Dodaj Pracownika</a>
    <a href="{{route('admin.chargers.create')}}" class="cta-button">🗿 Dodaj Ładowarke</a>
</div>

</body>
</html>
