<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/global-style.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/register-page/register-form.css')); ?>">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
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
                    const dob = $("#register-dob").val();
                    const phone = $("#register-phone").val();

                    console.log(username);
                    console.log(email);
                    console.log(pass);
                    console.log(passCheck);
                    console.log(firstName);
                    console.log(lastName);
                    console.log(dob);
                    console.log(phone);

                    $.ajax({
                        type: "POST",
                        url: "<?php echo e(route('register')); ?>",
                        data: { username: username, email: email, pass: pass, passCheck: passCheck, firstName: firstName, lastName: lastName, dob :dob, phone: phone },
                        success: function(response) {
                            console.log(response);
                            if (response.status.trim().toLowerCase() === "success-reg")
                                window.location.href = "<?php echo e(__('index')); ?>";
                            else
                                alert(response.message);
                        }
                    });
                });
            });
        </script>
    </head>
    <body>
        <!--<script src="<?php echo e(asset('assets/js/validatePassword.js')); ?> " type="text/javascript"></script>
        <script src="../js/validatePassword.js"></script> -->

        <div class="container">

            <form id="register-form" method="post">
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
                <h1>Zarejestruj się</h1>
                <label for="login">Twój login</label>
                <input type="text" name="login" id="register-username" />
                <br>
                <label for="email">Twój email</label>
                <input type="text" name="email" id="register-email" />
                <br>
                <label for="login">Imie</label>
                <input type="text" name="first-name" id="register-first-name" />
                <br>
                <label for="login">Nazwisko</label>
                <input type="text" name="last-name" id="register-last-name" />
                <br>
                <label for="dob">Data urodzenia</label>
                <input type="date" name="dob" id="register-dob" />
                <br>
                <label for="login">Numer Telefonu</label>
                <input type="text" name="phone" id="register-phone" />
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
<?php /**PATH C:\Users\Krystian\Desktop\stacja_ladowarek\stacja_ladowarek\resources\views/register.blade.php ENDPATH**/ ?>