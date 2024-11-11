<?php echo $this->extend('layaout'); ?>


<?php echo $this->section('contenido'); ?>


<div class="container-fluid">
    <h3>Buscar Docente</h3>

   <form action="<?php echo base_url('buscar_valoracion_por_docente2') ?>" method="post" autocomplete="off">

   <label fro="dni" class="col-sm-2 form-label">Dni</label>
   <input type="text" class="form-control" name="dni" autofocus>
   <br>
   <p><button type="submit" class="btn btn-primary">Buscar</button></p>

   </form>

</div>

   <?php echo $this->endSection() ;?>