<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Valorador v0.2</title>
    <link rel="icon" href="icono8.png" type="image/x-icon">
    

    <!-- Incluimos Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Incluimos jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Incluimos Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <script src="<?= base_url() ?>/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/bootstrap/js/jquery_v3.7.1.js"></script>
  
  <style>
        /* Estilo para centrar el texto en las celdas */
        .table td, .table th {
            text-align: center;
            vertical-align: middle;
        }
    </style>
 
</head>
<body>
    <header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
    <a class="navbar-brand" href="#">ISFT ANGACO - usuario <?php echo session('usuario');?></a>
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
              <li><a class="dropdown-item" href="<?php echo base_url('/mostrarPlanes') ?> ">Listado de Planes de Estudio</a></li>
              <li><a class="dropdown-item" href="#">Cargar Plan de Estudio</a></li>


              <li><a class="dropdown-item" href="#"></a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Materias
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="<?php echo base_url('/insertar_materia1') ?>">Cargar Materias</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('/materias') ?>">Actualizar Materias</a></li>


            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Valoraciones
            </a>
            <ul class="dropdown-menu">
             <li><a class="dropdown-item" href="<?php echo base_url('/cargar_datos') ?>"> Cargar Nueva Valoración</a></li>
             <li><a class="dropdown-item" href="<?php echo base_url('/mostrar_valoraciones_porDocente_porMateria1') ?>"> Actualizar Valoración</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('/buscar_valoracion_por_docente') ?>">Buscar Valoración por docente</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('/Mostrar_Valoraciones_Por_Materia') ?>">Mostrar Valoración por Materia</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('/mostrar_valoraciones') ?>">Mostrar Todas las Valoraciones</a></li>

              <li><a class="dropdown-item" href="#"></a></li>
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link disabled" aria-disabled="true"></a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Docente
            </a>
            <ul class="dropdown-menu">
             <li><a class="dropdown-item" href="<?= base_url('/Docente/create') ?>"> Agregar</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('/buscar_docente') ?>">Buscar</a></li>
              <li><a class="dropdown-item" href="<?php echo base_url('/Docente') ?>">Listar</a></li>

              <li><a class="dropdown-item" href="#"></a></li>
            </ul>
          </li>
          <!-- agrego opcion salir en el menu-->
          <li class="nav-item active">
            <a class="nav-link" href="<?php echo base_url('/salir')?>">Salir <span class="sr-only">(current)</span> </a>
          </li>

        </ul>

      </div>
    </div>
  </nav>

    </header>