<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/global-style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/register-page/register-form.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Rejestruj</title>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function() {
            $("#register-form").submit(function(e) {
                e.preventDefault();

                const username = $("#register-username").val();
                const email = $("#register-email").val();
                const pass = $("#pass1").val();
                const passCheck = $("#pass2").val();
                const firstName = $("#register-first-name").val();
                const lastName = $("#register-last-name").val();
                //const dob = $("#register-dob").val();
                const phone = $("#register-phone").val();

                console.log(username);
                console.log(email);
                console.log(pass);
                console.log(passCheck);
                console.log(firstName);
                console.log(lastName);
                //console.log(dob);
                console.log(phone);

                $.ajax({
                    type: "POST",
                    url: "{{ route('register') }}",
                    data: {
                        username: username,
                        email: email,
                        pass: pass,
                        passCheck: passCheck,
                        firstName: firstName,
                        lastName: lastName,
                        phone: phone
                    },
                    success: function(response) {
                        console.log(response);
                        if (response.status.trim().toLowerCase() === "success-reg")
                            window.location.href = "{{ __('index') }}";
                        else
                            alert(response.message);
                    }
                });
            });
        });
    </script>
</head>

<body>
    <!--<script src="../js/validatePassword.js"></script> -->

    <div class="container">

        <form id="register-form" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <h1>Zarejestruj się</h1>
            <br>
            <label for="login">Twój login</label>
            <input type="text" name="login" id="register-username" />
            <label for="email">Twój email</label>
            <input type="text" name="email" id="register-email" />
            <label for="first-name">Imie</label>
            <input type="text" name="first-name" id="register-first-name" />
            <label for="last-name">Nazwisko</label>
            <input type="text" name="last-name" id="register-last-name" />
            <label for="login">Data Urodzenia</label>
            <br>
            <label for="phone">Numer Telefonu</label>
            <input type="text" name="phone" id="register-phone" />
            <label for="password1">Hasło</label>
            <input type="password" name="password1" id="pass1">
            <label for="password2">Powtórz hasło</label>
            <input type="password" name="password2" id="pass2">
            <button>Zarejestruj</button>
        </form>
    </div>
    <!--<script src="{{ asset('assets/js/validatePassword.js') }} " type="text/javascript"></script>-->
</body>

</html>
