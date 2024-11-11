<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">ISFT ANGACO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
       

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Planes de Estudio
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="http://localhost/framework_ci4_ministerio/public/mostrarPlanes">Listado de Planes de Estudio</a></li>
            <li><a class="dropdown-item" href="#">Cargar Plan de Estudio</a></li>

           
            <li><a class="dropdown-item" href="#"></a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Materias
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="http://localhost/framework_ci4_ministerio/public/mostrar_materias">Mostrar Materias</a></li>
            <li><a class="dropdown-item" href="http://localhost/framework_ci4_ministerio/public/insertar_materia1">Cargar Materias</a></li>
            
            
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Valoraciones
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="http://localhost/framework_ci4_ministerio/public/cargarValoracion">Cargar Valoración</a></li>
            <li><a class="dropdown-item" href="http://localhost/framework_ci4_ministerio/public/nuevo">Mostrar Valoración por Docente</a></li>
            <li><a class="dropdown-item" href="http://localhost/framework_ci4_ministerio/public/mostrar_valoraciones">Mostrar Todas las Valoraciones</a></li>
           
            <li><a class="dropdown-item" href="#"></a></li>
          </ul>
        </li>
     
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true"></a>
        </li>
      </ul>
     
    </div>
  </div>
</nav>

<?php echo $this->renderSection("contenido"); ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<div class="container-fluid">
 
<br>
<a href="http://localhost/framework_ci4_ministerio/public/"><button type="button" class="btn btn-secondary">Volver</button></a> 

</div>
</body>

</html>