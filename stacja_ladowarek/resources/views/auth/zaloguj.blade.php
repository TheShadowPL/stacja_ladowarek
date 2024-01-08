<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/global-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login-page/login-form.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Zaloguj</title>
</head>
<body>

<div class="container">
    <form action="{{ route('authenticate') }}" method="post">
        @csrf
        <h1>Zaloguj się</h1>
        <label for="login">login</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
        @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
        <br>
        <label for="password1">Hasło</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
        @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif
        <br>
        <input type="submit" value="Login">
    </form>
    <!--<form id="login-form" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <h1>Zarejestruj się</h1>
        <label for="login">login</label>
        <input type="text" name="login" id="login-username" />
        <br>
        <label for="password1">Hasło</label>
        <input type="password" name="password1" id="pass1">
        <br>
        <button>Zaloguj</button>
    </form>-->
</div>
</body>
</html>
