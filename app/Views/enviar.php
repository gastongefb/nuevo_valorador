<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar Correo</title>
</head>
<body>

    <h2>Enviar Correo a un Docente</h2>

    <?php if (session()->getFlashdata('success')): ?>
        <p style="color: green;"><?php echo session()->getFlashdata('success'); ?></p>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <p style="color: red;"><?php echo session()->getFlashdata('error'); ?></p>
    <?php endif; ?>

    <form action="<?= base_url('correo/enviar') ?>" method="post">
        <label for="email">Seleccionar Docente:</label>
        <select name="mail" required>
            <option value="">Seleccione un docente</option>
            <?php foreach ($docentes as $docente): ?>
                <option value="<?= $docente['mail'] ?>"><?= $docente['nombre'] . ' ' . $docente['apellido'] ?> - <?= $docente['mail'] ?></option>
            <?php endforeach; ?>
        </select>
        
        <br><br>

        <label for="asunto">Asunto:</label>
        <input type="text" name="asunto" required>
        
        <br><br>

        <label for="mensaje">Mensaje:</label>
        <textarea name="mensaje" required></textarea>
        
        <br><br>

        <button type="submit">Enviar Correo</button>
    </form>

</body>
</html>
