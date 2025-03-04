<?= $this->extend('layout/layout') ?>

<?= $this->section('content') ?>


<div class="container-fluid">
 
    <h2 class="text-center text-primary fw-bold">Buscar docente</h2>
   <form action="<?php echo base_url('buscar_valoracion_por_docente2') ?>" method="post" autocomplete="off">

  
   <input type="text" class="form-control" name="dni" autofocus placeholder="DNI">
   <br>
   <p><button type="submit" class="btn btn-primary">Buscar</button></p>

   </form>

</div>

   <?php echo $this->endSection() ;?>