<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/global-style.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/register-page/register-form.css')); ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <title>Rejestracja</title>
</head>
<body>
    <div class="container">
        <h1>Zarejestruj się</h1>
        <form action="<?php echo e(route('store')); ?>" method="post">
            <?php echo csrf_field(); ?>

            <label for="login">Twój login</label>
            <input type="text" class="form-control <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="name" name="name" value="<?php echo e(old('name')); ?>">
            <?php if($errors->has('name')): ?>
                <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
            <?php endif; ?>
            <br>
            <label for="email">Twój email</label>
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
            <label for="password">Hasło</label>
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
            <label for="password_confirmation">Powtórz hasło</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            <br>
            <label for="first_name">Imię</label>
            <input type="text" class="form-control" name="first_name" id="first_name" >
            <br>
            <label for="last_name">Nazwisko</label>
            <input type="text" class="form-control" name="last_name" id="last_name" >
            <br>
            <label for="dob">Data urodzenia</label>
            <input type="date" class="form-control" name="dob" id="dob" >
            <br>
            <label for="phone_number">Numer Telefonu</label>
            <input type="text" class="form-control" name="phone_number" id="phone_number" >
            <br>

            <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Zarejestruj">
        </form>
    </div>
</body>
</html>
<?php /**PATH C:\Users\Krystian\Desktop\stacja_ladowarek\stacja_ladowarek\resources\views/auth/register.blade.php ENDPATH**/ ?>