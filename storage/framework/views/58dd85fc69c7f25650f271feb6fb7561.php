<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stacja Ładowarek - Twoje Źródło Energii</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
    body {
        margin: 0;
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        color: #333;
    }

    .x-navbar {
        background-color: #007bff;
        padding: 1rem;
    }

    .x-navbar a {
        color: #fff;
        text-decoration: none;
        margin-right: 20px;
    }

    h1 {
        text-align: center;
        color: #007bff;
    }

    p {
        text-align: center;
        margin: 20px 0;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    thead {
        background-color: #007bff;
        color: #fff;
    }

    th, td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    tbody tr:hover {
        background-color: #f9f9f9;
    }
</style>

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
    <h1>Historia ładowań</h1>

    <?php if($chargingSessions->isEmpty()): ?>
        <p>Brak dostępnych danych o ładowaniach.</p>
    <?php else: ?>
        <table>
            <thead>
            <tr>
                <th>Data rozpoczęcia</th>
                <th>Data zakończenia</th>
                <th>Ilość naładowanej energii</th>
                <th>Koszt</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $chargingSessions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $session): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($session->start_time); ?></td>
                    <td><?php echo e($session->end_time); ?></td>
                    <td><?php echo e($session->energy_charged); ?></td>
                    <td><?php echo e($session->cost); ?></td>
                    <td><?php echo e($session->status); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    <?php endif; ?>
</body>
</html>
<?php /**PATH C:\Users\Krystian\Desktop\stacja_ladowarek\stacja_ladowarek\resources\views/users_panel/charge_history.blade.php ENDPATH**/ ?>