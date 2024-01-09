<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/global-form.css')); ?>">

    <title>Wynajmij</title>
</head>
<body>
<?php if (isset($component)) { $__componentOriginalb9eddf53444261b5c229e9d8b9f1298e = $component; } ?>
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
<?php if (isset($__componentOriginalb9eddf53444261b5c229e9d8b9f1298e)): ?>
<?php $component = $__componentOriginalb9eddf53444261b5c229e9d8b9f1298e; ?>
<?php unset($__componentOriginalb9eddf53444261b5c229e9d8b9f1298e); ?>
<?php endif; ?>
<div class="container">
    <h1> Zarezerwuj ładowarkę</h1>
    <p>Miasto: <?php echo e($charger->city); ?></p>
    <p>Ulica: <?php echo e($charger->street); ?> <?php echo e($charger->number); ?></p>


    <form action="<?php echo e(route('reservation.store', $charger->id)); ?>" method="post">
        <?php echo csrf_field(); ?>

        <div>
            <label for="start_time">Data rozpoczęcia:</label>
            <input type="datetime-local" name="start_time" required>
        </div>

        <div>
            <label for="end_time">Data zakończenia:</label>
            <input type="datetime-local" name="end_time" required>
        </div>



        <button type="submit">Zarezerwuj ładowarkę</button>
    </form>
</div>

</body>
</html>
<?php /**PATH C:\Users\Krystian\Desktop\stacja_ladowarek\stacja_ladowarek\resources\views/users_panel/reservations.blade.php ENDPATH**/ ?>