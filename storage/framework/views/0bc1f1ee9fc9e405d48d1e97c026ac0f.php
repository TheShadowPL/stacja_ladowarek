<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Ładowarek</title>
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
    <h2>Lista Ładowarek</h2>

    <table>
        <thead>
        <tr>
            <th>Miasto</th>
            <th>Ulica</th>
            <th>Numer</th>
            <th>Status</th>
            <th>Standard</th>
            <th>Moc</th>
            <th>Cena</th>
            <th>Akcje</th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $chargers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $charger): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($charger->city); ?></td>
                <td><?php echo e($charger->street); ?></td>
                <td><?php echo e($charger->number); ?></td>
                <td><?php echo e($charger->status); ?></td>
                <td><?php echo e($charger->standard); ?></td>
                <td><?php echo e($charger->power); ?></td>
                <td><?php echo e($charger->price); ?></td>
                <td>
                    <a href="<?php echo e(route('chargers.edit', $charger->id)); ?>">Edytuj</a>
                    <!-- Dodać kiedys na controlerze ze usunieto stacje  -->
                </td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</body>
</html>
<?php /**PATH C:\Users\Krystian\Desktop\stacja_ladowarek\stacja_ladowarek\resources\views/workers_panel/charger/index.blade.php ENDPATH**/ ?>