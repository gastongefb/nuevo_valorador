<?php echo $this->extend('layaout'); ?>


<?php echo $this->section('contenido'); ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

    <h1>Nueva Valoración</h1>
  
<form action="<?php echo base_url('guardarTitulo') ?>" method="post" autocomplete="off">

    <select name="id_materia_valoracion" class="form-control" autofocus>
     <option disabled selected>Seleccione la materia</option>
     <?php foreach($materias as $ci): ?>
        <option value="<?=$ci['id_materia']?>"><?=$ci['nombre_materia']?></option>
     <?php endforeach; ?>
     </select> 
    <br>

     <select name="id_titulo" class="form-control" autofocus>
     <option disabled selected>Selecciones un Título</option>
     <?php foreach($titulos as $c): ?>
        <option value="<?=$c['id_titulo']?>"><?=$c['detalle_titulo']?></option>
     <?php endforeach; ?>
     </select> 
     <br>

     <select name="id_condicion" class="form-control" autofocus>
     <option disabled selected>Selecciones una condicion</option>
     <?php foreach($condicion as $co): ?>
        <option value="<?=$co['id_condicion']?>"><?=$co['detalle_condicion']?></option>
     <?php endforeach; ?>
     </select> 
     

     <br>
     <label for="vehicle1">DNI</label><br>
     <input type="text" name="dni" id="dni" placeholder="Dni"><br>
    <br>
     <label for="vehicle1">JURADO 1</label><br>
     <input type="text" name="j1" id="j1" placeholder="Dni"><br>
    <br>
     <label for="vehicle1">JURADO 2</label><br>
     <input type="text" name="j2" id="j2" placeholder="Dni"><br>
    <br>
     <label for="vehicle1">JURADO 3</label><br>
     <input type="text" name="j3" id="j3" placeholder="Dni"><br>
    
     <br><br>

   
<button type="submit" class="btn btn-secondary">Siguiente</button>
<br>
</form>

  
   
   <?php echo $this->endSection() ;?>