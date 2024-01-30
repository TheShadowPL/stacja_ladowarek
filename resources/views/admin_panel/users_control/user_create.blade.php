<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/global-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/register-page/register-form.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Rejestracja</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
<div class="container">
    <h1>Tworzenie Użytkownika</h1>
    <form action="{{ route('admin.users.store') }}" method="post">
        @csrf

        <label for="login">Login użytkownika</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
        @if ($errors->has('name'))
            <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
        <br>
        <label for="email">Email Użytkownika</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
        @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
        <br>
        <label for="password">Hasło Użytkownika</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
        @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif
        <br>
        <label for="password_confirmation">Powtórz hasło</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        <br>
        <label for="first_name">Imię Użytkownika</label>
        <input type="text" class="form-control" name="first_name" id="first_name">
        <br>
        <label for="last_name">Nazwisko Użytkownika</label>
        <input type="text" class="form-control" name="last_name" id="last_name">
        <br>
        <label for="dob">Data urodzenia Użytkownika </label>
        <input type="date" class="form-control" name="dob" id="dob">
        <br>
        <label for="phone_number">Numer Telefonu Użytkownika</label>
        <input type="text" class="form-control" name="phone_number" id="phone_number" pattern="[0-9]{1,9}" title="Numer telefonu może zawierać maksymalnie 9 cyfr">
        <br>

        <button type="submit" class="col-md-3 offset-md-5 btn btn-primary">Zarejestruj</button>
    </form>
    <script>
        document.getElementById('dob').addEventListener('input', function() {
            var today = new Date();
            var selectedDate = new Date(this.value);
            if (selectedDate > today) {
                alert('Nie można wybrać daty starszej niż dzisiaj.');
                this.value = '';
            }
        });
    </script>
</div>
</body>
<script>

</script>

</html>
