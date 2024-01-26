<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/global-form.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/malfunction-page/malfunction-page.css') }}">

    <title>Profil</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
        }

        input {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        .button_a{
            display: inline-block;
            padding: 1em 2em;
            margin-top: 1em;
            background-color: #01ae70;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
    </style>
</head>

<body>
<x-navbar />
<div class="container">
    <br>
    <form action="">
        <h1>Profil</h1>
        <label for="firstName">Imię</label>
        <input type="text" name="firstName" id="firstName" required>
        <label for="lastName">Nazwisko</label>
        <input type="text" name="lastName" id="lastName" required>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
        <label for="password">Hasło</label>
        <input type="password" name="password" id="password" required>
        <label for="confirmPassword">Powtórz hasło</label>
        <input type="password" name="confirmPassword" id="confirmPassword" required>
        <button type="submit">Zapisz</button>
    </form>
    <a class="button_a" href="{{route('charge_history')}}">Historia ładowań</a>
</div>
</body>

</html>
