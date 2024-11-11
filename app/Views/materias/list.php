<?php echo $this->extend('layaout'); ?>


<?php echo $this->section('contenido'); ?>

    <h1>Listado de Materias</h1>
    <ul>
        <?php foreach ($materias as $materia): ?>
            <li>
                <?= $materia['nombre_materia'] ?>
                <a href="<?php echo base_url('edit/'.$materia['id_materia']) ?>">Editar</a>
            </li>
        <?php endforeach; ?>
    </ul>

    

    <?php echo $this->endSection() ;?>
