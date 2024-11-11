<?php echo $this->extend('layaout'); ?>


<?php echo $this->section('contenido'); ?>


<div class="container-fluid">
    <h3>Seleccione un Plan de Estudio</h3>

   <form action="<?php echo base_url('mostrarPlanes3') ?>" method="post" autocomplete="off">

  
   <br>
   <select name="id_carrera" class="form-control" autofocus>
     <option disabled selected>Elija plan de estudio</option>
     <?php foreach($carreras as $c): ?>
        <option value="<?=$c['id_carrera']?>"><?=$c['nombre_carrera']?></option>
     <?php endforeach; ?>
     </select>
   <br>
   <p><button type="submit" class="btn btn-primary">Mostrar</button></p>

   </form>

</div>


   <?php echo $this->endSection() ;?>