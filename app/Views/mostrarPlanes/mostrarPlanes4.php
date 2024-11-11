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
  

<br>
<br>
<?php
 foreach($validaciones2 as $v):   
  ?>
<tbody>
 <tr>
    <th scope="row" ><?php echo $v['nombre_carrera'];?></th>
    
  </tr>
 
</tbody>

 <?php
  endforeach;
?>

<br>
<br>
<div class="container-fluid">
<table class="table table-hover">
  <thead>
  <tr>
      <th scope="col">Código Materia</th>
      <th scope="col">Nombre</th>
      <th scope="col">Cuatrimestre</th>
      
    </tr>

   
  </thead>

  <?php
 

foreach($validaciones as $validacion):   
    ?>
  <tbody>
   <tr>
      <th scope="row"><?php echo $validacion['id_materia'];?></th>
      <th scope="col"><?php echo $validacion['nombre_materia'];?></th>
      <th scope="col"><?php echo $validacion['cuatrimestre'];?></th>
      
    </tr>
   
  </tbody>

   <?php
    endforeach
   ?>

</table>
    </div>

  <br>
  <br>

<?php echo $this->endSection() ;?>