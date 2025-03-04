<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>

<br>
<?php 
  $n = '';
  $a = '';
  foreach ($datosTabla1 as $registro): 
     $n = $registro['nombre'];
     $a = $registro['apellido'];
    break;
  endforeach; 
?>

<h2 class="text-center text-primary fw-bold">Listado de Valoraciones Docente: <?= htmlspecialchars($n) . " " . htmlspecialchars($a); ?></h2>

<style>
  /* Estilo general de la tabla */
  .table-container {
    width: 100%;
    overflow-x: auto;
    margin: 20px 0;
  }

  .styled-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 1em;
    font-family: 'Arial', sans-serif;
    min-width: 600px;
    border-radius: 10px 10px 0 0;
    overflow: hidden;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }

  /* Encabezado */
  .styled-table thead tr {
    background-color: #007bff;
    color: white;
    text-align: center;
    font-weight: bold;
  }

  /* Celdas */
  .styled-table th, .styled-table td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
    text-align: center;
    white-space: nowrap; /* Evita que los encabezados se dividan en varias líneas */
  }

  /* Filas alternas */
  .styled-table tbody tr:nth-child(even) {
    background-color: #f8f9fa;
  }

  /* Efecto hover */
  .styled-table tbody tr:hover {
    background-color: #cce5ff;
    transform: scale(1.02);
    transition: all 0.3s ease-in-out;
    cursor: pointer;
  }

  /* Ajuste para columna de materia */
  .materia-col {
    max-width: 200px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }

  /* Botón de descarga de PDF */
  .pdf-btn {
    display: block;
    width: 200px;
    margin: 20px auto;
    font-size: 1rem;
    font-weight: bold;
    background-color: #007bff;
    color: white;
    padding: 10px;
    border-radius: 5px;
    text-align: center;
    border: none;
    transition: background 0.3s ease-in-out;
  }

  .pdf-btn:hover {
    background-color: #0056b3;
  }
</style>

<div class="table-container">
  <table class="styled-table">
    <thead>
      <tr>
        <th>#</th>
        <th>DNI</th>
        <th>Título</th>
        <th>Jurado 1</th>
        <th>Jurado 2</th>
        <th>Jurado 3</th>
        <th>Materia</th>
        <th>Puntaje</th>
        <th>Fecha de Alta</th>
        <th>Última Actualización</th>
      </tr>
    </thead>
    <tbody>
      <?php $x = 1; ?>
      <?php foreach ($datosTabla1 as $registro): ?>
        <tr>
          <td><?= $x++; ?></td>
          <td><?= esc($registro['dni']); ?></td>
          <td><?= esc($registro['titulo_det']); ?></td>
          <td><?= esc($registro['j1']); ?></td>
          <td><?= esc($registro['j2']); ?></td>
          <td><?= esc($registro['j3']); ?></td>
          <td class="materia-col"><?= esc($registro['materia']); ?></td>
          <td><?= esc($registro['puntaje']); ?></td>
          <td><?= esc($registro['fecha_alta']); ?></td>
          <td><?= esc($registro['fecha_modifica']); ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<form method="post" action="<?= site_url('pdf/generatePdfPorDocente') ?>" style="display:none;" id="pdfForm">
  <input type="hidden" name="datosTabla1" value='<?= json_encode($datosTabla1) ?>'>
</form>

<button type="button" class="pdf-btn" onclick="document.getElementById('pdfForm').submit();">
  Descargar PDF
</button>

<?= $this->endSection() ?>
