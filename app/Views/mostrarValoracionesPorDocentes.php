<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>

<br>
<?php 
  $n = '';
  $a = '';
  foreach ($datosTabla1 as $registro): 
     $n = $registro['nombre'];
     $a = $registro['apellido'];
    // recuperamos el primer registro y cortamos el bucle
    break;
   endforeach; 
  ?>

<h2 class="text-center">Listado de Valoraciones docente: <?php echo htmlspecialchars($n)." ".htmlspecialchars($a); ?></h2>

<style>
  /* Estilo general de la tabla */
  table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    font-size: 1em;
    font-family: sans-serif;
    min-width: 400px;
    border-radius: 10px 10px 0 0;
    overflow: hidden;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  /* Encabezados de la tabla */
  thead {
    background-color: #007bff;
    color: white;
    text-align: left;
    font-weight: bold;
  }

  th,td {
    padding: 12px 15px;
    border-bottom: 1px solid #ddd;
  }

  /* Filas alternas para mejor visualización */
  tbody tr:nth-child(even) {
    background-color: #f3f3f3;
  }

  /* Efecto hover */
  tbody tr:hover {
    background-color: #d6e4ff;
    transition: 0.3s;
  }

  /* Responsividad */
  @media (max-width: 600px) {
    table {
      display: block;
      overflow-x: auto;
      white-space: nowrap;
    }
  }
</style>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Código</th>
      <th scope="col">Dni</th>
      <th scope="col">Título</th>
      <th scope="col">Jurado 1</th>
      <th scope="col">Jurado 2</th>
      <th scope="col">Jurado 3</th>
      <th scope="col">Materia</th>
      <th scope="col">Puntaje</th>
      <th scope="col">Fecha de alta</th>
      <th scope="col">Última actualización</th>


    </tr>
  </thead>
  <?php
  $x = 1;


  foreach ($datosTabla1 as $registro): ?>
    <tbody>
      <tr>
        <th scope="row"><?php echo "$x"; ?></th>
        <td><?= esc($registro['dni']); ?></td>
        <td><?= esc($registro['titulo_det']); ?></td>
        <td><?= esc($registro['j1']); ?></td>
        <td><?= esc($registro['j2']); ?></td>
        <td><?= esc($registro['j3']); ?></td>
        <td><?= esc($registro['materia']); ?></td>
        <td><?= esc($registro['puntaje']); ?></td>
        <td><?= esc($registro['fecha_alta']); ?></td>
        <td><?= esc($registro['fecha_modifica']); ?></td>
        <?php //echo"$x";
        $x = $x + 1;
        ?>
      </tr>

      <br>


    </tbody>
  <?php endforeach; ?>
</table>
<br>

<form method="post" action="<?= site_url('pdf/generatePdfPorDocente') ?>" style="display:none;" id="pdfForm">
  <input type="hidden" name="datosTabla1" value='<?= json_encode($datosTabla1) ?>'>
</form>
<button onclick="document.getElementById('pdfForm').submit();">Descargar PDF</button>



<?= $this->endSection() ?>