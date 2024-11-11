

<?php echo $this->extend('layaout'); ?>


<?php echo $this->section('contenido'); ?>

<style>
        /* Estilos para la tabla */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
  

<div class="container-fluid">
<table class="table table-hover">
  <thead>
  <tr>
      <th scope="col" >Código Materia</th>
      <th scope="col">Nombre de la Materia</th>
      <th scope="col">Cuatrimestre que se dicta</th>
  </tr>

   </thead>

  <?php
    foreach($materias as $materia):

        //echo $titulo;
        
    ?>
  <tbody>
   <tr>
      <th scope="row"><?php echo $materia['id_materia'];?></th>
      <th scope="col"><?php echo $materia['nombre_materia'];?></th>
      <th scope="col"><?php echo $materia['cuatrimestre'];?></th>
     
    </tr>
   
  </tbody>

   <?php
    endforeach
   ?>
</table>
    </div>



<?php echo $this->endSection() ;?>