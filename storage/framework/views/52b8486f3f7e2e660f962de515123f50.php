<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edytuj Ładowarkę</title>
    <!-- Dodaj ewentualne stylizacje CSS -->
</head>
<body>
    <h2>Edytuj Ładowarkę</h2>

    <form method="post" action="<?php echo e(route('chargers.update', $charger->id)); ?>">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <label for="city">Miasto:</label>
        <input type="text" name="city" value="<?php echo e($charger->city); ?>" required>

        <label for="street">Ulica:</label>
        <input type="text" name="street" value="<?php echo e($charger->street); ?>" required>

        <label for="number">Numer:</label>
        <input type="text" name="number" value="<?php echo e($charger->number); ?>" required>

        <label for="status">Status:</label>
        <input type="text" name="status" value="<?php echo e($charger->status); ?>" required>

        <label for="standard">Standard:</label>
        <input type="text" name="standard" value="<?php echo e($charger->standard); ?>" required>

        <label for="power">Moc:</label>
        <input type="text" name="power" value="<?php echo e($charger->power); ?>" required>

        <label for="price">Cena:</label>
        <input type="text" name="price" value="<?php echo e($charger->price); ?>" required>
        
        <button type="submit">Zapisz Edycję</button>
    </form>

</body>
</html>
<?php /**PATH C:\Users\Krystian\Desktop\stacja_ladowarek\stacja_ladowarek\resources\views/workers_panel/charger/edit.blade.php ENDPATH**/ ?>