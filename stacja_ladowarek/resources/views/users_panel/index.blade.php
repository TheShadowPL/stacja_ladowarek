<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stacja Ładowarek - Twoje Źródło Energii</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 1em;
            text-align: center;
        }

        section {
            padding: 2em;
        }

        h1, h2 {
            color: #333;
        }
        h3 {
            color: #FFFFFF;
        }

        p1 {
            color: #FFFFFF;
        }


        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .cta-button {
            display: inline-block;
            padding: 1em 2em;
            margin-top: 1em;
            background-color: #01ae70;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }


        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>

</head>
<body>

<header>
    <h3>Stacja Ładowarek</h3>
    <p1>Ładowanie Przyszłości</p1>
</header>

<section class="container">
    <h2>Ładowarki Dla Twoich Potrzeb</h2>
    <p>Dostarczamy nowoczesne i efektywne rozwiązania ładowania dla pojazdów elektrycznych. Znajdź najbliższą stację ładowania już teraz!</p>
    <a href="{{ __('about') }}" class="cta-button">Skontaktuj się z nami</a>
    <a href="{{ __('users_panel/chargers') }}" class="cta-button">Znajdź stację ładowania</a>
    <a href="{{ __('login') }}" class="cta-button">Zaloguj się</a>
    <a href="{{ __('register') }}" class="cta-button">Zarejestruj się</a>
    @if (auth()->check())
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" id="logout-button" class="cta-button">Wyloguj się</button>
        </form>
    @endif

</section>

<footer id="kontakt">
    <p>Kontakt: info@stacjaladowarek.pl | Telefon: 123-456-789</p>
</footer>

</body>
</html>
