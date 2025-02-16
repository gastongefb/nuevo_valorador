
<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

    <h3>Seleccionar materia</h3>
  
<form action="<?php echo base_url('Mostrar_Valoraciones_Por_Materia3') ?>" method="post" autocomplete="off">

    <select name="id_materia_valoracion" class="form-control" autofocus>
     <option disabled selected>Seleccione la materia</option>
     <?php foreach($materias as $ci): ?>
        <option value="<?=$ci['id_materia']?>"><?=$ci['nombre_materia']?></option>
     <?php endforeach; ?>
     </select> 
    <br>
    

   
<button type="submit" class="btn btn-secondary">Buscar</button>
<br>
</form>

  
   
<?= $this->endSection() ?>