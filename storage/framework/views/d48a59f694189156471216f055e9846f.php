<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/global-style.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/login-page/login-form.css')); ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <title>Zaloguj</title>
</head>
<body>

<?php if (isset($component)) { $__componentOriginalb9eddf53444261b5c229e9d8b9f1298e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb9eddf53444261b5c229e9d8b9f1298e = $attributes; } ?>
<?php $component = App\View\Components\Navbar::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('navbar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Navbar::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb9eddf53444261b5c229e9d8b9f1298e)): ?>
<?php $attributes = $__attributesOriginalb9eddf53444261b5c229e9d8b9f1298e; ?>
<?php unset($__attributesOriginalb9eddf53444261b5c229e9d8b9f1298e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb9eddf53444261b5c229e9d8b9f1298e)): ?>
<?php $component = $__componentOriginalb9eddf53444261b5c229e9d8b9f1298e; ?>
<?php unset($__componentOriginalb9eddf53444261b5c229e9d8b9f1298e); ?>
<?php endif; ?>

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
    </form>
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
<?php /**PATH C:\Users\Krystian\Desktop\stacja_ladowarek\resources\views/auth/zaloguj.blade.php ENDPATH**/ ?>