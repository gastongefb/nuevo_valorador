
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Valorador v0.2</title>
    <link rel="icon" href="icono8.png" type="image/x-icon">
   
</head>

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


<style>
    /*ESTILOS PARA EL MENU
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

<div class="container mt-5">
    
    <h2 class="text-center text-primary fw-bold">Valoración de antecedentes</h2>
    
    <!-- Pestañas -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="titulos-tab" data-toggle="tab" href="#titulos" role="tab">Títulos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" id="otros-titulos-tab" data-toggle="tab" href="#otros-titulos" role="tab">Otros Títulos</a>
        </li>
             
        <li class="nav-item">
            <a class="nav-link disabled" id="pos-formacion-tab" data-toggle="tab" href="#pos-formacion" role="tab">Pos Formación</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" id="antiguedad-tab" data-toggle="tab" href="#antiguedad" role="tab">Antiguedad</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" id="formacion-recibida-tab" data-toggle="tab" href="#formacion-recibida" role="tab">Formación Recibida</a>
        </li>     
        <li class="nav-item">
            <a class="nav-link disabled" id="formacion-ofrecida-tab" data-toggle="tab" href="#formacion-ofrecida" role="tab">Formación Ofrecida</a>
        </li>   
        <li class="nav-item">
            <a class="nav-link disabled" id="investigacion-tab" data-toggle="tab" href="#investigacion" role="tab">Investigación</a>
        </li>  
        <li class="nav-item">
            <a class="nav-link disabled" id="otros-antecedentes-tab" data-toggle="tab" href="#otros-antecedentes" role="tab">Otros Antecedentes</a>
        </li> 
        <li class="nav-item">
            <a class="nav-link disabled" id="antecedentes-laborales-tab" data-toggle="tab" href="#antecedentes-laborales" role="tab">Antecedentes Laborales</a>
        </li>
        <!-- Agrega más pestañas según sea necesario -->
    </ul>

    <!-- Contenido de las pestañas -->
    <div class="tab-content mt-3" id="myTabContent">
        <!-- Pestaña de Títulos -->
        <div class="tab-pane fade show active" id="titulos" role="tabpanel">
            <form id="form-titulos" action="<?= base_url('guardarT') ?>" method="post">
                <!-- Formulario de Títulos -->
                <select name="id_materia_valoracion" class="form-control" required>
                    <option disabled selected>Seleccione la materia</option>
                    <?php foreach($materias as $ci): ?>
                    <option value="<?=$ci['id_materia']?>"><?=$ci['nombre_materia']?></option>
                    <?php endforeach; ?>
                </select> 
                <br>

                <select name="id_titulo" class="form-control" required>
                    <option disabled selected>Seleccione un Título</option>
                    <?php foreach($titulos as $c): ?>
                    <option value="<?=$c['id_titulo']?>"><?=$c['detalle_titulo']?></option>
                    <?php endforeach; ?>
                </select> 
                <br>

                <select name="dni" class="form-control" required>
                    <option disabled selected>Seleccione un docente</option>
                    <?php foreach($docente as $d): ?>
                    <option value="<?=$d['dni']?>"><?=$d['apellido']?></option>
                    <?php endforeach; ?>
                </select> 
                <br>

                <label for="j1">JURADO 1</label>
                <input type="text" name="j1" id="j1" placeholder="DNI" class="form-control" required>
                <br>
                <label for="j2">JURADO 2</label>
                <input type="text" name="j2" id="j2" placeholder="DNI" class="form-control" required>
                <br>
                <label for="j3">JURADO 3</label>
                <input type="text" name="j3" id="j3" placeholder="DNI" class="form-control" required>
                <br>
                <button type="submit" class="btn btn-primary" id="next-titulos">Guardar y Siguiente</button>
            </form>
        </div>
        
<style>
    /* Mejoras en el diseño */
    .table {
        border-radius: 10px;
        overflow: hidden;
    }

    .table thead {
        border-radius: 10px 10px 0 0;
    }

    .table th, .table td {
        text-align: center;
        vertical-align: middle;
    }

    .table-bordered {
        border: 1px solid #dee2e6;
    }

    /* Sombra y diseño más limpio */
    .shadow-sm {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    /* Bordes redondeados */
    .rounded {
        border-radius: 10px !important;
    }
</style>

<style>
    /* Asegura que los botones estén en la misma línea */
    td .d-flex {
        flex-wrap: nowrap;
        justify-content: center;
    }

    /* Espaciado entre botones */
    .d-flex.gap-2 > * {
        margin-right: 5px;
    }
</style>

<!-- Pestaña de Otros Títulos -->
<div class="tab-pane fade" id="otros-titulos" role="tabpanel">
    <form id="form-otros-titulos" action="<?= base_url('guardarOT') ?>" method="post">
    <h3 class="text-center mt-3 p-2 bg-primary text-white rounded">Otros Títulos</h3>

        <div id="personContainer7">
            <!-- Tabla con estilo mejorado -->
            <table id="personTable7" class="table table-bordered table-striped">
                <thead class="table-dark text-white" style="border-radius: 10px;">
                    <tr>
                        <th>Título</th>
                        <th>Detalle</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="person7">
                        <td>
                            <select class="form-control" name="persons7[1][id_otros_titulos]" id="opciones1">
                                <option value="1">Docente de nivel superior universitario</option>
                                <option value="2">Docente de nivel superior (No universitario)</option>
                                <option value="3">No docente de nivel superior universitario</option>
                                <option value="4">No docente de nivel superior</option>
                                <option value="5">Otros</option>
                            </select>
                        </td>
                        <td><input type="text" class="form-control" name="persons7[1][detalle_otros_titulos]" id="detalle_otros_titulos1"></td>
                        <td><input type="date" class="form-control fecha-restringida" name="persons7[1][fecha]" id="fecha1" max="<?= date('Y-m-d'); ?>"></td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm removePerson7">Eliminar</button>
                            <button type="button" class="btn btn-warning btn-sm editPerson7">Modificar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Botones alineados correctamente -->
        <div class="d-flex justify-content-between mt-3">
            <button type="button" id="addPerson7" class="btn btn-success">Agregar</button>
            <button type="submit" class="btn btn-secondary">Siguiente</button>
        </div>

        <!-- Modal de edición -->
        <div class="modal fade" id="editModal7" tabindex="-1" role="dialog" aria-labelledby="editModalLabel7" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel7">Editar Otros Títulos</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editForm">
                            <input type="hidden" id="editRowId7">
                            <div class="form-group">
                                <label for="editTitulo7">Título</label>
                                <select class="form-control" id="editTitulo7" name="editTitulo7">
                                    <option value="1">Docente de nivel superior universitario</option>
                                    <option value="2">Docente de nivel superior (No universitario)</option>
                                    <option value="3">No docente de nivel superior universitario</option>
                                    <option value="4">No docente de nivel superior</option>
                                    <option value="5">Otros</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="editDetalle7">Detalle</label>
                                <input type="text" class="form-control" id="editDetalle7" name="editDetalle7">
                            </div>
                            <div class="form-group">
                                <label for="editFecha7">Fecha</label>
                                <input type="date" class="form-control fecha-restringida" id="editFecha7" name="editFecha7" max="<?= date('Y-m-d'); ?>">
                            </div>
                            <button type="button" class="btn btn-primary" id="saveEdit7">Guardar cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                var maxPersons = 50;
                var personCount = 1;

                $('#addPerson7').click(function() {
                    if ($('#personTable7 tbody tr').length < maxPersons) {
                        personCount++;
                        var today = new Date().toISOString().split("T")[0]; // Obtener la fecha actual en formato YYYY-MM-DD
                        var html = `
                            <tr class="person7">
                                <td>
                                    <select class="form-control" name="persons7[${personCount}][id_otros_titulos]" id="opciones${personCount}">
                                        <option value="1">Docente de nivel superior universitario</option>
                                        <option value="2">Docente de nivel superior (No universitario)</option>
                                        <option value="3">No docente de nivel superior universitario</option>
                                        <option value="4">No docente de nivel superior</option>
                                        <option value="5">Otros</option>
                                    </select>
                                </td>
                                <td><input type="text" class="form-control" name="persons7[${personCount}][detalle_otros_titulos]" id="detalle_otros_titulos${personCount}"></td>
                                <td><input type="date" class="form-control fecha-restringida" name="persons7[${personCount}][fecha]" id="fecha${personCount}" max="${today}"></td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm removePerson7">Eliminar</button>
                                    <button type="button" class="btn btn-warning btn-sm editPerson7">Modificar</button>
                                </td>
                            </tr>
                        `;
                        $('#personTable7 tbody').append(html);
                    } else {
                        alert('Se ha alcanzado el límite máximo.');
                    }
                });

                $(document).on('click', '.removePerson7', function() {
                    $(this).closest('tr').remove();
                });

                $(document).on('click', '.editPerson7', function() {
                    var row = $(this).closest('tr');
                    var rowIndex = row.index();

                    var options = row.find('select').val();
                    var detalle = row.find('input[name$="[detalle_otros_titulos]"]').val();
                    var fecha = row.find('input[name$="[fecha]"]').val();

                    $('#editRowId7').val(rowIndex);
                    $('#editTitulo7').val(options);
                    $('#editDetalle7').val(detalle);
                    $('#editFecha7').val(fecha);

                    $('#editModal7').modal('show');
                });

                $('#saveEdit7').click(function() {
                    var rowIndex = $('#editRowId7').val();
                    var titulo = $('#editTitulo7').val();
                    var detalle = $('#editDetalle7').val();
                    var fecha = $('#editFecha7').val();

                    var row = $('#personTable7 tbody tr').eq(rowIndex);
                    row.find('select').val(titulo);
                    row.find('input[name$="[detalle_otros_titulos]"]').val(detalle);
                    row.find('input[name$="[fecha]"]').val(fecha);

                    $('#editModal7').modal('hide');
                });
            });
        </script>
    </form>
</div>



<!-- Pestaña de Postgrado -->
<div class="tab-pane fade" id="pos-formacion" role="tabpanel">
    <form id="form-pos-formacion" action="<?= base_url('guardarP') ?>" method="post">
    <h3 class="text-center mt-3 p-2 bg-primary text-white rounded">Pos Formación</h3>

        <div id="personContainer1">
            <!-- Tabla con estilo mejorado -->
            <table id="personTable1" class="table table-bordered table-striped">
                <thead class="table-dark text-white" style="border-radius: 10px;">
                    <tr>
                        <th>Título</th>
                        <th>Detalle</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="person">
                        <td>
                            <select class="form-control" name="persons[1][id_titulo_postgrado]" id="opciones1">
                               <option value="1">Actualización académica (200 horas cátedra o más)</option>
                               <option value="2">Especialización docente de Nivel Superior (400 horas cátedra o más)</option>
                               <option value="3">Diplomatura Superior (600 horas cátedra o más)</option>
                               <option value="4">Especialización (360 horas o más)</option>
                               <option value="5">Maestría (700 horas reloj o más)</option>
                               <option value="6">Doctorado</option>
                               <option value="7">Postdoctorado</option>
                            </select>
                        </td>
                        <td><input type="text" class="form-control" name="persons[1][detalle_valoracion_postgrado]" id="detalle_valoracion_postgrado1"></td>
                        <td><input type="date" class="form-control" name="persons[1][fecha]" id="fecha1"></td>
                        <td class="text-center">
                                  <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-danger btn-sm removePerson">Eliminar</button>
                                    <button type="button" class="btn btn-warning btn-sm editPerson">Modificar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Botones alineados correctamente -->
        <div class="d-flex justify-content-between mt-3">
            <button type="button" id="addPerson" class="btn btn-success">Agregar</button>
            <button type="submit" class="btn btn-secondary">Siguiente</button>
        </div>

        <!-- Modal de edición -->
        <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Editar Pos Títulos</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editForm">
                            <input type="hidden" id="editRowId">
                            <div class="form-group">
                                <label for="editTitulo">Título</label>
                                <select class="form-control" id="editTitulo" name="editTitulo">
                                   <option value="1">Actualización académica (200 horas cátedra o más)</option>
                                   <option value="2">Especialización docente de Nivel Superior (400 horas cátedra o más)</option>
                                   <option value="3">Diplomatura Superior (600 horas cátedra o más)</option>
                                   <option value="4">Especialización (360 horas o más)</option>
                                   <option value="5">Maestría (700 horas reloj o más)</option>
                                   <option value="6">Doctorado</option>
                                   <option value="7">Postdoctorado</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="editDetalle">Detalle</label>
                                <input type="text" class="form-control" id="editDetalle" name="editDetalle">
                            </div>
                            <div class="form-group">
                                <label for="editFecha">Fecha</label>
                                <input type="date" class="form-control" id="editFecha" name="editFecha">
                            </div>
                            <button type="button" class="btn btn-primary" id="saveEdit">Guardar cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                var maxPersons = 50;
                var personCount = 1;

                $('#addPerson').click(function() {
                    if ($('#personTable1 tbody tr').length < maxPersons) {
                        personCount++;
                        var html = `
                            <tr class="person">
                                <td>
                                    <select class="form-control" name="persons[${personCount}][id_titulo_postgrado]" id="opciones${personCount}">
                                        <option value="1">Docente de nivel superior universitario</option>
                                        <option value="2">Docente de nivel superior (No universitario)</option>
                                        <option value="3">No docente de nivel superior universitario</option>
                                        <option value="4">No docente de nivel superior</option>
                                        <option value="5">Otros</option>
                                    </select>
                                </td>
                                <td><input type="text" class="form-control" name="persons[${personCount}][detalle_valoracion_postgrado]" id="detalle_valoracion_postgrado1${personCount}"></td>
                                <td><input type="date" class="form-control" name="persons[${personCount}][fecha]" id="fecha${personCount}"></td>
                                <td class="text-center">
                                  <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-danger btn-sm removePerson">Eliminar</button>
                                    <button type="button" class="btn btn-warning btn-sm editPerson">Modificar</button>
                                </td>
                            </tr>
                        `;
                        $('#personTable tbody').append(html);
                    } else {
                        alert('Se ha alcanzado el límite máximo.');
                    }
                });

                $(document).on('click', '.removePerson', function() {
                    $(this).closest('tr').remove();
                });

                $(document).on('click', '.editPerson', function() {
                    var row = $(this).closest('tr');
                    var rowIndex = row.index();

                    var options = row.find('select').val();
                    var detalle = row.find('input[name$="[detalle_valoracion_postgrado]"]').val();
                    var fecha = row.find('input[name$="[fecha]"]').val();

                    $('#editRowId').val(rowIndex);
                    $('#editTitulo').val(options);
                    $('#editDetalle').val(detalle);
                    $('#editFecha').val(fecha);

                    $('#editModal').modal('show');
                });

                $('#saveEdit').click(function() {
                    var rowIndex = $('#editRowId').val();
                    var titulo = $('#editTitulo').val();
                    var detalle = $('#editDetalle').val();
                    var fecha = $('#editFecha').val();

                    var row = $('#personTable tbody tr').eq(rowIndex);
                    row.find('select').val(titulo);
                    row.find('input[name$="[detalle_valoracion_postgrado]"]').val(detalle);
                    row.find('input[name$="[fecha]"]').val(fecha);

                    $('#editModal').modal('hide');
                });
            });
        </script>
    </form>
</div>


<!-- Pestaña de Antiguedad -->
<div class="tab-pane fade" id="antiguedad" role="tabpanel">
    <form id="form-antiguedad" action="<?= base_url('guardarA') ?>" method="post">
    <h3 class="text-center mt-3 p-2 bg-primary text-white rounded">Antiguedad</h3>

        <div id="personContainer3">
            <!-- Tabla con estilo mejorado -->
            <table id="personTable3" class="table table-bordered table-striped">
                <thead class="table-dark text-white" style="border-radius: 10px;">
                    <tr>
                        <th>Título</th>
                        <th>Detalle</th>
                        <th>Cantidad de años</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="person3">
                        <td>
                            <select class="form-control" name="persons3[1][id_detalle_doc]" id="opciones1">
                                <option value="1">En la docencia</option>
                                <option value="2">En el nivel superior</option>
                                <option value="3">En el nivel superior técnico</option>
                                <option value="4">En la institución</option>
                                <option value="5">En la unidad curricular</option>
                            </select>
                        </td>
                        <td><input type="text" class="form-control" name="persons3[1][detalle_ant_doc]" id="detalle_ant_doc"></td>
                        <td><input type="text" class="form-control" name="persons3[1][cantidad]" id="cantidad1"></td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm removePerson3">Eliminar</button>
                            <button type="button" class="btn btn-warning btn-sm editPerson3">Modificar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Botones alineados correctamente -->
        <div class="d-flex justify-content-between mt-3">
            <button type="button" id="addPerson3" class="btn btn-success">Agregar</button>
            <button type="submit" class="btn btn-secondary">Siguiente</button>
        </div>

        <!-- Modal de edición -->
        <div class="modal fade" id="editModal3" tabindex="-1" role="dialog" aria-labelledby="editModalLabel3" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel3">Editar Antiguedad</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editForm">
                            <input type="hidden" id="editRowId3">
                            <div class="form-group">
                                <label for="editTitulo7">Título</label>
                                <select class="form-control" id="editTitulo3" name="editTitulo3">
                                     <option value="1">En la docencia</option>
                                     <option value="2">En el nivel superior</option>
                                     <option value="3">En el nivel superior técnico</option>
                                     <option value="4">En la institución</option>
                                     <option value="5">En la unidad curricular</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="editDetalle3">Detalle</label>
                                <input type="text" class="form-control" id="editDetalle3" name="editDetalle3">
                            </div>
                            <div class="form-group">
                                <label for="editFecha3">Cantidad de años</label>
                                <input type="text" class="form-control" id="editFecha3" name="editFecha3">
                            </div>
                            <button type="button" class="btn btn-primary" id="saveEdit3">Guardar cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                var maxPersons = 50;
                var personCount = 1;

                $('#addPerson3').click(function() {
                    if ($('#personTable3 tbody tr').length < maxPersons) {
                        personCount++;
                        var html = `
                            <tr class="person3">
                                <td>
                                    <select class="form-control" name="persons3[${personCount}][detalle_ant_doc]" id="opciones${personCount}">
                                        <option value="1">En la docencia</option>
                                        <option value="2">En el nivel superior</option>
                                        <option value="3">En el nivel superior técnico</option>
                                        <option value="4">En la institución</option>
                                        <option value="5">En la unidad curricular</option>
                                    </select>
                                </td>
                                <td><input type="text" class="form-control" name="persons3[${personCount}][detalle_ant_doc]" id="detalle_ant_doc${personCount}"></td>
                                <td><input type="text" class="form-control" name="persons3[${personCount}][cantidad]" id="cantidad${personCount}"></td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm removePerson3">Eliminar</button>
                                    <button type="button" class="btn btn-warning btn-sm editPerson3">Modificar</button>
                                </td>
                            </tr>
                        `;
                        $('#personTable3 tbody').append(html);
                    } else {
                        alert('Se ha alcanzado el límite máximo.');
                    }
                });

                $(document).on('click', '.removePerson3', function() {
                    $(this).closest('tr').remove();
                });

                $(document).on('click', '.editPerson3', function() {
                    var row = $(this).closest('tr');
                    var rowIndex = row.index();

                    var options = row.find('select').val();
                    var detalle = row.find('input[name$="[detalle_ant_doc]"]').val();
                    var fecha = row.find('input[name$="[cantidad]"]').val();

                    $('#editRowId3').val(rowIndex);
                    $('#editTitulo3').val(options);
                    $('#editDetalle3').val(detalle);
                    $('#editFecha3').val(fecha);

                    $('#editModal3').modal('show');
                });

                $('#saveEdit3').click(function() {
                    var rowIndex = $('#editRowId3').val();
                    var titulo = $('#editTitulo3').val();
                    var detalle = $('#editDetalle3').val();
                    var fecha = $('#editFecha3').val();

                    var row = $('#personTable3 tbody tr').eq(rowIndex);
                    row.find('select').val(titulo);
                    row.find('input[name$="[detalle_ant_doc]"]').val(detalle);
                    row.find('input[name$="[cantidad]"]').val(fecha);

                    $('#editModal3').modal('hide');
                });
            });
        </script>
    </form>
</div>

        
<!-- Pestaña de Formación Recibida -->
<div class="tab-pane fade" id="formacion-recibida" role="tabpanel">
    <form id="form-formacion-recibida" action="<?= base_url('guardarFR') ?>" method="post">
    <h3 class="text-center mt-3 p-2 bg-primary text-white rounded">Antiguedad</h3>

        <div id="personContainer4">
            <!-- Tabla con estilo mejorado -->
            <table id="personTable4" class="table table-bordered table-striped">
                <thead class="table-dark text-white" style="border-radius: 10px;">
                    <tr>
                        <th>Título</th>
                        <th>Detalle</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="person4">
                        <td>
                            <select class="form-control" name="persons4[1][id_detalle_capacitacion]" id="opciones1">
                            <option value="1">Diplomatura.Por certificación</option>
                               <option value="2">Curso de Postgrado.Más de 81 hs.</option>
                               <option value="3">Curso de Postgrado.Entre 41 y 80 hs.</option>
                               <option value="4">Curso de Postgrado.Entre 21 y 40 hs.</option>
                               <option value="5">Curso de Postgrado.Hasta 20 hs.</option>
                               <option value="6">Cursos.Con evaluación.41 o más horas</option>
                               <option value="7">Cursos.Con evaluación.Entre 21 y 40 hs.</option>
                               <option value="8">Trayectos.Hasta 20 hs.</option>
                               <option value="9">Trayectos.Donde consten días y no horas</option>
                               <option value="10">Trayectos.Sin evaluación</option>
                               <option value="11">Congresos.Eventos internacionales</option>
                               <option value="12">Congresos.Eventos nacionales</option>
                               <option value="13">Congresos.Eventos provinciales</option>
                               <option value="14">Congresos.Eventos departamentales</option>
                               <option value="15">Congresos.Eventos institucionales</option>
                            </select>
                        </td>
                        <td><input type="text" class="form-control" name="persons4[1][detalle_capacitacion]" id="detalle_capacitacion"></td>
                        <td><input type="date" class="form-control" name="persons4[1][fecha]" id="fecha1"></td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm removePerson4">Eliminar</button>
                            <button type="button" class="btn btn-warning btn-sm editPerson4">Modificar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Botones alineados correctamente -->
        <div class="d-flex justify-content-between mt-3">
            <button type="button" id="addPerson4" class="btn btn-success">Agregar</button>
            <button type="submit" class="btn btn-secondary">Siguiente</button>
        </div>

        <!-- Modal de edición -->
        <div class="modal fade" id="editModal4" tabindex="-1" role="dialog" aria-labelledby="editModalLabel4" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel4">Editar Formación Recibida</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editForm">
                            <input type="hidden" id="editRowId4">
                            <div class="form-group">
                                <label for="editTitulo4">Título</label>
                                <select class="form-control" id="editTitulo4" name="editTitulo4">
                                   <option value="1">Diplomatura.Por certificación</option>
                                   <option value="2">Curso de Postgrado.Más de 81 hs.</option>
                                   <option value="3">Curso de Postgrado.Entre 41 y 80 hs.</option>
                                   <option value="4">Curso de Postgrado.Entre 21 y 40 hs.</option>
                                   <option value="5">Curso de Postgrado.Hasta 20 hs.</option>
                                   <option value="6">Cursos.Con evaluación.41 o más horas</option>
                                   <option value="7">Cursos.Con evaluación.Entre 21 y 40 hs.</option>
                                   <option value="8">Trayectos.Hasta 20 hs.</option>
                                   <option value="9">Trayectos.Donde consten días y no horas</option>
                                   <option value="10">Trayectos.Sin evaluación</option>
                                   <option value="11">Congresos.Eventos internacionales</option>
                                   <option value="12">Congresos.Eventos nacionales</option>
                                   <option value="13">Congresos.Eventos provinciales</option>
                                   <option value="14">Congresos.Eventos departamentales</option>
                                   <option value="15">Congresos.Eventos institucionales</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="editDetalle4">Detalle</label>
                                <input type="text" class="form-control" id="editDetalle4" name="editDetalle4">
                            </div>
                            <div class="form-group">
                                <label for="editFecha4">Año</label>
                                <input type="date" class="form-control" id="editFecha4" name="editFecha4">
                            </div>
                            <button type="button" class="btn btn-primary" id="saveEdit4">Guardar cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                var maxPersons = 50;
                var personCount = 1;

                $('#addPerson4').click(function() {
                    if ($('#personTable4 tbody tr').length < maxPersons) {
                        personCount++;
                        var html = `
                            <tr class="person4">
                                <td>
                                    <select class="form-control" name="persons4[${personCount}][id_detalle_capacitacion]" id="opciones${personCount}">
                                        <option value="1">Diplomatura.Por certificación</option>
                                        <option value="2">Curso de Postgrado.Más de 81 hs.</option>
                                        <option value="3">Curso de Postgrado.Entre 41 y 80 hs.</option>
                                        <option value="4">Curso de Postgrado.Entre 21 y 40 hs.</option>
                                        <option value="5">Curso de Postgrado.Hasta 20 hs.</option>
                                        <option value="6">Cursos.Con evaluación.41 o más horas</option>
                                        <option value="7">Cursos.Con evaluación.Entre 21 y 40 hs.</option>
                                        <option value="8">Trayectos.Hasta 20 hs.</option>
                                        <option value="9">Trayectos.Donde consten días y no horas</option>
                                        <option value="10">Trayectos.Sin evaluación</option>
                                        <option value="11">Congresos.Eventos internacionales</option>
                                        <option value="12">Congresos.Eventos nacionales</option>
                                        <option value="13">Congresos.Eventos provinciales</option>
                                        <option value="14">Congresos.Eventos departamentales</option>
                                        <option value="15">Congresos.Eventos institucionales</option>
                                    </select>
                                </td>
                                <td><input type="text" class="form-control" name="persons4[${personCount}][detalle_capacitacion]" id="detalle_capacitacion${personCount}"></td>
                                <td><input type="date" class="form-control" name="persons4[${personCount}][fecha]" id="fecha${personCount}"></td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm removePerson4">Eliminar</button>
                                    <button type="button" class="btn btn-warning btn-sm editPerson4">Modificar</button>
                                </td>
                            </tr>
                        `;
                        $('#personTable4 tbody').append(html);
                    } else {
                        alert('Se ha alcanzado el límite máximo.');
                    }
                });

                $(document).on('click', '.removePerson4', function() {
                    $(this).closest('tr').remove();
                });

                $(document).on('click', '.editPerson4', function() {
                    var row = $(this).closest('tr');
                    var rowIndex = row.index();

                    var options = row.find('select').val();
                    var detalle = row.find('input[name$="[detalle_capacitacion]"]').val();
                    var fecha = row.find('input[name$="[fecha]"]').val();

                    $('#editRowId4').val(rowIndex);
                    $('#editTitulo4').val(options);
                    $('#editDetalle4').val(detalle);
                    $('#editFecha4').val(fecha);

                    $('#editModal4').modal('show');
                });

                $('#saveEdit4').click(function() {
                    var rowIndex = $('#editRowId4').val();
                    var titulo = $('#editTitulo4').val();
                    var detalle = $('#editDetalle4').val();
                    var fecha = $('#editFecha4').val();

                    var row = $('#personTable4 tbody tr').eq(rowIndex);
                    row.find('select').val(titulo);
                    row.find('input[name$="[detalle_capacitacion]"]').val(detalle);
                    row.find('input[name$="[fecha]"]').val(fecha);

                    $('#editModal4').modal('hide');
                });
            });
        </script>
    </form>
</div>

<!-- Pestaña de Formación Ofrecida -->
<div class="tab-pane fade" id="formacion-ofrecida" role="tabpanel">
    <form id="form-formacion-ofrecida" action="<?= base_url('guardarFO') ?>" method="post">
    <h3 class="text-center mt-3 p-2 bg-primary text-white rounded">Formación Ofrecida</h3>

        <div id="personContainer5">
            <!-- Tabla con estilo mejorado -->
            <table id="personTable5" class="table table-bordered table-striped">
                <thead class="table-dark text-white" style="border-radius: 10px;">
                    <tr>
                        <th>Título</th>
                        <th>Detalle</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="person5">
                        <td>
                            <select class="form-control" name="persons5[1][id_formacion_ofrecida]" id="opciones1">
                                <option value="1">Cursos,seminarios,foros,etc.Con normativa de aval de organismo oficial.Más de 81 hs.</option>
                                <option value="2">Cursos,seminarios,foros,etc.Con normativa de aval de organismo oficial.Entre 41 y 80 hs.</option>
                                <option value="3">Cursos,seminarios,foros,etc.Con normativa de aval de organismo oficial.Entre 21 y 40 hs.</option>
                                <option value="4">Cursos,seminarios,foros,etc.Con normativa de aval de organismo oficial.Hasta 20 hs.</option>
                                <option value="5">Cursos,seminarios,foros,etc.Sin normativa de aval de organismo oficial.Por certificación</option>
                                <option value="6">Congresos y Simposios.Eventos internacionales.Coordinador/moderador</option>
                                <option value="7">Congresos y Simposios.Eventos internacionales.Expositor/Distante</option>
                                <option value="8">Congresos y Simposios.Eventos nacionales.Coordinaodr/Moderador</option>
                                <option value="9">Congresos y Simposios.Eventos nacionales.Expositor/Disertante</option>
                                <option value="10">Congresos y Simposios.Eventos provinciales.Coordinador/moderador</option>
                                <option value="11">Congresos y Simposios.Eventos provinciales.Expositor/Disertante</option>
                                <option value="12">Congresos y Simposios.Eventos departamentales.Coordinador/moderador</option>
                                <option value="13">Congresos y Simposios.Eventos departamentales.Expositor/Disertante</option>
                                <option value="14">Congresos y Simposios.Eventos departamentales.Coordinador/moderador</option>
                                <option value="15">Congresos y Simposios.Eventos departamentales.Expositor/Disertante</option>
                                <option value="16">Congresos y Simposios.Eventos institucionales.Coordinador/moderador</option>
                                <option value="17">Congresos y Simposios.Eventos institucionales.Expositor/Disertante</option>
                            </select>
                        </td>
                        <td><input type="text" class="form-control" name="persons5[1][detalle_formacion]" id="detalle"></td>
                        <td><input type="date" class="form-control" name="persons5[1][fecha]" id="fecha1"></td>
                        <td class="text-center">
                                  <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-danger btn-sm removePerson5">Eliminar</button>
                                    <button type="button" class="btn btn-warning btn-sm editPerson5">Modificar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Botones alineados correctamente -->
        <div class="d-flex justify-content-between mt-3">
            <button type="button" id="addPerson5" class="btn btn-success">Agregar</button>
            <button type="submit" class="btn btn-secondary">Siguiente</button>
        </div>

        <!-- Modal de edición -->
        <div class="modal fade" id="editModal5" tabindex="-1" role="dialog" aria-labelledby="editModalLabel5" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel5">Editar Antiguedad</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editForm">
                            <input type="hidden" id="editRowId5">
                            <div class="form-group">
                                <label for="editTitulo5">Título</label>
                                <select class="form-control" id="editTitulo5" name="editTitulo5">
                                     <option value="1">Cursos,seminarios,foros,etc.Con normativa de aval de organismo oficial.Más de 81 hs.</option>
                                     <option value="2">Cursos,seminarios,foros,etc.Con normativa de aval de organismo oficial.Entre 41 y 80 hs.</option>
                                     <option value="3">Cursos,seminarios,foros,etc.Con normativa de aval de organismo oficial.Entre 21 y 40 hs.</option>
                                     <option value="4">Cursos,seminarios,foros,etc.Con normativa de aval de organismo oficial.Hasta 20 hs.</option>
                                     <option value="5">Cursos,seminarios,foros,etc.Sin normativa de aval de organismo oficial.Por certificación</option>
                                     <option value="6">Congresos y Simposios.Eventos internacionales.Coordinador/moderador</option>
                                     <option value="7">Congresos y Simposios.Eventos internacionales.Expositor/Distante</option>
                                     <option value="8">Congresos y Simposios.Eventos nacionales.Coordinaodr/Moderador</option>
                                     <option value="9">Congresos y Simposios.Eventos nacionales.Expositor/Disertante</option>
                                     <option value="10">Congresos y Simposios.Eventos provinciales.Coordinador/moderador</option>
                                     <option value="11">Congresos y Simposios.Eventos provinciales.Expositor/Disertante</option>
                                     <option value="12">Congresos y Simposios.Eventos departamentales.Coordinador/moderador</option>
                                     <option value="13">Congresos y Simposios.Eventos departamentales.Expositor/Disertante</option>
                                     <option value="14">Congresos y Simposios.Eventos departamentales.Coordinador/moderador</option>
                                     <option value="15">Congresos y Simposios.Eventos departamentales.Expositor/Disertante</option>
                                     <option value="16">Congresos y Simposios.Eventos institucionales.Coordinador/moderador</option>
                                     <option value="17">Congresos y Simposios.Eventos institucionales.Expositor/Disertante</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="editDetalle5">Detalle</label>
                                <input type="text" class="form-control" id="editDetalle5" name="editDetalle5">
                            </div>
                            <div class="form-group">
                                <label for="editFecha5">Fecha</label>
                                <input type="date" class="form-control" id="editFecha5" name="editFecha5">
                            </div>
                            <button type="button" class="btn btn-primary" id="saveEdit5">Guardar cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                var maxPersons = 50;
                var personCount = 1;

                $('#addPerson5').click(function() {
                    if ($('#personTable5 tbody tr').length < maxPersons) {
                        personCount++;
                        var html = `
                            <tr class="person5">
                                <td>
                                    <select class="form-control" name="persons5[${personCount}][id_formacion_ofrecida]" id="opciones${personCount}">
                                        <option value="1">Cursos,seminarios,foros,etc.Con normativa de aval de organismo oficial.Más de 81 hs.</option>
                                        <option value="2">Cursos,seminarios,foros,etc.Con normativa de aval de organismo oficial.Entre 41 y 80 hs.</option>
                                        <option value="3">Cursos,seminarios,foros,etc.Con normativa de aval de organismo oficial.Entre 21 y 40 hs.</option>
                                        <option value="4">Cursos,seminarios,foros,etc.Con normativa de aval de organismo oficial.Hasta 20 hs.</option>
                                        <option value="5">Cursos,seminarios,foros,etc.Sin normativa de aval de organismo oficial.Por certificación</option>
                                        <option value="6">Congresos y Simposios.Eventos internacionales.Coordinador/moderador</option>
                                        <option value="7">Congresos y Simposios.Eventos internacionales.Expositor/Distante</option>
                                        <option value="8">Congresos y Simposios.Eventos nacionales.Coordinaodr/Moderador</option>
                                        <option value="9">Congresos y Simposios.Eventos nacionales.Expositor/Disertante</option>
                                        <option value="10">Congresos y Simposios.Eventos provinciales.Coordinador/moderador</option>
                                        <option value="11">Congresos y Simposios.Eventos provinciales.Expositor/Disertante</option>
                                        <option value="12">Congresos y Simposios.Eventos departamentales.Coordinador/moderador</option>
                                        <option value="13">Congresos y Simposios.Eventos departamentales.Expositor/Disertante</option>
                                        <option value="14">Congresos y Simposios.Eventos departamentales.Coordinador/moderador</option>
                                        <option value="15">Congresos y Simposios.Eventos departamentales.Expositor/Disertante</option>
                                        <option value="16">Congresos y Simposios.Eventos institucionales.Coordinador/moderador</option>
                                        <option value="17">Congresos y Simposios.Eventos institucionales.Expositor/Disertante</option>
                                    </select>
                                </td>
                                <td><input type="text" class="form-control" name="persons5[${personCount}][detalle_formacion]" id="detalle${personCount}"></td>
                                <td><input type="date" class="form-control" name="persons5[${personCount}][fecha]" id="fecha${personCount}"></td>
                                <td class="text-center">
                                  <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-danger btn-sm removePerson5">Eliminar</button>
                                    <button type="button" class="btn btn-warning btn-sm editPerson5">Modificar</button>
                                </td>
                            </tr>
                        `;
                        $('#personTable5 tbody').append(html);
                    } else {
                        alert('Se ha alcanzado el límite máximo.');
                    }
                });

                $(document).on('click', '.removePerson5', function() {
                    $(this).closest('tr').remove();
                });

                $(document).on('click', '.editPerson5', function() {
                    var row = $(this).closest('tr');
                    var rowIndex = row.index();

                    var options = row.find('select').val();
                    var detalle = row.find('input[name$="[detalle_formacion]"]').val();
                    var fecha = row.find('input[name$="[fecha]"]').val();

                    $('#editRowId5').val(rowIndex);
                    $('#editTitulo5').val(options);
                    $('#editDetalle5').val(detalle);
                    $('#editFecha5').val(fecha);

                    $('#editModal5').modal('show');
                });

                $('#saveEdit5').click(function() {
                    var rowIndex = $('#editRowId5').val();
                    var titulo = $('#editTitulo5').val();
                    var detalle = $('#editDetalle5').val();
                    var fecha = $('#editFecha5').val();

                    var row = $('#personTable5 tbody tr').eq(rowIndex);
                    row.find('select').val(titulo);
                    row.find('input[name$="[detalle_formacion]"]').val(detalle);
                    row.find('input[name$="[fecha]"]').val(fecha);

                    $('#editModal5').modal('hide');
                });
            });
        </script>
    </form>
</div>

<!-- Pestaña de Formación Investigación -->
<div class="tab-pane fade" id="investigacion" role="tabpanel">
    <form id="form-investigacion" action="<?= base_url('guardarI') ?>" method="post">
    <h3 class="text-center mt-3 p-2 bg-primary text-white rounded">Investigación</h3>

        <div id="personContainer6">
            <!-- Tabla con estilo mejorado -->
            <table id="personTable6" class="table table-bordered table-striped">
                <thead class="table-dark text-white" style="border-radius: 10px;">
                    <tr>
                        <th>Título</th>
                        <th>Detalle</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="person6">
                        <td>
                            <select class="form-control" name="persons6[1][id_detalle_investigacion]" id="opciones1">
                            <option value="1">Diplomatura.Por certificación</option>
                               <option value="1">Proyecto de investigación relacionado con el espacio curricular y/o la carrera</option>
                               <option value="2">Publicaciones científicas y/o académcias.Libro.Autor</option>
                               <option value="3">Publicaciones científicas y/o académcias.Libro.Co-Autor</option>
                               <option value="4">Publicaciones científicas y/o académcias.Libro.Compilador</option>
                               <option value="5">Publicaciones científicas y/o académcias.Capítulo.Autor</option>
                               <option value="6">Publicaciones científicas y/o académcias.Capítulo.Co-Autor</option>
                               <option value="7">Publicaciones científicas y/o académcias.Capítulo.Compilador</option>
                               <option value="8">Publicaciones científicas y/o académcias.Artículo.Autor</option>
                               <option value="9">Publicaciones científicas y/o académcias.Artículo.Co-Autor</option>
                               <option value="10">Publicaciones científicas y/o académcias.Artículo.Compilador</option>
                               <option value="11">Otras publicaciones relativas a la especificidad de la carrera</option>
                            </select>
                        </td>
                        <td><input type="text" class="form-control" name="persons6[1][detalle_investigacion]" id="detalle_investigacion"></td>
                        <td><input type="date" class="form-control" name="persons6[1][fecha]" id="fecha1"></td>
                        <td class="text-center">
                                  <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-danger btn-sm removePerson6">Eliminar</button>
                                    <button type="button" class="btn btn-warning btn-sm editPerson6">Modificar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Botones alineados correctamente -->
        <div class="d-flex justify-content-between mt-3">
            <button type="button" id="addPerson6" class="btn btn-success">Agregar</button>
            <button type="submit" class="btn btn-secondary">Siguiente</button>
        </div>

        <!-- Modal de edición -->
        <div class="modal fade" id="editModal6" tabindex="-1" role="dialog" aria-labelledby="editModalLabel6" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel6">Editar Investigación</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editForm">
                            <input type="hidden" id="editRowId6">
                            <div class="form-group">
                                <label for="editTitulo6">Título</label>
                                <select class="form-control" id="editTitulo6" name="editTitulo6">
                                   <option value="1">Proyecto de investigación relacionado con el espacio curricular y/o la carrera</option>
                                   <option value="2">Publicaciones científicas y/o académcias.Libro.Autor</option>
                                   <option value="3">Publicaciones científicas y/o académcias.Libro.Co-Autor</option>
                                   <option value="4">Publicaciones científicas y/o académcias.Libro.Compilador</option>
                                   <option value="5">Publicaciones científicas y/o académcias.Capítulo.Autor</option>
                                   <option value="6">Publicaciones científicas y/o académcias.Capítulo.Co-Autor</option>
                                   <option value="7">Publicaciones científicas y/o académcias.Capítulo.Compilador</option>
                                   <option value="8">Publicaciones científicas y/o académcias.Artículo.Autor</option>
                                   <option value="9">Publicaciones científicas y/o académcias.Artículo.Co-Autor</option>
                                   <option value="10">Publicaciones científicas y/o académcias.Artículo.Compilador</option>
                                   <option value="11">Otras publicaciones relativas a la especificidad de la carrera</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="editDetalle6">Detalle</label>
                                <input type="text" class="form-control" id="editDetalle6" name="editDetalle6">
                            </div>
                            <div class="form-group">
                                <label for="editFecha6">Fecha</label>
                                <input type="date" class="form-control" id="editFecha6" name="editFecha6">
                            </div>
                            <button type="button" class="btn btn-primary" id="saveEdit6">Guardar cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                var maxPersons = 50;
                var personCount = 1;

                $('#addPerson6').click(function() {
                    if ($('#personTable6 tbody tr').length < maxPersons) {
                        personCount++;
                        var html = `
                            <tr class="person6">
                                <td>
                                    <select class="form-control" name="persons6[${personCount}][id_detalle_investigacion]" id="opciones${personCount}">
                                        <option value="1">Proyecto de investigación relacionado con el espacio curricular y/o la carrera</option>
                                        <option value="2">Publicaciones científicas y/o académcias.Libro.Autor</option>
                                        <option value="3">Publicaciones científicas y/o académcias.Libro.Co-Autor</option>
                                        <option value="4">Publicaciones científicas y/o académcias.Libro.Compilador</option>
                                        <option value="5">Publicaciones científicas y/o académcias.Capítulo.Autor</option>
                                        <option value="6">Publicaciones científicas y/o académcias.Capítulo.Co-Autor</option>
                                        <option value="7">Publicaciones científicas y/o académcias.Capítulo.Compilador</option>
                                        <option value="8">Publicaciones científicas y/o académcias.Artículo.Autor</option>
                                        <option value="9">Publicaciones científicas y/o académcias.Artículo.Co-Autor</option>
                                        <option value="10">Publicaciones científicas y/o académcias.Artículo.Compilador</option>
                                        <option value="11">Otras publicaciones relativas a la especificidad de la carrera</option>
                                    </select>
                                </td>
                                <td><input type="text" class="form-control" name="persons6[${personCount}][detalle_investigacion]" id="detalle_investigacion${personCount}"></td>
                                <td><input type="date" class="form-control" name="persons6[${personCount}][fecha]" id="fecha${personCount}"></td>
                                <td class="text-center">
                                  <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-danger btn-sm removePerson6">Eliminar</button>
                                    <button type="button" class="btn btn-warning btn-sm editPerson6">Modificar</button>
                                </td>
                            </tr>
                        `;
                        $('#personTable6 tbody').append(html);
                    } else {
                        alert('Se ha alcanzado el límite máximo.');
                    }
                });

                $(document).on('click', '.removePerson6', function() {
                    $(this).closest('tr').remove();
                });

                $(document).on('click', '.editPerson6', function() {
                    var row = $(this).closest('tr');
                    var rowIndex = row.index();

                    var options = row.find('select').val();
                    var detalle = row.find('input[name$="[detalle_investigacion]"]').val();
                    var fecha = row.find('input[name$="[fecha]"]').val();

                    $('#editRowId6').val(rowIndex);
                    $('#editTitulo6').val(options);
                    $('#editDetalle6').val(detalle);
                    $('#editFecha6').val(fecha);

                    $('#editModal6').modal('show');
                });

                $('#saveEdit6').click(function() {
                    var rowIndex = $('#editRowId6').val();
                    var titulo = $('#editTitulo6').val();
                    var detalle = $('#editDetalle6').val();
                    var fecha = $('#editFecha6').val();

                    var row = $('#personTable6 tbody tr').eq(rowIndex);
                    row.find('select').val(titulo);
                    row.find('input[name$="[detalle_investigacion]"]').val(detalle);
                    row.find('input[name$="[fecha]"]').val(fecha);

                    $('#editModal6').modal('hide');
                });
            });
        </script>
    </form>
</div>
      
<!-- Pestaña de Otros Antecedentes -->
<div class="tab-pane fade" id="otros-antecedentes" role="tabpanel">
    <form id="form-otros-antecedentes" action="<?= base_url('guardarOA') ?>" method="post">
    <h3 class="text-center mt-3 p-2 bg-primary text-white rounded">Otros Antecedentes</h3>

        <div id="personContainer8">
            <!-- Tabla con estilo mejorado -->
            <table id="personTable8" class="table table-bordered table-striped">
                <thead class="table-dark text-white" style="border-radius: 10px;">
                    <tr>
                        <th>Título</th>
                        <th>Detalle</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="person8">
                        <td>
                            <select class="form-control" name="persons8[1][id_detalle_otros_ant]" id="opciones1">
                               <option value="1">Diplomatura.Por certificación</option>
                               <option value="1">Jurado de concursos de valoración de antecedentes(hasta un 1 punto)</option>
                               <option value="2">Miembro del comité de elaboración e diseños curriculares de carreras de Nivel Superior.Coordinador</option>
                               <option value="3">Miembro del comité de elaboración e diseños curriculares de carreras de Nivel Superior.Colaboradores</option>
                               <option value="4">Becas,concursos,premios relacionados con el espacio curricular y con la carrera,realizados en los últimos 5 años Internacionales</option>
                               <option value="5">Becas,concursos,premios relacionados con el espacio curricular y con la carrera,realizados en los últimos 5 años Nacionales</option>
                               <option value="6">Becas,concursos,premios relacionados con el espacio curricular y con la carrera,realizados en los últimos 5 años Provinciales</option>
                               <option value="7">Antecedentes en gestión(por año de gestión o fracción mayor a 6 meses)hasta cuatro(4)puntos.Rector</option>
                               <option value="8">Antecedentes en gestión(por año de gestión o fracción mayor a 6 meses)hasta cuatro(4)puntos.Coordinador</option>
                            </select>
                        </td>
                        <td><input type="text" class="form-control" name="persons8[1][detalle_otros_ant_doc]" id="detalle_otros_ant_doc"></td>
                        <td><input type="date" class="form-control" name="persons8[1][fecha]" id="fecha1"></td>
                        <td class="text-center">
                                  <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-danger btn-sm removePerson8">Eliminar</button>
                                    <button type="button" class="btn btn-warning btn-sm editPerson8">Modificar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Botones alineados correctamente -->
        <div class="d-flex justify-content-between mt-3">
            <button type="button" id="addPerson8" class="btn btn-success">Agregar</button>
            <button type="submit" class="btn btn-secondary">Siguiente</button>
        </div>

        <!-- Modal de edición -->
        <div class="modal fade" id="editModal8" tabindex="-1" role="dialog" aria-labelledby="editModalLabel8" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel8">Editar Otros Antecedente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editForm">
                            <input type="hidden" id="editRowId8">
                            <div class="form-group">
                                <label for="editTitulo8">Título</label>
                                <select class="form-control" id="editTitulo8" name="editTitulo8">
                                   <option value="1">Jurado de concursos de valoración de antecedentes(hasta un 1 punto)</option>
                                   <option value="2">Miembro del comité de elaboración e diseños curriculares de carreras de Nivel Superior.Coordinador</option>
                                   <option value="3">Miembro del comité de elaboración e diseños curriculares de carreras de Nivel Superior.Colaboradores</option>
                                   <option value="4">Becas,concursos,premios relacionados con el espacio curricular y con la carrera,realizados en los últimos 5 años Internacionales</option>
                                   <option value="5">Becas,concursos,premios relacionados con el espacio curricular y con la carrera,realizados en los últimos 5 años Nacionales</option>
                                   <option value="6">Becas,concursos,premios relacionados con el espacio curricular y con la carrera,realizados en los últimos 5 años Provinciales</option>
                                   <option value="7">Antecedentes en gestión(por año de gestión o fracción mayor a 6 meses)hasta cuatro(4)puntos.Rector</option>
                                   <option value="8">Antecedentes en gestión(por año de gestión o fracción mayor a 6 meses)hasta cuatro(4)puntos.Coordinador</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="editDetalle8">Detalle</label>
                                <input type="text" class="form-control" id="editDetalle8" name="editDetalle8">
                            </div>
                            <div class="form-group">
                                <label for="editFecha8">Fecha</label>
                                <input type="date" class="form-control" id="editFecha8" name="editFecha8">
                            </div>
                            <button type="button" class="btn btn-primary" id="saveEdit8">Guardar cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                var maxPersons = 50;
                var personCount = 1;

                $('#addPerson8').click(function() {
                    if ($('#personTable8 tbody tr').length < maxPersons) {
                        personCount++;
                        var html = `
                            <tr class="person8">
                                <td>
                                    <select class="form-control" name="persons8[${personCount}][id_detalle_otros_ant]" id="opciones${personCount}">
                                        <option value="1">Jurado de concursos de valoración de antecedentes(hasta un 1 punto)</option>
                                        <option value="2">Miembro del comité de elaboración e diseños curriculares de carreras de Nivel Superior.Coordinador</option>
                                        <option value="3">Miembro del comité de elaboración e diseños curriculares de carreras de Nivel Superior.Colaboradores</option>
                                        <option value="4">Becas,concursos,premios relacionados con el espacio curricular y con la carrera,realizados en los últimos 5 años Internacionales</option>
                                        <option value="5">Becas,concursos,premios relacionados con el espacio curricular y con la carrera,realizados en los últimos 5 años Nacionales</option>
                                        <option value="6">Becas,concursos,premios relacionados con el espacio curricular y con la carrera,realizados en los últimos 5 años Provinciales</option>
                                        <option value="7">Antecedentes en gestión(por año de gestión o fracción mayor a 6 meses)hasta cuatro(4)puntos.Rector</option>
                                        <option value="8">Antecedentes en gestión(por año de gestión o fracción mayor a 6 meses)hasta cuatro(4)puntos.Coordinador</option>
                                    </select>
                                </td>
                                <td><input type="text" class="form-control" name="persons8[${personCount}][detalle_otros_ant_doc]" id="detalle_otros_ant_doc${personCount}"></td>
                                <td><input type="date" class="form-control" name="persons8[${personCount}][fecha]" id="fecha${personCount}"></td>
                                <td class="text-center">
                                  <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-danger btn-sm removePerson8">Eliminar</button>
                                    <button type="button" class="btn btn-warning btn-sm editPerson8">Modificar</button>
                                </td>
                            </tr>
                        `;
                        $('#personTable8 tbody').append(html);
                    } else {
                        alert('Se ha alcanzado el límite máximo.');
                    }
                });

                $(document).on('click', '.removePerson8', function() {
                    $(this).closest('tr').remove();
                });

                $(document).on('click', '.editPerson8', function() {
                    var row = $(this).closest('tr');
                    var rowIndex = row.index();

                    var options = row.find('select').val();
                    var detalle = row.find('input[name$="[detalle_otros_ant_doc]"]').val();
                    var fecha = row.find('input[name$="[fecha]"]').val();

                    $('#editRowId8').val(rowIndex);
                    $('#editTitulo8').val(options);
                    $('#editDetalle8').val(detalle);
                    $('#editFecha8').val(fecha);

                    $('#editModal8').modal('show');
                });

                $('#saveEdit8').click(function() {
                    var rowIndex = $('#editRowId8').val();
                    var titulo = $('#editTitulo8').val();
                    var detalle = $('#editDetalle8').val();
                    var fecha = $('#editFecha8').val();

                    var row = $('#personTable8 tbody tr').eq(rowIndex);
                    row.find('select').val(titulo);
                    row.find('input[name$="[detalle_otros_ant_doc]"]').val(detalle);
                    row.find('input[name$="[fecha]"]').val(fecha);

                    $('#editModal8').modal('hide');
                });
            });
        </script>
    </form>
</div>

<!-- Pestaña de Antecedentes Laborales -->
<div class="tab-pane fade" id="antecedentes-laborales" role="tabpanel">
    <form id="form-antecedentes-laborales" action="<?= base_url('guardarAL') ?>" method="post">
    <h3 class="text-center mt-3 p-2 bg-primary text-white rounded">Antecedentes Laborales</h3>

        <div id="personContainer9">
            <!-- Tabla con estilo mejorado -->
            <table id="personTable9" class="table table-bordered table-striped">
                <thead class="table-dark text-white" style="border-radius: 10px;">
                    <tr>
                        <th>Título</th>
                        <th>Detalle</th>
                        <th>Cantidad de Años</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="person9">
                        <td>
                            <select class="form-control" name="persons9[1][id_detalle_lab]" id="opciones1">
                               <option value="1">Antecedentes en relación de dependencias(con organismos del Estado o privados)</option>
                               <option value="2">Antecedentes sin relación de dependencia y/o emprendimientos propios</option>
                            </select>
                        </td>
                        <td><input type="text" class="form-control" name="persons9[1][detalle_ant_lab]" id="detalle_ant_lab"></td>
                        <td><input type="text" class="form-control" name="persons9[1][cantidad]" id="cantidad1"></td>
                        <td class="text-center">
                                  <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-danger btn-sm removePerson9">Eliminar</button>
                                    <button type="button" class="btn btn-warning btn-sm editPerson9">Modificar</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Botones alineados correctamente -->
        <div class="d-flex justify-content-between mt-3">
            <button type="button" id="addPerson9" class="btn btn-success">Agregar</button>
            <button type="submit" class="btn btn-secondary">Siguiente</button>
        </div>

        <!-- Modal de edición -->
        <div class="modal fade" id="editModal9" tabindex="-1" role="dialog" aria-labelledby="editModalLabel9" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel9">Editar Antecedentes Laborales</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editForm">
                            <input type="hidden" id="editRowId9">
                            <div class="form-group">
                                <label for="editTitulo9">Título</label>
                                <select class="form-control" id="editTitulo9" name="editTitulo9">
                                   <option value="1">Antecedentes en relación de dependencias(con organismos del Estado o privados)</option>
                                   <option value="2">Antecedentes sin relación de dependencia y/o emprendimientos propios</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="editDetalle9">Detalle</label>
                                <input type="text" class="form-control" id="editDetalle9" name="editDetalle9">
                            </div>
                            <div class="form-group">
                                <label for="editFecha9">Cantidad de Años</label>
                                <input type="text" class="form-control" id="editFecha9" name="editFecha9">
                            </div>
                            <button type="button" class="btn btn-primary" id="saveEdit9">Guardar cambios</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                var maxPersons = 50;
                var personCount = 1;

                $('#addPerson9').click(function() {
                    if ($('#personTable9 tbody tr').length < maxPersons) {
                        personCount++;
                        var html = `
                            <tr class="person9">
                                <td>
                                    <select class="form-control" name="persons9[${personCount}][id_detalle_lab]" id="opciones${personCount}">
                                        <option value="1">Antecedentes en relación de dependencias(con organismos del Estado o privados)</option>
                                        <option value="2">Antecedentes sin relación de dependencia y/o emprendimientos propios</option>
                                    </select>
                                </td>
                                <td><input type="text" class="form-control" name="persons9[${personCount}][detalle_ant_lab]" id="detalle_ant_lab${personCount}"></td>
                                <td><input type="date" class="form-control" name="persons9[${personCount}][cantidad]" id="cantidad${personCount}"></td>
                                <td class="text-center">
                                  <div class="d-flex gap-2">
                                    <button type="button" class="btn btn-danger btn-sm removePerson9">Eliminar</button>
                                    <button type="button" class="btn btn-warning btn-sm editPerson9">Modificar</button>
                                </td>
                            </tr>
                        `;
                        $('#personTable9 tbody').append(html);
                    } else {
                        alert('Se ha alcanzado el límite máximo.');
                    }
                });

                $(document).on('click', '.removePerson9', function() {
                    $(this).closest('tr').remove();
                });

                $(document).on('click', '.editPerson9', function() {
                    var row = $(this).closest('tr');
                    var rowIndex = row.index();

                    var options = row.find('select').val();
                    var detalle = row.find('input[name$="[detalle_ant_lab]"]').val();
                    var fecha = row.find('input[name$="[cantidad]"]').val();

                    $('#editRowId9').val(rowIndex);
                    $('#editTitulo9').val(options);
                    $('#editDetalle9').val(detalle);
                    $('#editFecha9').val(fecha);

                    $('#editModal9').modal('show');
                });

                $('#saveEdit9').click(function() {
                    var rowIndex = $('#editRowId9').val();
                    var titulo = $('#editTitulo9').val();
                    var detalle = $('#editDetalle9').val();
                    var fecha = $('#editFecha9').val();

                    var row = $('#personTable9 tbody tr').eq(rowIndex);
                    row.find('select').val(titulo);
                    row.find('input[name$="[detalle_ant_lab]"]').val(detalle);
                    row.find('input[name$="[cantidad]"]').val(fecha);

                    $('#editModal9').modal('hide');
                });
            });
        </script>
    </form>
</div>

    
</form>

        </div>
    </div>
</div>

<script>
    // Variables para controlar el estado de las pestañas
    var pestanasCompletadas = [];

    // Función para habilitar pestañas previas
    function habilitarPestanasPrevias() {
        pestanasCompletadas.forEach(function(pestana) {
            $("#" + pestana + "-tab").removeClass('disabled');
        });
    }

    // Manejadores para los botones de siguiente en cada formulario
    $('#form-titulos').on('submit', function (e) {
        e.preventDefault();
        var form = $(this);
        $.post(form.attr('action'), form.serialize(), function () {
            // Agregar 'titulos' a las pestañas completadas
            if (!pestanasCompletadas.includes('titulos')) {
                pestanasCompletadas.push('titulos');
            }
            habilitarPestanasPrevias();
            // Habilitar y mostrar la siguiente pestaña
            $('#otros-titulos-tab').removeClass('disabled');
            $('#otros-titulos-tab').tab('show');
        }).fail(function() {
            alert('Error al guardar los datos de Títulos.');
        });
    });

    $('#form-otros-titulos').on('submit', function (e) {
        e.preventDefault();
        var form = $(this);
        $.post(form.attr('action'), form.serialize(), function () {
            if (!pestanasCompletadas.includes('otros-titulos')) {
                pestanasCompletadas.push('otros-titulos');
            }
            habilitarPestanasPrevias();
            $('#pos-formacion-tab').removeClass('disabled');
            $('#pos-formacion-tab').tab('show');
        }).fail(function() {
            alert('Error al guardar los datos de Otros Títulos.');
        });
    });

    $('#form-pos-formacion').on('submit', function (e) {
        e.preventDefault();
        var form = $(this);
        $.post(form.attr('action'), form.serialize(), function () {
            if (!pestanasCompletadas.includes('pos-formacion')) {
                pestanasCompletadas.push('pos-formacion');
            }
            habilitarPestanasPrevias();
            $('#antiguedad-tab').removeClass('disabled');
            $('#antiguedad-tab').tab('show');
        }).fail(function() {
            alert('Error al guardar los datos de Postgrado.');
        });
    });

    $('#form-antiguedad').on('submit', function (e) {
        e.preventDefault();
        var form = $(this);
        $.post(form.attr('action'), form.serialize(), function () {
            if (!pestanasCompletadas.includes('antiguedad')) {
                pestanasCompletadas.push('antiguedad');
            }
            habilitarPestanasPrevias();
            $('#formacion-recibida-tab').removeClass('disabled');
            $('#formacion-recibida-tab').tab('show');
        }).fail(function() {
            alert('Error al guardar los datos de Antiguedad.');
        });
    });

    $('#form-formacion-recibida').on('submit', function (e) {
        e.preventDefault();
        var form = $(this);
        $.post(form.attr('action'), form.serialize(), function () {
            if (!pestanasCompletadas.includes('formacion-recibida')) {
                pestanasCompletadas.push('formacion-recibida');
            }
            habilitarPestanasPrevias();
            $('#formacion-ofrecida-tab').removeClass('disabled');
            $('#formacion-ofrecida-tab').tab('show');
        }).fail(function() {
            alert('Error al guardar los datos de Formación Recibida.');
        });
    });

    $('#form-formacion-ofrecida').on('submit', function (e) {
        e.preventDefault();
        var form = $(this);
        $.post(form.attr('action'), form.serialize(), function () {
            if (!pestanasCompletadas.includes('formacion-ofrecida')) {
                pestanasCompletadas.push('formacion-ofrecida');
            }
            habilitarPestanasPrevias();
            $('#investigacion-tab').removeClass('disabled');
            $('#investigacion-tab').tab('show');
        }).fail(function() {
            alert('Error al guardar los datos de Formación Ofrecida.');
        });
    });

    $('#form-investigacion').on('submit', function (e) {
        e.preventDefault();
        var form = $(this);
        $.post(form.attr('action'), form.serialize(), function () {
            if (!pestanasCompletadas.includes('investigacion')) {
                pestanasCompletadas.push('investigacion');
            }
            habilitarPestanasPrevias();
           
            $('#otros-antecedentes-tab').removeClass('disabled');
            $('#otros-antecedentes-tab').tab('show');
        }).fail(function() {
            alert('Error al guardar los datos de Investigación.');
        });
    });

    $('#form-otros-antecedentes').on('submit', function (e) {
        e.preventDefault();
        var form = $(this);
        $.post(form.attr('action'), form.serialize(), function () {
            if (!pestanasCompletadas.includes('otros-antecedentes')) {
                pestanasCompletadas.push('otros-antecedentes');
            }
            habilitarPestanasPrevias();
            
            $('#antecedentes-laborales-tab').removeClass('disabled');
            $('#antecedentes-laborales-tab').tab('show');
        }).fail(function() {
            alert('Error al guardar los datos de otros antecedentes.');
        });
    });


    $('#form-antecedentes-laborales').on('submit', function (e) {
    e.preventDefault();

    // Serializar los datos del formulario y filtrar los campos no deseados
    var formArray = $(this).serializeArray().filter(function(item) {
        return item.name !== 'editTitulo' && item.name !== 'editDetalle' && item.name !== 'editFecha';
    });

    $.post($(this).attr('action'), $.param(formArray), function () {
        if (!pestanasCompletadas.includes('antecedentes-laborales')) {
            pestanasCompletadas.push('antecedentes-laborales');
        }
        habilitarPestanasPrevias();
        alert('Datos completados. Guardando en la base de datos...');
        window.location.href = "<?=base_url('guardarDatosFinales') ?>";
    }).fail(function() {
        alert('Error al guardar los datos de antecedentes laborales.');
    });
});

    // Al cargar la página, habilitar las pestañas completadas si existen datos en la sesión
    $(document).ready(function() {
        <?php if (!empty($datos_titulos)): ?>
            pestanasCompletadas.push('titulos');
            $('#otros-titulos-tab').removeClass('disabled');
        <?php endif; ?>
        <?php if (!empty($datos_otros_titulos)): ?>
            pestanasCompletadas.push('otros-titulos');
            $('#pos-formacion-tab').removeClass('disabled');
        <?php endif; ?>
        <?php if (!empty($datos_postgrado)): ?>
            pestanasCompletadas.push('pos-formacion');
            $('#antiguedad-tab').removeClass('disabled');
        <?php endif; ?>
        <?php if (!empty($datos_antiguedad)): ?>
            pestanasCompletadas.push('antiguedad');
            $('#formacion-recibida-tab').removeClass('disabled');
        <?php endif; ?>
        <?php if (!empty($datos_fr)): ?>
            pestanasCompletadas.push('formacion-recibida');
            $('#formacion-ofrecida-tab').removeClass('disabled');
        <?php endif; ?>
        <?php if (!empty($datos_fo)): ?>
            pestanasCompletadas.push('formacion-ofrecida');
            $('#investigacion-tab').removeClass('disabled');
        <?php endif; ?>
        <?php if (!empty($datos_i)): ?>
            pestanasCompletadas.push('investigacion');
            $('#otros-antecedentes-tab').removeClass('disabled');
        <?php endif; ?>
        <?php if (!empty($datos_oa)): ?>
            pestanasCompletadas.push('otros-antecedentes');
            $('#antecedentes-laborales-tab').removeClass('disabled');
        <?php endif; ?>
        <?php if (!empty($datos_al)): ?>
            pestanasCompletadas.push('antecedentes-laborales');
            $('#antecedentes-laborales-tab').removeClass('disabled');
        <?php endif; ?>
        
        habilitarPestanasPrevias();
    });
</script>



