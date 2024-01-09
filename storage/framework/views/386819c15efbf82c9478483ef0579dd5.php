<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/global-style.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/register-page/register-form.css')); ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <title>Zaloguj</title>
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
                    url: "<?php echo e(route('authenticate')); ?>",
                    data: { username: username, password: pass },
                    success: function(response) {
                        console.log(response);
                        if (response.status.trim().toLowerCase() === "success-log")
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
    <form action="<?php echo e(route('authenticate')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <h1>Zaloguj się</h1>
        <label for="login">login</label>
        <input type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="email" name="email" value="<?php echo e(old('email')); ?>">
        <?php if($errors->has('email')): ?>
            <span class="text-danger"><?php echo e($errors->first('email')); ?></span>
        <?php endif; ?>
        <br>
        <label for="password1">Hasło</label>
        <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="password" name="password">
        <?php if($errors->has('password')): ?>
            <span class="text-danger"><?php echo e($errors->first('password')); ?></span>
        <?php endif; ?>
        <br>
        <input type="submit" value="Login">
    <!--<form id="login-form" method="post">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" />
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
<?php /**PATH C:\Users\Krystian\Desktop\stacja_ladowarek\stacja_ladowarek\resources\views/zaloguj.blade.php ENDPATH**/ ?>