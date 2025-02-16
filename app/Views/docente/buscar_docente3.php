
<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>



<br>   
<h2 class="text-center">Datos del Docente</h2>
<br>
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
  
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Dni</th>
      <th scope="col">Mail</th>
      <th scope="col">Estado</th>
      <th scope="col">Usuario</th>
      <th scope="col">Clave</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <?php 
  $x=1;


  foreach ($datosTabla1 as $registro): ?>
  <tbody>
    <tr>
      
      <td><?= $registro['nombre']; ?></td>
      <td><?= $registro['apellido'];?></td>
      <td><?= $registro['dni'];?></td>
      <td><?= $registro['mail'];?></td>
      <td><?= $registro['estado'];?></td>
      <td><?= $registro['usuario'];?></td>
      <td><?= $registro['clave'];?></td>
      <td><a class="btn btn-warning" href="<?= base_url() ?><?= route_to('Docente.edit', $registro["id"]) ?>">Editar</a> 
      <a class="btn btn-danger btn-delete" href="<?= base_url() ?><?= route_to('Docente.destroy', $registro["id"]) ?>">Eliminar</a></td>
      <?php //echo"$x";
      $x=$x + 1;

      
      ?>
    </tr>
 </tbody>
 <?php endforeach; ?>
</table>



<div class="center-container">
     <a href="<?= base_url('buscar_docente') ?>">Volver</a>
</div>

<?= $this->endSection() ?>