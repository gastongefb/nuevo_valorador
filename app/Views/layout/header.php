<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valorador v0.2</title>
    <link rel="icon" href="icono8.png" type="image/x-icon">

    
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        /* Centrar el navbar */
        .navbar-custom {
            background-color: #f8f9fa;
            padding: 15px;
        }

        /* Estilos para el usuario */
        .usuario-info {
            font-size: 18px;
            font-weight: bold;
            margin-right: 15px;
        }

        /* Centrar el contenido del menú */
        .navbar-nav {
            margin: auto;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        /* Alinear el texto en las celdas de las tablas */
        .table td, .table th {
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
        <div class="container">
            <!-- Nombre del usuario centrado -->
            <span class="usuario-info text-primary">
                <i class="fas fa-user"></i> Usuario: <?= session('usuario'); ?>
            </span>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Planes de Estudio</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?= base_url('/mostrarPlanes') ?>">Listado de Planes</a></li>
                            <li><a class="dropdown-item" href="#">Cargar Plan</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Materias</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?= base_url('/insertar_materia1') ?>">Cargar Materias</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('/materias') ?>">Actualizar Materias</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Valoraciones</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?= base_url('/cargar_datos') ?>">Cargar Nueva valoración</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('/mostrar_valoraciones_porDocente_porMateria1') ?>">Actualizar Valoración</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('/buscar_valoracion_por_docente') ?>">Buscar valoración por Docente</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('/Mostrar_Valoraciones_Por_Materia') ?>">Mostrar valoración por Materia</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('/mostrar_valoraciones') ?>">Mostrar Todas las valoraciones</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Docente</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?= base_url('/Docente/create') ?>">Agregar</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('/buscar_docente') ?>">Buscar</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('/Docente') ?>">Listar</a></li>
                        </ul>
                    </li>

                    <!-- Opción Salir -->
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="<?= base_url('/salir') ?>"><i class="fas fa-sign-out-alt"></i> Salir</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

</body>
</html>
