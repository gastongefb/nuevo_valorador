
<?php echo $this->extend('layaout'); ?>


<?php echo $this->section('contenido'); ?>

<style>
p {
  text-align: right;
}
body {
  text-align: center;
}
</style>

<h1>Valoración</h1>
<h2>Datos del docente</h2>
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
      <th scope="col">Dni</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      
    </tr>
  </thead>
  <?php 
  $x=1;
  foreach ($datosTabla6 as $dato6): ?>
  <tbody>
    <tr>
      
      <td><?= $dato6['dni'] ?></td>
      <td><?= $dato6['nombre'] ?></td>
      <td><?= $dato6['apellido'] ?></td>

    </tr>
 </tbody>
 <?php endforeach; ?>
</table>
<br>

 
  <?php if (isset($datosTabla2) && is_array($datosTabla2)): 
            //$punt = $datosTabla2['puntaje'];
    
    ?>
            <?php foreach ($datosTabla2 as $key => $value): 
              if ($key == 'detalle') {
                $detalle = $value; // Almacenar el valor del detalle
            } elseif ($key == 'puntaje') {
                $puntaje = $value; // Almacenar el valor del puntaje
            }
            ?>
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>No hay datos disponibles.</li>
        <?php endif; 
          //echo "el puntaje es:", $puntaje;
          //echo "el detalle es:", $detalle;
        ?>
  <h4>Puntaje Título de base</h4>
  <?php $punt=0;?>
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Código</th>
      <th scope="col">Detalle</th>
      <th scope="col">Puntaje</th>
      
    </tr>
  </thead>
  
  <tbody>
    <tr>
      <th scope="row"><?php echo"#";?></th>
      <td><?= $detalle; ?></td>
      <td><?= $puntaje; ?></td>
      <?php $punt= $punt + $puntaje;?>
     
    </tr>
 </tbody>
 
</table>    
<br>  
    
  <h4>Título de Postgrado</h4>
  
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Código</th>
      <th scope="col">Detalle</th>
      <th scope="col">Puntaje</th>
      
    </tr>
  </thead>
  <?php 
  $x=1;
  foreach ($datosTabla1 as $dato): ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo"$x";?></th>
      <td><?= $dato['detalle'] ?></td>
      <td><?= $dato['puntaje'] ?></td>
      <?php $punt= $punt + $dato['puntaje'];?>
      <?php $x=$x + 1;?>
    </tr>
 </tbody>
 <?php endforeach; ?>
</table>
<br>

<h4>Otros Título</h4>
  
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Código</th>
      <th scope="col">Detalle</th>
      <th scope="col">Puntaje</th>
      
    </tr>
  </thead>
  <?php 
  $x=1;
  foreach ($datosTabla8 as $dato): ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo"$x";?></th>
      <td><?= $dato['detalle'] ?></td>
      <td><?= $dato['puntaje'] ?></td>
      <?php $punt= $punt + $dato['puntaje'];?>
      <?php $x=$x + 1;?>
    </tr>
 </tbody>
 <?php endforeach; ?>
</table>
<br>
    

<h4>Capacitación</h4>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Código</th>
      <th scope="col">Detalle</th>
      <th scope="col">Puntaje</th>
      
    </tr>
  </thead>
  <?php 
  $x=1;
  foreach ($datosTabla3 as $dato): ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo"$x";?></th>
      <td><?= $dato['detalle'] ?></td>
      <td><?= $dato['puntaje'] ?></td>
      <?php $punt= $punt + $dato['puntaje'];?>
      
      <?php $x=$x + 1;?>
    </tr>
 </tbody>
 <?php endforeach; ?>
</table>
<br>

<h4>Antecedentes laborales (Privado - Estatal)</h4>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Código</th>
      <th scope="col">Detalle</th>
      <th scope="col">Puntaje</th>
      
    </tr>
  </thead>
  <?php 
  $x=1;
  foreach ($datosTabla4 as $dato): ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo"$x";?></th>
      <td><?= $dato['detalle'] ?></td>
      <td><?= $dato['puntaje'] ?></td>
      <?php $punt= $punt + $dato['puntaje'];?>
      
      <?php $x=$x + 1;?>
    </tr>
 </tbody>
 <?php endforeach; ?>
</table>
<br>

<h4>Antecedentes Docentes</h4>
   
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Código</th>
      <th scope="col">Detalle</th>
      <th scope="col">Puntaje</th>
      
    </tr>
  </thead>
  <?php 
  $x=1;
  foreach ($datosTabla5 as $dato): ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo"$x";?></th>
      <td><?= $dato['detalle'] ?></td>
      <td><?= $dato['puntaje'] ?></td>
      <?php $punt= $punt + $dato['puntaje'];?>
      
      <?php $x=$x + 1;?>
    </tr>
 </tbody>
 <?php endforeach; ?>
</table>
<br>

<h4>Otros Antecedentes Docentes</h4>
   
  <table class="table">
  <thead>
    <tr>
      <th scope="col">Código</th>
      <th scope="col">Detalle</th>
      <th scope="col">Puntaje</th>
      
    </tr>
  </thead>
  <?php 
  $x=1;
  foreach ($datosTabla9 as $dato): ?>
  <tbody>
    <tr>
      <th scope="row"><?php echo"$x";?></th>
      <td><?= $dato['detalle'] ?></td>
      <td><?= $dato['puntaje'] ?></td>
      <?php $punt= $punt + $dato['puntaje'];?>
      
      <?php $x=$x + 1;?>
    </tr>
 </tbody>
 <?php endforeach; ?>
 
</table>
<br>
    


<p>
<br>
<br>
<?php 
 echo "TOTAL VALORACIÓN: ", $punt;
 ?>
 </p>
 <br>
 <br>
 <br>

<?php echo $this->endSection() ;?>