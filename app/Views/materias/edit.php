
<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>

<h3>Editar Materia</h3>
<form action="<?php echo base_url('update/'.$materia['id_materia']) ?>" method="post">
    <label for="nombre_materia">Nombre Materia:</label>
    <input type="text" name="nombre_materia" id="nombre_materia" value="<?= $materia['nombre_materia'] ?>">
    <br>
    <label for="cuatrimestre">Cuatrimestre:</label>
    <input type="number" name="cuatrimestre" id="cuatrimestre" value="<?= $materia['cuatrimestre'] ?>">
    <br>
    

    <label for="id_carrera">Carreras:</label>
    <select name="id_carrera" class="form-control" autofocus>
        <option disabled selected>Seleccione una carrera</option>
        <?php foreach($carrera as $d): ?>
            <option value="<?=$d['id_carrera']?>"><?=$d['nombre_carrera']?></option>
        <?php endforeach; ?>
    </select>

    <br>
    <button type="submit">Guardar</button>
</form>


    
<?= $this->endSection() ?>



