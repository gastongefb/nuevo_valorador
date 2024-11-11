<?php echo $this->extend('layaout'); ?>


<?php echo $this->section('contenido'); ?>

<style>
p {
  text-align: center;
}
body {
  text-align: center;
}
</style>

<body>
<br>
<br>
    <h1>Error</h1>
    <p><?= $mensaje ?></p>
    <a href="http://localhost/valoradorG2/valorador/public/buscar_valoracion_por_docente">Volver a buscar</a>
<br>
<br>
<br>
<br>

<?php echo $this->endSection() ;?>