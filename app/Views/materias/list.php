<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>

    <h3>Listado de Materias</h3>
    <ul>
        <?php foreach ($materias as $materia): ?>
            <li>
                <?= $materia['nombre_materia'] ?>
                <a href="<?php echo base_url('edit/'.$materia['id_materia']) ?>">Editar</a>
            </li>
        <?php endforeach; ?>
    </ul>

    

    <?= $this->endSection() ?>
