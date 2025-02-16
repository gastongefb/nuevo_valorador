
<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>

<h3>Materia Actualizada</h3>
<p><strong>ID:</strong> <?= esc($materia['id_materia']) ?></p>
<p><strong>Nombre Materia:</strong> <?= esc($materia['nombre_materia']) ?></p>
<p><strong>Cuatrimestre:</strong> <?= esc($materia['cuatrimestre']) ?></p>
<p><strong>ID Materia Carrera:</strong> <?= esc($materia['id_carrera_materia']) ?></p>
<p><strong>Nombre Carrera:</strong> <?= esc($materia['nombre_carrera']) ?></p>
<a href="<?= base_url('materias') ?>">Volver a la lista de materias</a>

    
<?= $this->endSection() ?> 


