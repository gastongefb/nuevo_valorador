

<?php echo $this->extend('layaout'); ?>


<?php echo $this->section('contenido'); ?>

<?php 

//foreach($carreras as $c):

//echo $c['id_carrera']; echo $c['nombre_carrera'];

//endforeach
   ?>

    <h1>Nueva Materia</h1>

   <form action="<?php echo base_url('insertar_materia2') ?>" method="post" autocomplete="off">

   

   <label fro="nombre" class="col-sm-2 form-label">Nombre Materia</label>
   <input type="text" class="form-control" name="nombre" autofocus>

   <label fro="cuatrimestre" class="col-sm-2 form-label">Cuatrimestre</label>
   <input type="text" class="form-control" name="cuatrimestre" autofocus>
   <br>
   <select name="id_carrera" class="form-control" autofocus>
     <option disabled selected>Elija una Carrera</option>
     <?php foreach($carreras as $c): ?>
        <option value="<?=$c['id_carrera']?>"><?=$c['nombre_carrera']?></option>
     <?php endforeach; ?>
     </select>   


     <br>
   <div>  
   <button type="submit" class="btn btn-secondary">Guardar</button>
     </div>
   

   </form>
   <?php echo $this->endSection() ;?>