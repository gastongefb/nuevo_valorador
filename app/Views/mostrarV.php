
<?php echo $this->extend('layaout'); ?>


<?php echo $this->section('contenido'); ?>




<div class="container-fluid">
<table class="table">
  <thead>
  <tr>
      <th scope="col">Cod. Validación</th>
      <th scope="col">Dni</th>
      <th scope="col">Título</th>
      <th scope="col">Jurado 1</th>
      <th scope="col">Jurado 2</th>
      <th scope="col">Jurado 3</th>
      <th scope="col">Condición Docente</th>
      <th scope="col">Materia</th>
      <th scope="col">Puntaje</th>
    </tr>

   
  </thead>

  <?php
    foreach($validaciones as $validacion):

        //echo $titulo;
        
    ?>
  <tbody>
   <tr>
      <th scope="row"><?php echo $validacion['id_valoracion'];?></th>
      <th scope="col"><?php echo $validacion['dni'];?></th>
      <th scope="col"><?php echo $validacion['id_titulo'];?></th>
      <th scope="col"><?php echo $validacion['j1'];?></th>
      <th scope="col"><?php echo $validacion['j2'];?></th>
      <th scope="col"><?php echo $validacion['j3'];?></th>
      <th scope="col"><?php echo $validacion['id_condicion'];?></th>
      <th scope="col"><?php echo $validacion['nombre_materia'];?></th>
      <th scope="col">#</th>
    </tr>
   
  </tbody>

   <?php
    endforeach
   ?>

</table>
    </div>


<?php echo $this->endSection() ;?>