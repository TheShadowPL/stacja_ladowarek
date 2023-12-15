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

                    console.log(username);
                    console.log(email);
                    console.log(pass);
                    console.log(passCheck);

                    $.ajax({
                        type: "POST",
                        url: "{{ route('register') }}",
                        data: { username: username, email: email, pass: pass, passCheck: passCheck },
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
        <!--<script src="{{ asset('assets/js/validatePassword.js') }} " type="text/javascript"></script>
        <script src="../js/validatePassword.js"></script> -->

        <div class="container">

            <form id="register-form" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <h1>Zarejestruj się</h1>
                <label for="login">Twój login</label>
                <input type="text" name="login" id="register-username" />
                <br>
                <label for="email">Twój email</label>
                <input type="text" name="email" id="register-email" />
                <br>
                <label for="password1">Hasło</label>
                <input type="password" name="password1" id="pass1">
                <br>
                <label for="password2">Powtórz hasło</label>
                <input type="password" name="password2" id="pass2">
                <br>
                <button>Zarejestruj</button>
            </form>
        </div>
    </body>
</html>
