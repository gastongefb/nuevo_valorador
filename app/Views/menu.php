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
