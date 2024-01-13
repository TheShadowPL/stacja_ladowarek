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

<x-navbar />

<header>
    <h3>Stacja Ładowarek</h3>
    <p1>Ładowanie Przyszłości</p1>
</header>



<section class="container">
    <h2>Panel Pracownika dla upośledzonych</h2>
    <p>dostępne funckje:</p>
    <a  href="{{ route('workers.index') }}">Panel Pracownika</a>
    <a href="{{ route('reservation_list') }}" class="cta-button">Lista rezerwacji</a>
    <a href="{{ route('malfunction_list') }}" class="cta-button">Lista zgłoszonych ładowarek</a>

</section>

<footer id="kontakt">
    <p>Kontakt: info@stacjaladowarek.pl | Telefon: 123-456-789</p>
</footer>

</body>
</html>
