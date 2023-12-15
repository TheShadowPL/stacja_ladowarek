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
            $("#login-form").submit(function(e) {
                e.preventDefault();

                const username = $("#register-username").val();
                const pass = $("#pass1").val();

                console.log(username);
                console.log(pass);

                $.ajax({
                    type: "POST",
                    url: "{{ route('login') }}",
                    data: { username: username, pass: pass },
                    success: function(response) {
                        console.log(response);
                        if (response.status.trim().toLowerCase() === "success-log")
                            window.location.href = "{{ route('chargers') }}";
                        else
                            alert(response.message);
                    }
                });
            });
        });
    </script>
</head>
<body>

<div class="container">

    <form id="login-form" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <h1>Zarejestruj się</h1>
        <label for="login">login</label>
        <input type="text" name="login" id="login-username" />
        <br>
        <label for="password1">Hasło</label>
        <input type="password" name="password1" id="pass1">
        <br>
        <button>Zaloguj</button>
    </form>
</div>
</body>
</html>
