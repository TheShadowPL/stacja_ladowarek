<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/global-style.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/login-page/login-form.css')); ?>">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />

        <title>Zaloguj się</title>
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $(document).ready(function() {
                $("#login-form").submit(function(e) {
                    e.preventDefault();

                    const username = $("#login-username").val();
                    const pass = $("#pass1").val();

                    console.log(username);
                    console.log(pass);

                    $.ajax({
                        type: "POST",
                        url: "<?php echo e(route('login')); ?>",
                        data: { username: username, pass: pass },
                        success: function(response) {
                            console.log(response);
                            if (response.status.trim().toLowerCase() === "success-reg")
                                window.location.href = "<?php echo e(route('chargers')); ?>";
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
                <h1>Zaloguj się</h1>
                <label for="login">Login</label>
                <input type="text" name="login" id="login-username" />

                <br>
                <label for="password">Hasło</label>
                <input type="password" name="password" id="pass1">
                <br>
                &nbsp
                <button type="submit">Zaloguj</button>
            </form>
        </div>
    </body>
</html>
<?php /**PATH C:\Users\Krystian\Desktop\stacja_ladowarek\stacja_ladowarek\resources\views/login.blade.php ENDPATH**/ ?>
