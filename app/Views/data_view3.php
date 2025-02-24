<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Valoración de Otros Títulos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- ESTILO PARA CENTRAR EL LINK DE VOLVER-->
    <style>
        .center-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 10vh; /* This makes the container full height */
            text-align: center; /* Centers the text inside the link */
        }
        a {
            text-decoration: none;
            font-size: 20px;
            color: #007BFF;
        }

          /* Aumentar el ancho de la columna de acciones */
          .table .actions-column {
            width: 250px; /* Ajusta este valor según tus necesidades */
        }
    </style>


<!-- Estilos para el modal de detalle, pero tambien se aplica a las otras tablas -->
<style>
    /* Aumentar el ancho del modal */
    .modal-lg {
        max-width: 80%; /* Puedes ajustarlo a tu necesidad */
    }

    /* Estilo para centrar el texto dentro de las celdas de la tabla */
    table th, table td {
        text-align: center;
        vertical-align: middle; /* Centra verticalmente */
    }

    /* Puedes agregar más estilos para mejorar la presentación de la tabla */
    table {
        width: 100%;
        table-layout: fixed; /* Hace que las columnas tengan el mismo tamaño */
    }

    /* Ajustar las celdas de la tabla */
    table td, table th {
        word-wrap: break-word; /* Asegura que el texto largo no desborde */
        padding: 10px;
    }
</style>
</head>
<body>
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
<?php

//print_r($datosTabla1); 
//echo"--------------";
//print_r($datosTabla2); 
//echo"---------------";
foreach ($datosTabla1 as $item) {
    //echo "DNI: " . $item['dni'] . "<br>";
   // echo "Título: " . $item['titulo'] . "<br>";
   // echo "Materia: " . $item['materia'] . "<br>";
   // echo "Puntaje: " . $item['puntaje'] . "<br><br>";
   // echo "nombre: " . $item['nombre'] . "<br><br>";
    $n = $item['nombre'];
    $a = $item['apellido'];
    
}
//print_r($datosTabla2);
?>

<!-- Tabla 0 -->
<div class="container mt-5">
    <h1 class="text-center">Actualización de Valoración</h1>
    <h3 class="text-center">Docente: <?php echo htmlspecialchars($n)." ".htmlspecialchars($a); ?></h3>
    <br>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Id</th>
            <th>Dni</th>
            <th>J1</th>
            <th>J2</th>
            <th>J3</th>
            <th>Materia</th>
            <th>Título</th>
            <th class="actions-column">Acciones</th>
        </tr>
        </thead>
        <tbody id="recordTable0">
        <?php foreach ($datosTabla1 as $record): 
            
            //$vvv = $record['id_valoracion'];
            //$f = $record['fecha'] ;
            //$fechaFormateada = date('d-m-Y', strtotime($f));
            ?>
            <tr id="row-<?= $record['id_valoracion'] ?>">
                <td><?= $record['id_valoracion']; ?></td> 
                <td><?= $record['dni']; ?></td> 
                <td><?= $record['j1']; ?></td>
                <td><?= $record['j2']; ?></td>
                <td><?= $record['j3'] ?></td>
                <td><?= $record['materia'] ?></td>
                <td><?= $record['titulo'] ?></td>
                <td>
                    <button class="btn btn-warning btn-editt" 
                            data-idt="<?= $record['id_valoracion'] ?>" 
                            data-dnit="<?= $record['dni'] ?>" 
                            data-j1t="<?= $record['j1'] ?>" 
                            data-j2t="<?= $record['j2'] ?>" 
                            data-j3t="<?= $record['j3'] ?>" 
                            data-materiat="<?= $record['materia'] ?>" 
                            data-otrost="<?= $record['titulo'] ?>">
                        Editar
                    </button>
                    <button class="btn btn-info btn-detail0" 
                            data-id="<?= $record['id_valoracion'] ?>">
                        Detalle
                    </button>
                    <button class="btn btn-danger btn-delete" data-id="<?= $record['id_valoracion'] ?>">Eliminar</button>
                    
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Tabla 1 -->
<div class="container mt-5">
    
    <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addModal">Agregar Otros Títulos</button>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Detalle</th>
            <th>Fecha</th>
            <th>Cod. Valoración</th>
            <th>Otros Títulos</th>
            <th class="actions-column">Acciones</th>
        </tr>
        </thead>
        <tbody id="recordTable">
        <?php foreach ($datosTabla2 as $record): 
            
            $vvv = $record['id_valoracion'];
            $f = $record['fecha'] ;
            $fechaFormateada = date('d-m-Y', strtotime($f));
            ?>
            <tr id="row-<?= $record['id_otros_t'] ?>">
                <td><?= $record['id_otros_t'] ?></td>
                <td><?= $record['detalle_otros_titulos'] ?></td>
                <td><?= $fechaFormateada; ?></td>
                <td><?= $record['id_valoracion'] ?></td>
                <td><?= $record['id_otros_titulos'] ?></td>
                <td>
                    <button class="btn btn-warning btn-edit" 
                            data-id="<?= $record['id_otros_t'] ?>" 
                            data-detalle="<?= $record['detalle_otros_titulos'] ?>" 
                            data-fecha="<?= $record['fecha'] ?>" 
                            data-valoracion="<?= $record['id_valoracion'] ?>"
                            data-otros="<?= $record['id_otros_titulos'] ?>">
                        Editar
                    </button>
                    <button class="btn btn-info btn-detail" 
                            data-id="<?= $record['id_otros_t'] ?>">
                        Detalle
                    </button>
                    <button class="btn btn-danger btn-delete" data-id="<?= $record['id_otros_t'] ?>">Eliminar</button>
                    
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Tabla 2 -->
<div class="container mt-5">
    
    <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addModalp">Agregar Postgrado</button>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Detalle</th>
            <th>Fecha</th>
            <th>Valoración</th>
            <th>Otros Títulos</th>
            <th class="actions-column">Acciones</th>
        </tr>
        </thead>
        <tbody id="recordTable2">
        <?php foreach ($datosTabla3 as $record): 
            
            $vvv = $record['id_valoracion'];
            ?>
            <tr id="row-<?= $record['id_postgrado'] ?>">
                <td><?= $record['id_postgrado'] ?></td>
                <td><?= $record['detalle_valoracion_postgrado'] ?></td>
                <td><?= $record['fecha'] ?></td>
                <td><?= $record['id_valoracion'] ?></td>
                <td><?= $record['id_titulo_postgrado'] ?></td>
                <td>
                    <button class="btn btn-warning btn-editp" 
                            data-idp="<?= $record['id_postgrado'] ?>" 
                            data-detallep="<?= $record['detalle_valoracion_postgrado'] ?>" 
                            data-fechap="<?= $record['fecha'] ?>" 
                            data-valoracionp="<?= $record['id_valoracion'] ?>"
                            data-otrosp="<?= $record['id_titulo_postgrado'] ?>">
                        Editar
                    </button>
                    <button class="btn btn-info btn-detail2" 
                            data-id="<?= $record['id_postgrado'] ?>">
                        Detalle
                    </button>
                    <button class="btn btn-danger btn-delete" data-id="<?= $record['id_postgrado'] ?>">Eliminar</button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Tabla 3 -->
<div class="container mt-5">
    
    <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addModala">Agregar Antecedente</button>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Detalle</th>
            <th>Cantidad</th>
            <th>Valoración</th>
            <th>Código Antecedentes</th>
            <th class="actions-column">Acciones</th>
        </tr>
        </thead>
        <tbody id="recordTable3">
        <?php foreach ($datosTabla4 as $record): 
            
            $vvv = $record['id_valoracion'];
            ?>
            <tr id="row-<?= $record['id_ant_doc'] ?>">
                <td><?= $record['id_ant_doc'] ?></td>
                <td><?= $record['detalle_ant_doc'] ?></td>
                <td><?= $record['cantidad'] ?></td>
                <td><?= $record['id_valoracion'] ?></td>
                <td><?= $record['id_detalle_doc'] ?></td>
                <td>
                    <button class="btn btn-warning btn-edita" 
                            data-ida="<?= $record['id_ant_doc'] ?>" 
                            data-detallea="<?= $record['detalle_ant_doc'] ?>" 
                            data-cantidada="<?= $record['cantidad'] ?>" 
                            data-valoraciona="<?= $record['id_valoracion'] ?>"
                            data-otrosa="<?= $record['id_detalle_doc'] ?>">
                        Editar
                    </button>
                    <button class="btn btn-info btn-detail3" 
                            data-id="<?= $record['id_ant_doc'] ?>">
                        Detalle
                    </button>
                    <button class="btn btn-danger btn-delete" data-id="<?= $record['id_ant_doc'] ?>">Eliminar</button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Tabla 4 -->
<div class="container mt-5">
    
    <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addModalc">Agregar Capacitación</button>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Detalle</th>
            <th>Fecha</th>
            <th>Valoración</th>
            <th>Código Antecedentes</th>
            <th class="actions-column">Acciones</th>
        </tr>
        </thead>
        <tbody id="recordTable3">
        <?php foreach ($datosTabla5 as $record): 
            
            $vvv = $record['id_valoracion'];
            ?>
            <tr id="row-<?= $record['id_capacitacion'] ?>">
                <td><?= $record['id_capacitacion'] ?></td>
                <td><?= $record['detalle_capacitacion'] ?></td>
                <td><?= $record['fecha'] ?></td>
                <td><?= $record['id_valoracion'] ?></td>
                <td><?= $record['id_detalle_capacitacion'] ?></td>
                <td>
                    <button class="btn btn-warning btn-editc" 
                            data-idc="<?= $record['id_capacitacion'] ?>" 
                            data-detallec="<?= $record['detalle_capacitacion'] ?>" 
                            data-fechac="<?= $record['fecha'] ?>" 
                            data-valoracionc="<?= $record['id_valoracion'] ?>"
                            data-otrosc="<?= $record['id_detalle_capacitacion'] ?>">
                        Editar
                    </button>
                    <button class="btn btn-info btn-detail4" 
                            data-id="<?= $record['id_capacitacion'] ?>">
                        Detalle
                    </button>
                    <button class="btn btn-danger btn-delete" data-id="<?= $record['id_capacitacion'] ?>">Eliminar</button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Tabla 5 -->
<div class="container mt-5">
    
    <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addModalo">Agregar Formación Ofrecida</button>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Detalle</th>
            <th>Cantidad</th>
            <th>Valoración</th>
            <th>Código Antecedentes</th>
            <th class="actions-column">Acciones</th>
        </tr>
        </thead>
        <tbody id="recordTable3">
        <?php foreach ($datosTabla6 as $record): 
            
            $vvv = $record['id_valoracion'];
            ?>
            <tr id="row-<?= $record['id_formacion'] ?>">
                <td><?= $record['id_formacion'] ?></td>
                <td><?= $record['detalle_formacion'] ?></td>
                <td><?= $record['fecha'] ?></td>
                <td><?= $record['id_valoracion'] ?></td>
                <td><?= $record['id_formacion_ofrecida'] ?></td>
                <td>
                    <button class="btn btn-warning btn-edito" 
                            data-ido="<?= $record['id_formacion'] ?>" 
                            data-detalleo="<?= $record['detalle_formacion'] ?>" 
                            data-fechao="<?= $record['fecha'] ?>" 
                            data-valoraciono="<?= $record['id_valoracion'] ?>"
                            data-otroso="<?= $record['id_formacion_ofrecida'] ?>">
                        Editar
                    </button>
                    <button class="btn btn-info btn-detail5" 
                            data-id="<?= $record['id_formacion'] ?>">
                        Detalle
                    </button>
                    <button class="btn btn-danger btn-delete" data-id="<?= $record['id_formacion'] ?>">Eliminar</button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>


<!-- Tabla 6 -->
<div class="container mt-5">
    
    <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addModali">Agregar Investigación</button>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Detalle</th>
            <th>Cantidad</th>
            <th>Valoración</th>
            <th>Código Antecedentes</th>
            <th class="actions-column">Acciones</th>
        </tr>
        </thead>
        <tbody id="recordTable3">
        <?php foreach ($datosTabla7 as $record): 
            
            $vvv = $record['id_valoracion'];
            ?>
            <tr id="row-<?= $record['id_investigacion'] ?>">
                <td><?= $record['id_investigacion'] ?></td>
                <td><?= $record['detalle_investigacion'] ?></td>
                <td><?= $record['fecha'] ?></td>
                <td><?= $record['id_valoracion'] ?></td>
                <td><?= $record['id_detalle_investigacion'] ?></td>
                <td>
                    <button class="btn btn-warning btn-editi" 
                            data-idi="<?= $record['id_investigacion'] ?>" 
                            data-detallei="<?= $record['detalle_investigacion'] ?>" 
                            data-fechai="<?= $record['fecha'] ?>" 
                            data-valoracioni="<?= $record['id_valoracion'] ?>"
                            data-otrosi="<?= $record['id_detalle_investigacion'] ?>">
                        Editar
                    </button>
                    <button class="btn btn-info btn-detail6" 
                            data-id="<?= $record['id_investigacion'] ?>">
                        Detalle
                    </button>
                    <button class="btn btn-danger btn-delete" data-id="<?= $record['id_investigacion'] ?>">Eliminar</button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>


<!-- Tabla 7 -->
<div class="container mt-5">
    
    <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addModaloa">Agregar Otros Antecedentes</button>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Detalle</th>
            <th>Cantidad</th>
            <th>Valoración</th>
            <th>Código Antecedentes</th>
            <th class="actions-column">Acciones</th>
        </tr>
        </thead>
        <tbody id="recordTable3">
        <?php foreach ($datosTabla8 as $record): 
            
            $vvv = $record['id_valoracion'];
            ?>
            <tr id="row-<?= $record['id_detalle_ant'] ?>">
                <td><?= $record['id_detalle_ant'] ?></td>
                <td><?= $record['detalle_otros_ant_doc'] ?></td>
                <td><?= $record['fecha'] ?></td>
                <td><?= $record['id_valoracion'] ?></td>
                <td><?= $record['id_detalle_otros_ant'] ?></td>
                <td>
                    <button class="btn btn-warning btn-editoa" 
                            data-idoa="<?= $record['id_detalle_ant'] ?>" 
                            data-detalleoa="<?= $record['detalle_otros_ant_doc'] ?>" 
                            data-fechaoa="<?= $record['fecha'] ?>" 
                            data-valoracionoa="<?= $record['id_valoracion'] ?>"
                            data-otrosoa="<?= $record['id_detalle_otros_ant'] ?>">
                        Editar
                    </button>
                    <button class="btn btn-info btn-detail7" 
                            data-id="<?= $record['id_detalle_ant'] ?>">
                        Detalle
                    </button>
                    <button class="btn btn-danger btn-delete" data-id="<?= $record['id_detalle_ant'] ?>">Eliminar</button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Tabla 8 -->
<div class="container mt-5">
    
    <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#addModalal">Agregar Antecedente Laborales</button>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Detalle</th>
            <th>Cantidad</th>
            <th>Valoración</th>
            <th>Código Antecedentes</th>
            <th class="actions-column">Acciones</th>
        </tr>
        </thead>
        <tbody id="recordTable8">
        <?php foreach ($datosTabla9 as $record): 
            
            $vvv = $record['id_valoracion'];
            ?>
            <tr id="row-<?= $record['id_ant_lab'] ?>">
                <td><?= $record['id_ant_lab'] ?></td>
                <td><?= $record['detalle_ant_lab'] ?></td>
                <td><?= $record['cantidad'] ?></td>
                <td><?= $record['id_valoracion'] ?></td>
                <td><?= $record['id_detalle_lab'] ?></td>
                <td>
                    <button class="btn btn-warning btn-edital" 
                            data-idal="<?= $record['id_ant_lab'] ?>" 
                            data-detalleal="<?= $record['detalle_ant_lab'] ?>" 
                            data-cantidadal="<?= $record['cantidad'] ?>" 
                            data-valoracional="<?= $record['id_valoracion'] ?>"
                            data-otrosal="<?= $record['id_detalle_lab'] ?>">
                        Editar
                    </button>
                    <button class="btn btn-info btn-detail8" 
                            data-id="<?= $record['id_ant_lab'] ?>">
                        Detalle
                    </button>
                    <button class="btn btn-danger btn-delete" data-id="<?= $record['id_ant_lab'] ?>">Eliminar</button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal Editar Títulos -->
<div class="modal fade" id="editModalt" tabindex="-1">
    <div class="modal-dialog">
        <form id="editFormt">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Títulos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="editIdt" name="id_valoracion">
                    <div class="mb-3">
                        <label for="editDni" class="form-label">Dni</label>
                        <input type="text" class="form-control" id="editDni" name="dni" required>
                    </div>
                    <div class="mb-3">
                        <label for="editJ1" class="form-label">Jurado 1</label>
                        <input type="text" class="form-control" id="editJ1" name="j1" required>
                    </div>
                    <div class="mb-3">
                        <label for="editJ2" class="form-label">Jurado 2</label>
                        <input type="text" class="form-control" id="editJ2" name="j2" required>
                    </div>
                    <div class="mb-3">
                        <label for="editJ3" class="form-label">Jurado 3</label>
                        <input type="text" class="form-control" id="editJ3" name="j3" required>
                    </div>
                    <div class="mb-3">
                        <label for="editMateria" class="form-label">Materia</label>
                        <select class="form-control" id="editMateria" name="materia" required>
                            <option value="">Seleccione una materia</option>
                            <!-- Las opciones se cargarán dinámicamente -->
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editOtrost" class="form-label">Otros Títulos</label>
                        <select class="form-control" id="editOtrost" name="titulo" required>
                            <option value="">Seleccione un título</option>
                            <!-- Las opciones se cargarán dinámicamente -->
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Detalle Títulos -->
<div class="modal fade" id="detailModal" tabindex="-1">
    <div class="modal-dialog modal-lg"> <!-- Usamos modal-lg para un tamaño más grande -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalles Títulos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered text-center"> <!-- Centrar los contenidos de la tabla -->
                    <thead id="detailTableHead0">
                        <!-- Cabecera de la tabla se cargará dinámicamente -->
                    </thead>
                    <tbody id="detailTableBody0">
                        <!-- Datos se cargarán dinámicamente -->
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal Agregar Otros Títulos -->
<div class="modal fade" id="addModal" tabindex="-1">
    <div class="modal-dialog">
        <form id="addForm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar Otros Títulos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="addDetalle" class="form-label">Detalle</label>
                        <input type="text" class="form-control" id="addDetalle" name="detalle_otros_titulos" required>
                    </div>
                    <div class="mb-3">
                        <label for="addFecha" class="form-label">Fecha</label>
                        <input type="date" class="form-control" id="addFecha" name="fecha" required>
                    </div>
                    <div class="mb-3">
                        <label for="addValoracion" class="form-label">Valoración</label>
                        <input class="form-control" id="addValoracion" name="id_valoracion" required  value=<?= $vvv ?>>
                    </div>

                    <div class="mb-3">
                         <label for="addOtros" class="form-label">Otros Títulos</label>
                         <select class="form-control" id="addOtros" name="id_otros_titulos" required>
                         <option value="">Seleccione un título</option>
                         </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Editar Otros Títulos -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog">
        <form id="editForm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Otros Títulos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="editId" name="id_otros_t">
                    <div class="mb-3">
                        <label for="editDetalle" class="form-label">Detalle</label>
                        <input type="text" class="form-control" id="editDetalle" name="detalle_otros_titulos" required>
                    </div>
                    <div class="mb-3">
                        <label for="editFecha" class="form-label">Fecha</label>
                        <input type="date" class="form-control" id="editFecha" name="fecha" required>
                    </div>
                    <div class="mb-3">
                        <label for="editValoracion" class="form-label">Valoración</label>
                        <input type="number" class="form-control" id="editValoracion" name="id_valoracion" required>
                    </div>
                    <div class="mb-3">
                        <label for="editOtros" class="form-label">Otros Títulos</label>
                        <select class="form-control" id="editOtros" name="id_otros_titulos" required>
                            <option value="">Seleccione un título</option>
                            <!-- Las opciones se cargarán dinámicamente -->
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Detalle Otros Títulos -->
<div class="modal fade" id="detailModal" tabindex="-1">
    <div class="modal-dialog modal-lg"> <!-- Usamos modal-lg para un tamaño más grande -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalles de Otros Títulos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered text-center"> <!-- Centrar los contenidos de la tabla -->
                    <thead id="detailTableHead">
                        <!-- Cabecera de la tabla se cargará dinámicamente -->
                    </thead>
                    <tbody id="detailTableBody">
                        <!-- Datos se cargarán dinámicamente -->
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal Agregar Postgrado -->
<div class="modal fade" id="addModalp" tabindex="-1">
    <div class="modal-dialog">
        <form id="addFormp">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar Postgrado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="addDetallep" class="form-label">Detalle</label>
                        <input type="text" class="form-control" id="addDetallep" name="detalle_valoracion_postgrado" required>
                    </div>
                    <div class="mb-3">
                        <label for="addFechap" class="form-label">Fecha</label>
                        <input type="date" class="form-control" id="addFechap" name="fecha" required>
                    </div>
                    <div class="mb-3">
                        <label for="addValoracionp" class="form-label">Valoración</label>
                        <input class="form-control" id="addValoracionp" name="id_valoracion" required  value=<?= $vvv ?>>
                    </div>

                    <div class="mb-3">
                         <label for="addOtros2p" class="form-label">Otros Títulos</label>
                         <select class="form-control" id="addOtros2p" name="id_titulo_postgrado" required>
                         <option value="">Seleccione un título</option>
                         </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Editar Postgrado -->
<div class="modal fade" id="editModalp" tabindex="-1">
    <div class="modal-dialog">
        <form id="editFormp">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Postgrado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="editIdp" name="id_postgrado">
                    <div class="mb-3">
                        <label for="editDetallep" class="form-label">Detalle</label>
                        <input type="text" class="form-control" id="editDetallep" name="detalle_valoracion_postgrado" required>
                    </div>
                    <div class="mb-3">
                        <label for="editFechap" class="form-label">Fecha</label>
                        <input type="date" class="form-control" id="editFechap" name="fecha" required>
                    </div>
                    <div class="mb-3">
                        <label for="editValoracionp" class="form-label">Valoración</label>
                        <input type="number" class="form-control" id="editValoracionp" name="id_valoracion" required>
                    </div>
                    <div class="mb-3">
                        <label for="editOtrosp" class="form-label">Otros Títulos</label>
                        <select class="form-control" id="editOtrosp" name="id_titulo_postgrado" required>
                            <option value="">Seleccione un título</option>
                            <!-- Las opciones se cargarán dinámicamente -->
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Detalle Postgrado -->
<div class="modal fade" id="detailModal2" tabindex="-1">
    <div class="modal-dialog modal-lg"> <!-- Usamos modal-lg para un tamaño más grande -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalles de Postgrado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered text-center"> <!-- Centrar los contenidos de la tabla -->
                    <thead id="detailTableHead2">
                        <!-- Cabecera de la tabla se cargará dinámicamente -->
                    </thead>
                    <tbody id="detailTableBody2">
                        <!-- Datos se cargarán dinámicamente -->
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<!-- MODALES ANTIGUEDAD -->
 <!-- Modal Agregar Antiguedad -->
<div class="modal fade" id="addModala" tabindex="-1">
    <div class="modal-dialog">
        <form id="addForma">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar Antiguedad</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="addDetallea" class="form-label">Detalle</label>
                        <input type="text" class="form-control" id="addDetallea" name="detalle_ant_doc" required>
                    </div>
                    <div class="mb-3">
                        <label for="addFechaa" class="form-label">Cantidad</label>
                        <input type="text" class="form-control" id="addFechaa" name="cantidad" required>
                    </div>
                    <div class="mb-3">
                        <label for="addValoraciona" class="form-label">Valoración</label>
                        <input class="form-control" id="addValoraciona" name="id_valoracion" required  value=<?= $vvv ?>>
                    </div>

                    <div class="mb-3">
                         <label for="addOtros2a" class="form-label">Otros Títulos</label>
                         <select class="form-control" id="addOtros2a" name="id_detalle_doc" required>
                         <option value="">Seleccione un título</option>
                         </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Editar antiguedad -->
<div class="modal fade" id="editModala" tabindex="-1">
    <div class="modal-dialog">
        <form id="editForma">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Antiguedad</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="editIda" name="id_ant_doc">
                    <div class="mb-3">
                        <label for="editDetallea" class="form-label">Detalle</label>
                        <input type="text" class="form-control" id="editDetallea" name="detalle_ant_doc" required>
                    </div>
                    <div class="mb-3">
                        <label for="editCantidada" class="form-label">Cantidad</label>
                        <input type="text" class="form-control" id="editCantidada" name="cantidad" required>
                    </div>
                    <div class="mb-3">
                        <label for="editValoraciona" class="form-label">Valoración</label>
                        <input type="number" class="form-control" id="editValoraciona" name="id_valoracion" required>
                    </div>
                    <div class="mb-3">
                        <label for="editOtrosa" class="form-label">Otros Títulos</label>
                        <select class="form-control" id="editOtrosa" name="id_detalle_doc" required>
                            <option value="">Seleccione un título</option>
                            <!-- Las opciones se cargarán dinámicamente -->
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Detalle antiguedad -->
<div class="modal fade" id="detailModal3" tabindex="-1">
    <div class="modal-dialog modal-lg"> <!-- Usamos modal-lg para un tamaño más grande -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalles de Antiguedad</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered text-center"> <!-- Centrar los contenidos de la tabla -->
                    <thead id="detailTableHead3">
                        <!-- Cabecera de la tabla se cargará dinámicamente -->
                    </thead>
                    <tbody id="detailTableBody3">
                        <!-- Datos se cargarán dinámicamente -->
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- MODALES CAPACITACION -->
 <!-- Modal Agregar Capacitación -->
 <div class="modal fade" id="addModalc" tabindex="-1">
    <div class="modal-dialog">
        <form id="addFormc">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar Capacitación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="addDetallec" class="form-label">Detalle</label>
                        <input type="text" class="form-control" id="addDetallec" name="detalle_capacitacion" required>
                    </div>
                    <div class="mb-3">
                        <label for="addFechac" class="form-label">Fecha</label>
                        <input type="date" class="form-control" id="addFechac" name="fecha" required>
                    </div>
                    <div class="mb-3">
                        <label for="addValoracionc" class="form-label">Valoración</label>
                        <input class="form-control" id="addValoracionc" name="id_valoracion" required  value=<?= $vvv ?>>
                    </div>

                    <div class="mb-3">
                         <label for="addOtros2c" class="form-label">Detalle Capacitación</label>
                         <select class="form-control" id="addOtros2c" name="id_detalle_capacitacion" required>
                         <option value="">Seleccione un título</option>
                         </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Editar Capacitación -->
<div class="modal fade" id="editModalc" tabindex="-1">
    <div class="modal-dialog">
        <form id="editFormc">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Capacitación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="editIdc" name="id_capacitacion">
                    <div class="mb-3">
                        <label for="editDetallec" class="form-label">Detalle</label>
                        <input type="text" class="form-control" id="editDetallec" name="detalle_capacitacion" required>
                    </div>
                    <div class="mb-3">
                        <label for="editFechac" class="form-label">Fecha</label>
                        <input type="date" class="form-control" id="editFechac" name="fecha" required>
                    </div>
                    <div class="mb-3">
                        <label for="editValoracionc" class="form-label">Valoración</label>
                        <input type="number" class="form-control" id="editValoracionc" name="id_valoracion" required>
                    </div>
                    <div class="mb-3">
                        <label for="editOtrosc" class="form-label">Otros Títulos</label>
                        <select class="form-control" id="editOtrosc" name="id_detalle_capacitacion" required>
                            <option value="">Seleccione un título</option>
                            <!-- Las opciones se cargarán dinámicamente -->
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Detalle capacitacion -->
<div class="modal fade" id="detailModal4" tabindex="-1">
    <div class="modal-dialog modal-lg"> <!-- Usamos modal-lg para un tamaño más grande -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalles de Capacitación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered text-center"> <!-- Centrar los contenidos de la tabla -->
                    <thead id="detailTableHead4">
                        <!-- Cabecera de la tabla se cargará dinámicamente -->
                    </thead>
                    <tbody id="detailTableBody4">
                        <!-- Datos se cargarán dinámicamente -->
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- MODALES FORMACIÓN OFRECIDA -->
 <!-- Modal Agregar Formación Ofrecida -->
 <div class="modal fade" id="addModalo" tabindex="-1">
    <div class="modal-dialog">
        <form id="addFormo">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar Formación Ofrecida</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="addDetalleo" class="form-label">Detalle</label>
                        <input type="text" class="form-control" id="addDetalleo" name="detalle_formacion" required>
                    </div>
                    <div class="mb-3">
                        <label for="addFechao" class="form-label">Fecha</label>
                        <input type="date" class="form-control" id="addFechao" name="fecha" required>
                    </div>
                    <div class="mb-3">
                        <label for="addValoraciono" class="form-label">Valoración</label>
                        <input class="form-control" id="addValoraciono" name="id_valoracion" required  value=<?= $vvv ?>>
                    </div>

                    <div class="mb-3">
                         <label for="addOtros2o" class="form-label">Detalle Formación</label>
                         <select class="form-control" id="addOtros2o" name="id_formacion_ofrecida" required>
                         <option value="">Seleccione un título</option>
                         </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Editar Formación Ofrecida -->
<div class="modal fade" id="editModalo" tabindex="-1">
    <div class="modal-dialog">
        <form id="editFormo">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Formación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="editIdo" name="id_formacion">
                    <div class="mb-3">
                        <label for="editDetalleo" class="form-label">Detalle</label>
                        <input type="text" class="form-control" id="editDetalleo" name="detalle_formacion" required>
                    </div>
                    <div class="mb-3">
                        <label for="editFechao" class="form-label">Fecha</label>
                        <input type="date" class="form-control" id="editFechao" name="fecha" required>
                    </div>
                    <div class="mb-3">
                        <label for="editValoraciono" class="form-label">Valoración</label>
                        <input type="number" class="form-control" id="editValoraciono" name="id_valoracion" required>
                    </div>
                    <div class="mb-3">
                        <label for="editOtroso" class="form-label">Otros Títulos</label>
                        <select class="form-control" id="editOtroso" name="id_formacion_ofrecida" required>
                            <option value="">Seleccione un título</option>
                            <!-- Las opciones se cargarán dinámicamente -->
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Detalle formación ofrecida -->
<div class="modal fade" id="detailModal5" tabindex="-1">
    <div class="modal-dialog modal-lg"> <!-- Usamos modal-lg para un tamaño más grande -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalles de Formación Ofrecida</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered text-center"> <!-- Centrar los contenidos de la tabla -->
                    <thead id="detailTableHead5">
                        <!-- Cabecera de la tabla se cargará dinámicamente -->
                    </thead>
                    <tbody id="detailTableBody5">
                        <!-- Datos se cargarán dinámicamente -->
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>


<!-- MODALES INVESTIGACION -->
 <!-- Modal Agregar Investigación -->
 <div class="modal fade" id="addModali" tabindex="-1">
    <div class="modal-dialog">
        <form id="addFormi">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar Investigación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="addDetallei" class="form-label">Detalle</label>
                        <input type="text" class="form-control" id="addDetallei" name="detalle_investigacion" required>
                    </div>
                    <div class="mb-3">
                        <label for="addFechai" class="form-label">Fecha</label>
                        <input type="date" class="form-control" id="addFechai" name="fecha" required>
                    </div>
                    <div class="mb-3">
                        <label for="addValoracioni" class="form-label">Valoración</label>
                        <input class="form-control" id="addValoracioni" name="id_valoracion" required  value=<?= $vvv ?>>
                    </div>

                    <div class="mb-3">
                         <label for="addOtros2i" class="form-label">Detalle Investigación</label>
                         <select class="form-control" id="addOtros2i" name="id_detalle_investigacion" required>
                         <option value="">Seleccione un título</option>
                         </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Editar Investigación -->
<div class="modal fade" id="editModali" tabindex="-1">
    <div class="modal-dialog">
        <form id="editFormi">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Investigación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="editIdi" name="id_investigacion">
                    <div class="mb-3">
                        <label for="editDetallei" class="form-label">Detalle</label>
                        <input type="text" class="form-control" id="editDetallei" name="detalle_investigacion" required>
                    </div>
                    <div class="mb-3">
                        <label for="editFechai" class="form-label">Fecha</label>
                        <input type="date" class="form-control" id="editFechai" name="fecha" required>
                    </div>
                    <div class="mb-3">
                        <label for="editValoracioni" class="form-label">Valoración</label>
                        <input type="number" class="form-control" id="editValoracioni" name="id_valoracion" required>
                    </div>
                    <div class="mb-3">
                        <label for="editOtrosi" class="form-label">Detalle Investigación</label>
                        <select class="form-control" id="editOtrosi" name="id_detalle_investigacion" required>
                            <option value="">Seleccione un título</option>
                            <!-- Las opciones se cargarán dinámicamente -->
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Detalle investigación -->
<div class="modal fade" id="detailModal6" tabindex="-1">
    <div class="modal-dialog modal-lg"> <!-- Usamos modal-lg para un tamaño más grande -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalles de Investigación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered text-center"> <!-- Centrar los contenidos de la tabla -->
                    <thead id="detailTableHead6">
                        <!-- Cabecera de la tabla se cargará dinámicamente -->
                    </thead>
                    <tbody id="detailTableBody6">
                        <!-- Datos se cargarán dinámicamente -->
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- MODALES OTROS ANTECEDENTES -->
 <!-- Modal Agregar Otros Antecedentes -->
 <div class="modal fade" id="addModaloa" tabindex="-1">
    <div class="modal-dialog">
        <form id="addFormoa">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar Otros Antecedentes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="addDetalleoa" class="form-label">Detalle</label>
                        <input type="text" class="form-control" id="addDetalleoa" name="detalle_otros_ant_doc" required>
                    </div>
                    <div class="mb-3">
                        <label for="addFechaoa" class="form-label">Fecha</label>
                        <input type="date" class="form-control" id="addFechaoa" name="fecha" required>
                    </div>
                    <div class="mb-3">
                        <label for="addValoracionoa" class="form-label">Valoración</label>
                        <input class="form-control" id="addValoracionoa" name="id_valoracion" required  value=<?= $vvv ?>>
                    </div>

                    <div class="mb-3">
                         <label for="addOtros2oa" class="form-label">Detalle Investigación</label>
                         <select class="form-control" id="addOtros2oa" name="id_detalle_otros_ant" required>
                         <option value="">Seleccione un título</option>
                         </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Editar Otros Antecedentes -->
<div class="modal fade" id="editModaloa" tabindex="-1">
    <div class="modal-dialog">
        <form id="editFormoa">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Otros Antecedentes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="editIdoa" name="id_detalle_ant">
                    <div class="mb-3">
                        <label for="editDetalleoa" class="form-label">Detalle</label>
                        <input type="text" class="form-control" id="editDetalleoa" name="detalle_otros_ant_doc" required>
                    </div>
                    <div class="mb-3">
                        <label for="editFechaoa" class="form-label">Fecha</label>
                        <input type="date" class="form-control" id="editFechaoa" name="fecha" required>
                    </div>
                    <div class="mb-3">
                        <label for="editValoracionoa" class="form-label">Valoración</label>
                        <input type="number" class="form-control" id="editValoracionoa" name="id_valoracion" required>
                    </div>
                    <div class="mb-3">
                        <label for="editOtrosoa" class="form-label">Detalle Investigación</label>
                        <select class="form-control" id="editOtrosoa" name="id_detalle_otros_ant" required>
                            <option value="">Seleccione un título</option>
                            <!-- Las opciones se cargarán dinámicamente -->
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Detalle otros antecedentes -->
<div class="modal fade" id="detailModal7" tabindex="-1">
    <div class="modal-dialog modal-lg"> <!-- Usamos modal-lg para un tamaño más grande -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalles de Otros Antecedentes</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered text-center"> <!-- Centrar los contenidos de la tabla -->
                    <thead id="detailTableHead7">
                        <!-- Cabecera de la tabla se cargará dinámicamente -->
                    </thead>
                    <tbody id="detailTableBody7">
                        <!-- Datos se cargarán dinámicamente -->
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Agregar Ant Laborales -->
<div class="modal fade" id="addModalal" tabindex="-1">
    <div class="modal-dialog">
        <form id="addFormal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Agregar Ant Laborales</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="addDetalleal" class="form-label">Detalle</label>
                        <input type="text" class="form-control" id="addDetalleal" name="detalle_ant_lab" required>
                    </div>
                    <div class="mb-3">
                        <label for="addFechal" class="form-label">Cantidad</label>
                        <input type="text" class="form-control" id="addFechal" name="cantidad" required>
                    </div>
                    <div class="mb-3">
                        <label for="addValoracional" class="form-label">Valoración</label>
                        <input class="form-control" id="addValoracional" name="id_valoracion" required  value=<?= $vvv ?>>
                    </div>

                    <div class="mb-3">
                         <label for="addOtros2al" class="form-label">Otros Títulos</label>
                         <select class="form-control" id="addOtros2al" name="id_detalle_lab" required>
                         <option value="">Seleccione un título</option>
                         </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Editar Ant Laborales -->
<div class="modal fade" id="editModalal" tabindex="-1">
    <div class="modal-dialog">
        <form id="editFormal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar Ant Laborales</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" id="editIdal" name="id_ant_lab">
                    <div class="mb-3">
                        <label for="editDetalleal" class="form-label">Detalle</label>
                        <input type="text" class="form-control" id="editDetalleal" name="detalle_ant_lab" required>
                    </div>
                    <div class="mb-3">
                        <label for="editCantidadal" class="form-label">Cantidad</label>
                        <input type="text" class="form-control" id="editCantidadal" name="cantidad" required>
                    </div>
                    <div class="mb-3">
                        <label for="editValoracional" class="form-label">Valoración</label>
                        <input type="number" class="form-control" id="editValoracional" name="id_valoracion" required>
                    </div>
                    <div class="mb-3">
                        <label for="editOtrosal" class="form-label">Otros Títulos</label>
                        <select class="form-control" id="editOtrosal" name="id_detalle_lab" required>
                            <option value="">Seleccione un título</option>
                            <!-- Las opciones se cargarán dinámicamente -->
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal Detalle antecedentes laborales -->
<div class="modal fade" id="detailModal8" tabindex="-1">
    <div class="modal-dialog modal-lg"> <!-- Usamos modal-lg para un tamaño más grande -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detalles de Antecedentes Laborales</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered text-center"> <!-- Centrar los contenidos de la tabla -->
                    <thead id="detailTableHead8">
                        <!-- Cabecera de la tabla se cargará dinámicamente -->
                    </thead>
                    <tbody id="detailTableBody8">
                        <!-- Datos se cargarán dinámicamente -->
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<div class="center-container">
     <a href="<?= base_url('mostrar_valoraciones_porDocente_porMateria1') ?>">Volver</a>
</div>
<br>
<footer>
<div class="container-xl">
    <div class="car-body">
      <p></p>
      <p>&copy; <?= date('Y') ?> Valorador ISFT. Todos los derechos reservados.</p>
    </div>
</div> 
</footer>

<!-- SCRIPT PARA TÍTULOS -->
<script>
    $('.btn-detail0').on('click', function () {
        const id = $(this).data('id');

        // Mapeo de claves a nombres personalizados
        const columnNames = {
            'id_act_postgrado': 'Dni',
            'id_postgrado': 'ID Postgrado',
            'detalle_act_postgrado': 'Detalle',
            'id_titulo_postgrado': 'Cód. Postgrado',
            'fecha': 'fecha',
            // Añade aquí más claves y sus nombres personalizados según sea necesario
        };

        $.get(`<?= base_url('NuevoController/getDetailPostgrado') ?>/${id}`, function (response) {
            const detailTableHead = $('#detailTableHead2');
            const detailTableBody = $('#detailTableBody2');

            detailTableHead.empty();
            detailTableBody.empty();

            // Crear encabezado de la tabla con nombres personalizados
            let headers = '<tr>';
            for (const key in columnNames) {
                if (response[key]) {
                    headers += `<th>${columnNames[key]}</th>`;
                }
            }
            headers += '</tr>';
            detailTableHead.append(headers);

            // Determinar la cantidad de filas a crear
            const numRows = response[Object.keys(response)[0]].length;

            // Crear filas con los valores del objeto
            for (let i = 0; i < numRows; i++) {
                let row = '<tr>';
                for (const key in columnNames) {
                    if (response[key]) {
                        row += `<td>${response[key][i]}</td>`;
                    }
                }
                row += '</tr>';
                detailTableBody.append(row);
            }

            $('#detailModal2').modal('show');
        });
    });
</script>

<script>
    // Cargar listado de "títulos" al abrir el modal de edición
    $('.btn-editt').on('click', function () {
        const idt = $(this).data('idt');
        const dnit = $(this).data('dnit');
        const j1t = $(this).data('j1t');
        const j2t = $(this).data('j2t');
        const j3t = $(this).data('j3t');
        const materiat = $(this).data('materiat');
        const otrosId = $(this).data('otrost');

        // Asignar los valores al formulario
        $('#editIdt').val(idt);
        $('#editDni').val(dnit);
        $('#editJ1').val(j1t);
        $('#editJ2').val(j2t);
        $('#editJ3').val(j3t);
        //$('#editMateria').val(materiat);

        // Obtener listado de "otros títulos" con la opción actual seleccionada
        $.get('<?= base_url('NuevoController/cargarOtrosTitulos0') ?>', function (response) {
            const otrosTitulosSelect = $('#editOtrost');
            otrosTitulosSelect.empty(); // Limpiar opciones previas
            otrosTitulosSelect.append('<option value="">Seleccione un título</option>'); // Opción predeterminada

            response.forEach(titulo => {
                const selected = titulo.detalle_titulo == otrosId ? 'selected' : '';
                otrosTitulosSelect.append(`<option value="${titulo.id_titulo}" ${selected}>${titulo.detalle_titulo}</option>`);
            });

            // Cargar materias
            $.get('<?= base_url('NuevoController/cargarMaterias') ?>', function (response) {
                const materiaSelect = $('#editMateria');
                materiaSelect.empty();
                materiaSelect.append('<option value="">Seleccione una materia</option>');

                response.forEach(materia => {
                    const selected = materia.id_materia == materiat ? 'selected' : '';
                    materiaSelect.append(`<option value="${materia.id_materia}" ${selected}>${materia.nombre_materia}</option>`);
                });

                // Mostrar el modal después de cargar las opciones
                $('#editModalt').modal('show');
            }); // Cierre correcto de $.get('cargarMaterias')
        }); // Cierre correcto de $.get('cargarOtrosTitulos0')
    });


    // Manejo del formulario de edición
    $('#editFormt').on('submit', function (e) {
        e.preventDefault();
        $.post(`<?= base_url('NuevoController/editRecord0') ?>/${$('#editIdt').val()}`, $(this).serialize(), function (response) {
            location.reload();
        });
    });

    $('.btn-delete').on('click', function () {
        if (confirm('¿Estás seguro de eliminar este registro?')) {
            $.post(`<?= base_url('NuevoController/deleteRecord20') ?>/${$(this).data('id')}`, function () {
                location.reload();
            });
        }
    });
</script>

<!-- SCRIPT PARA OTROS TITULOS-->
<script>
    $('.btn-detail').on('click', function () {
        const id = $(this).data('id');

        // Mapeo de claves a nombres personalizados
        const columnNames = {
            'id_act_otros_tit': 'ID',
            'id_otros_t': 'ID Otros Títulos',
            'detalle_act_otros_tit': 'Detalle',
            'id_otros_titulos': 'Otros Títulos',
            'fecha': 'fecha',
            // Añade aquí más claves y sus nombres personalizados según sea necesario
        };

        $.get(`<?= base_url('NuevoController/getDetail') ?>/${id}`, function (response) {
            const detailTableHead = $('#detailTableHead');
            const detailTableBody = $('#detailTableBody');

            detailTableHead.empty();
            detailTableBody.empty();

            // Crear encabezado de la tabla con nombres personalizados
            let headers = '<tr>';
            for (const key in columnNames) {
                if (response[key]) {
                    headers += `<th>${columnNames[key]}</th>`;
                }
            }
            headers += '</tr>';
            detailTableHead.append(headers);

            // Determinar la cantidad de filas a crear
            const numRows = response[Object.keys(response)[0]].length;

            // Crear filas con los valores del objeto
            for (let i = 0; i < numRows; i++) {
                let row = '<tr>';
                for (const key in columnNames) {
                    if (response[key]) {
                        row += `<td>${response[key][i]}</td>`;
                    }
                }
                row += '</tr>';
                detailTableBody.append(row);
            }

            $('#detailModal').modal('show');
        });
    });
</script>



<script>
    
    // Obtener el listado de "otros títulos" al abrir el modal de agregar
    $('#addModal').on('show.bs.modal', function () {
        $.get('<?= base_url('NuevoController/cargarOtrosTitulos') ?>', function (response) {
            const otrosTitulosSelect = $('#addOtros');
            otrosTitulosSelect.empty(); // Limpiar opciones previas
            otrosTitulosSelect.append('<option value="">Seleccione un título</option>'); // Opción predeterminada
            
            response.forEach(titulo => {
                otrosTitulosSelect.append(`<option value="${titulo.id_otros_titulos}">${titulo.detalle_otros_titulos}</option>`);
            });
        });
    });

    $('#addForm').on('submit', function (e) {
        e.preventDefault();
        $.post('<?= base_url('NuevoController/addRecord') ?>', $(this).serialize(), function (response) {
            location.reload();
        });
    });

    
    // Cargar listado de "otros títulos" al abrir el modal de edición
    $('.btn-edit').on('click', function () {
        const id = $(this).data('id');
        const detalle = $(this).data('detalle');
        const fecha = $(this).data('fecha');
        const valoracion = $(this).data('valoracion');
        const otrosId = $(this).data('otros');

        // Asignar los valores al formulario
        $('#editId').val(id);
        $('#editDetalle').val(detalle);
        $('#editFecha').val(fecha);
        $('#editValoracion').val(valoracion);

        // Obtener listado de "otros títulos" con la opción actual seleccionada
        $.get('<?= base_url('NuevoController/cargarOtrosTitulos') ?>', function (response) {
            const otrosTitulosSelect = $('#editOtros');
            otrosTitulosSelect.empty(); // Limpiar opciones previas
            otrosTitulosSelect.append('<option value="">Seleccione un título</option>'); // Opción predeterminada

            response.forEach(titulo => {
                const selected = titulo.id_otros_titulos == otrosId ? 'selected' : '';
                otrosTitulosSelect.append(`<option value="${titulo.id_otros_titulos}" ${selected}>${titulo.detalle_otros_titulos}</option>`);
            });

            // Mostrar el modal después de cargar las opciones
            $('#editModal').modal('show');
        });
    });

    // Manejo del formulario de edición
    $('#editForm').on('submit', function (e) {
        e.preventDefault();
        $.post(`<?= base_url('NuevoController/editRecord') ?>/${$('#editId').val()}`, $(this).serialize(), function (response) {
            location.reload();
        });
    });

    $('.btn-delete').on('click', function () {
        if (confirm('¿Estás seguro de eliminar este registro?')) {
            $.post(`<?= base_url('NuevoController/deleteRecord2') ?>/${$(this).data('id')}`, function () {
                location.reload();
            });
        }
    });
</script>



<!-- SCRIPT PARA POSTGRADO -->
<script>
    $('.btn-detail2').on('click', function () {
        const id = $(this).data('id');

        // Mapeo de claves a nombres personalizados
        const columnNames = {
            'id_act_postgrado': 'ID',
            'id_postgrado': 'ID Postgrado',
            'detalle_act_postgrado': 'Detalle',
            'id_titulo_postgrado': 'Cód. Postgrado',
            'fecha': 'fecha',
            // Añade aquí más claves y sus nombres personalizados según sea necesario
        };

        $.get(`<?= base_url('NuevoController/getDetailPostgrado') ?>/${id}`, function (response) {
            const detailTableHead = $('#detailTableHead2');
            const detailTableBody = $('#detailTableBody2');

            detailTableHead.empty();
            detailTableBody.empty();

            // Crear encabezado de la tabla con nombres personalizados
            let headers = '<tr>';
            for (const key in columnNames) {
                if (response[key]) {
                    headers += `<th>${columnNames[key]}</th>`;
                }
            }
            headers += '</tr>';
            detailTableHead.append(headers);

            // Determinar la cantidad de filas a crear
            const numRows = response[Object.keys(response)[0]].length;

            // Crear filas con los valores del objeto
            for (let i = 0; i < numRows; i++) {
                let row = '<tr>';
                for (const key in columnNames) {
                    if (response[key]) {
                        row += `<td>${response[key][i]}</td>`;
                    }
                }
                row += '</tr>';
                detailTableBody.append(row);
            }

            $('#detailModal2').modal('show');
        });
    });
</script>

<script>
    // Obtener el listado de "otros títulos" al abrir el modal de agregar
    $('#addModalp').on('show.bs.modal', function () {
        $.get('<?= base_url('NuevoController/cargarOtrosTitulos2') ?>', function (response) {
            const otrosTitulosSelect = $('#addOtros2p');
            otrosTitulosSelect.empty(); // Limpiar opciones previas
            otrosTitulosSelect.append('<option value="">Seleccione un título</option>'); // Opción predeterminada
            
            response.forEach(titulo => {
                otrosTitulosSelect.append(`<option value="${titulo.id_titulo_postgrado}">${titulo.detalle_postgrado}</option>`);
            });
        });
    });

    $('#addFormp').on('submit', function (e) {
        e.preventDefault();
        $.post('<?= base_url('NuevoController/addRecord2') ?>', $(this).serialize(), function (response) {
            location.reload();
        });
    });

        
    // Cargar listado de "otros títulos" al abrir el modal de edición
    $('.btn-editp').on('click', function () {
        const idp = $(this).data('idp');
        const detallep = $(this).data('detallep');
        const fechap = $(this).data('fechap');
        const valoracionp = $(this).data('valoracionp');
        const otrosId = $(this).data('otrosp');

        // Asignar los valores al formulario
        $('#editIdp').val(idp);
        $('#editDetallep').val(detallep);
        $('#editFechap').val(fechap);
        $('#editValoracionp').val(valoracionp);

        // Obtener listado de "otros títulos" con la opción actual seleccionada
        $.get('<?= base_url('NuevoController/cargarOtrosTitulos2') ?>', function (response) {
            const otrosTitulosSelect = $('#editOtrosp');
            otrosTitulosSelect.empty(); // Limpiar opciones previas
            otrosTitulosSelect.append('<option value="">Seleccione un título</option>'); // Opción predeterminada

            response.forEach(titulo => {
                const selected = titulo.id_titulo_postgrado == otrosId ? 'selected' : '';
                otrosTitulosSelect.append(`<option value="${titulo.id_titulo_postgrado}" ${selected}>${titulo.detalle_postgrado}</option>`);
            });

            // Mostrar el modal después de cargar las opciones
            $('#editModalp').modal('show');
        });
    });

    // Manejo del formulario de edición
    $('#editFormp').on('submit', function (e) {
        e.preventDefault();
        $.post(`<?= base_url('NuevoController/editRecord2') ?>/${$('#editIdp').val()}`, $(this).serialize(), function (response) {
            location.reload();
        });
    });

    $('.btn-delete').on('click', function () {
        if (confirm('¿Estás seguro de eliminar este registro?')) {
            $.post(`<?= base_url('NuevoController/deleteRecord22') ?>/${$(this).data('id')}`, function () {
                location.reload();
            });
        }
    });
</script>


<!-- SCRIPT PARA ANTIGUEDAD -->
<script>
    $('.btn-detail3').on('click', function () {
        const id = $(this).data('id');

        // Mapeo de claves a nombres personalizados
        const columnNames = {
            'id_act_ant_doc': 'ID',
            'id_ant_doc': 'ID Postgrado',
            'detalle_act_ant_doc': 'Detalle',
            'cantidad': 'Cantidad',
            'id_detalle_doc': 'Cod. Antecedentes',
            'fecha': 'fecha',
            // Añade aquí más claves y sus nombres personalizados según sea necesario
        };

        $.get(`<?= base_url('NuevoController/getDetailAntiguedad') ?>/${id}`, function (response) {
            const detailTableHead = $('#detailTableHead3');
            const detailTableBody = $('#detailTableBody3');

            detailTableHead.empty();
            detailTableBody.empty();

            // Crear encabezado de la tabla con nombres personalizados
            let headers = '<tr>';
            for (const key in columnNames) {
                if (response[key]) {
                    headers += `<th>${columnNames[key]}</th>`;
                }
            }
            headers += '</tr>';
            detailTableHead.append(headers);

            // Determinar la cantidad de filas a crear
            const numRows = response[Object.keys(response)[0]].length;

            // Crear filas con los valores del objeto
            for (let i = 0; i < numRows; i++) {
                let row = '<tr>';
                for (const key in columnNames) {
                    if (response[key]) {
                        row += `<td>${response[key][i]}</td>`;
                    }
                }
                row += '</tr>';
                detailTableBody.append(row);
            }

            $('#detailModal3').modal('show');
        });
    });
</script>

<script>
    
    // Obtener el listado de "otros títulos" al abrir el modal de agregar
    $('#addModala').on('show.bs.modal', function () {
        $.get('<?= base_url('NuevoController/cargarOtrosTitulos3') ?>', function (response) {
            const otrosTitulosSelect = $('#addOtros2a');
            otrosTitulosSelect.empty(); // Limpiar opciones previas
            otrosTitulosSelect.append('<option value="">Seleccione un título</option>'); // Opción predeterminada
            
            response.forEach(titulo => {
                otrosTitulosSelect.append(`<option value="${titulo.id_detalle_doc}">${titulo.detalle_ant_doc}</option>`);
            });
        });
    });

    $('#addForma').on('submit', function (e) {
        e.preventDefault();
        $.post('<?= base_url('NuevoController/addRecord3') ?>', $(this).serialize(), function (response) {
            location.reload();
        });
    });

        
    // Cargar listado de "otros títulos" al abrir el modal de edición
    $('.btn-edita').on('click', function () {
        const ida = $(this).data('ida');
        const detallea = $(this).data('detallea');
        const cantidada = $(this).data('cantidada');
        const valoraciona = $(this).data('valoraciona');
        const otrosId = $(this).data('otrosa');

        // Asignar los valores al formulario
        $('#editIda').val(ida);
        $('#editDetallea').val(detallea);
        $('#editCantidada').val(cantidada);
        $('#editValoraciona').val(valoraciona);

        // Obtener listado de "otros títulos" con la opción actual seleccionada
        $.get('<?= base_url('NuevoController/cargarOtrosTitulos3') ?>', function (response) {
            const otrosTitulosSelect = $('#editOtrosa');
            otrosTitulosSelect.empty(); // Limpiar opciones previas
            otrosTitulosSelect.append('<option value="">Seleccione un título</option>'); // Opción predeterminada

            response.forEach(titulo => {
                const selected = titulo.id_detalle_doc == otrosId ? 'selected' : '';
                otrosTitulosSelect.append(`<option value="${titulo.id_detalle_doc}" ${selected}>${titulo.detalle_ant_doc}</option>`);
            });

            // Mostrar el modal después de cargar las opciones
            $('#editModala').modal('show');
        });
    });

    // Manejo del formulario de edición
    $('#editForma').on('submit', function (e) {
        e.preventDefault();
        $.post(`<?= base_url('NuevoController/editRecord3') ?>/${$('#editIda').val()}`, $(this).serialize(), function (response) {
            location.reload();
        });
    });

    $('.btn-delete').on('click', function () {
        if (confirm('¿Estás seguro de eliminar este registro?')) {
            $.post(`<?= base_url('NuevoController/deleteRecord23') ?>/${$(this).data('id')}`, function () {
                location.reload();
            });
        }
    });
</script>


<!-- SCRIPT PARA CAPACITACIÓN -->
<script>
    $('.btn-detail4').on('click', function () {
        const id = $(this).data('id');

        // Mapeo de claves a nombres personalizados
        const columnNames = {
            'id_act_capacitacion': 'ID',
            'id_capacitacion': 'ID Capcitacion',
            'detalle_act_capacitacion': 'Detalle',
            'id_detalle_capacitacion': 'Cód. Capacitación',
            'fecha': 'fecha',
            // Añade aquí más claves y sus nombres personalizados según sea necesario
        };

        $.get(`<?= base_url('NuevoController/getDetailCapacitacion') ?>/${id}`, function (response) {
            const detailTableHead = $('#detailTableHead4');
            const detailTableBody = $('#detailTableBody4');

            detailTableHead.empty();
            detailTableBody.empty();

            // Crear encabezado de la tabla con nombres personalizados
            let headers = '<tr>';
            for (const key in columnNames) {
                if (response[key]) {
                    headers += `<th>${columnNames[key]}</th>`;
                }
            }
            headers += '</tr>';
            detailTableHead.append(headers);

            // Determinar la cantidad de filas a crear
            const numRows = response[Object.keys(response)[0]].length;

            // Crear filas con los valores del objeto
            for (let i = 0; i < numRows; i++) {
                let row = '<tr>';
                for (const key in columnNames) {
                    if (response[key]) {
                        row += `<td>${response[key][i]}</td>`;
                    }
                }
                row += '</tr>';
                detailTableBody.append(row);
            }

            $('#detailModal4').modal('show');
        });
    });
</script>

<script>
    
    // Obtener el listado de "otros títulos" al abrir el modal de agregar
    $('#addModalc').on('show.bs.modal', function () {
        $.get('<?= base_url('NuevoController/cargarOtrosTitulos4') ?>', function (response) {
            const otrosTitulosSelect = $('#addOtros2c');
            otrosTitulosSelect.empty(); // Limpiar opciones previas
            otrosTitulosSelect.append('<option value="">Seleccione un título</option>'); // Opción predeterminada
            
            response.forEach(titulo => {
                otrosTitulosSelect.append(`<option value="${titulo.id_detalle_capacitacion}">${titulo.detalle}</option>`);
            });
        });
    });

    $('#addFormc').on('submit', function (e) {
        e.preventDefault();
        $.post('<?= base_url('NuevoController/addRecord4') ?>', $(this).serialize(), function (response) {
            location.reload();
        });
    });

        
    // Cargar listado de "otros títulos" al abrir el modal de edición
    $('.btn-editc').on('click', function () {
        const idc = $(this).data('idc');
        const detallec = $(this).data('detallec');
        const fechac = $(this).data('fechac');
        const valoracionc = $(this).data('valoracionc');
        const otrosId = $(this).data('otrosc');

        // Asignar los valores al formulario
        $('#editIdc').val(idc);
        $('#editDetallec').val(detallec);
        $('#editFechac').val(fechac);
        $('#editValoracionc').val(valoracionc);

        // Obtener listado de "otros títulos" con la opción actual seleccionada
        $.get('<?= base_url('NuevoController/cargarOtrosTitulos4') ?>', function (response) {
            const otrosTitulosSelect = $('#editOtrosc');
            otrosTitulosSelect.empty(); // Limpiar opciones previas
            otrosTitulosSelect.append('<option value="">Seleccione un título</option>'); // Opción predeterminada

            response.forEach(titulo => {
                const selected = titulo.id_detalle_capacitacion == otrosId ? 'selected' : '';
                otrosTitulosSelect.append(`<option value="${titulo.id_detalle_capacitacion}" ${selected}>${titulo.detalle}</option>`);
            });

            // Mostrar el modal después de cargar las opciones
            $('#editModalc').modal('show');
        });
    });

    // Manejo del formulario de edición
    $('#editFormc').on('submit', function (e) {
        e.preventDefault();
        $.post(`<?= base_url('NuevoController/editRecord4') ?>/${$('#editIdc').val()}`, $(this).serialize(), function (response) {
            location.reload();
        });
    });

    $('.btn-delete').on('click', function () {
        if (confirm('¿Estás seguro de eliminar este registro?')) {
            $.post(`<?= base_url('NuevoController/deleteRecord24') ?>/${$(this).data('id')}`, function () {
                location.reload();
            });
        }
    });
</script>

<!-- SCRIPT PARA FORMACIÓN OFRECIDA -->
<script>
    $('.btn-detail5').on('click', function () {
        const id = $(this).data('id');

        // Mapeo de claves a nombres personalizados
        const columnNames = {
            'id_act_for_of': 'ID',
            'id_formacion': 'ID Formacion',
            'detalle_act_for_of': 'Detalle',
            'id_formacion_ofrecida': 'Cód. Formación Ofrecida',
            'fecha': 'fecha',
            // Añade aquí más claves y sus nombres personalizados según sea necesario
        };

        $.get(`<?= base_url('NuevoController/getDetailFormacionOfrecida') ?>/${id}`, function (response) {
            const detailTableHead = $('#detailTableHead5');
            const detailTableBody = $('#detailTableBody5');

            detailTableHead.empty();
            detailTableBody.empty();

            // Crear encabezado de la tabla con nombres personalizados
            let headers = '<tr>';
            for (const key in columnNames) {
                if (response[key]) {
                    headers += `<th>${columnNames[key]}</th>`;
                }
            }
            headers += '</tr>';
            detailTableHead.append(headers);

            // Determinar la cantidad de filas a crear
            const numRows = response[Object.keys(response)[0]].length;

            // Crear filas con los valores del objeto
            for (let i = 0; i < numRows; i++) {
                let row = '<tr>';
                for (const key in columnNames) {
                    if (response[key]) {
                        row += `<td>${response[key][i]}</td>`;
                    }
                }
                row += '</tr>';
                detailTableBody.append(row);
            }

            $('#detailModal5').modal('show');
        });
    });
</script>

<script>    
    // Obtener el listado de "otros títulos" al abrir el modal de agregar
    $('#addModalo').on('show.bs.modal', function () {
        $.get('<?= base_url('NuevoController/cargarOtrosTitulos5') ?>', function (response) {
            const otrosTitulosSelect = $('#addOtros2o');
            otrosTitulosSelect.empty(); // Limpiar opciones previas
            otrosTitulosSelect.append('<option value="">Seleccione un título</option>'); // Opción predeterminada
            
            response.forEach(titulo => {
                otrosTitulosSelect.append(`<option value="${titulo.id_formacion_ofrecida}">${titulo.detalle}</option>`);
            });
        });
    });

    $('#addFormo').on('submit', function (e) {
        e.preventDefault();
        $.post('<?= base_url('NuevoController/addRecord5') ?>', $(this).serialize(), function (response) {
            location.reload();
        });
    });

        
    // Cargar listado de "otros títulos" al abrir el modal de edición
    $('.btn-edito').on('click', function () {
        const ido = $(this).data('ido');
        const detalleo = $(this).data('detalleo');
        const fechao = $(this).data('fechao');
        const valoraciono = $(this).data('valoraciono');
        const otrosId = $(this).data('otroso');

        // Asignar los valores al formulario
        $('#editIdo').val(ido);
        $('#editDetalleo').val(detalleo);
        $('#editFechao').val(fechao);
        $('#editValoraciono').val(valoraciono);

        // Obtener listado de "otros títulos" con la opción actual seleccionada
        $.get('<?= base_url('NuevoController/cargarOtrosTitulos5') ?>', function (response) {
            const otrosTitulosSelect = $('#editOtroso');
            otrosTitulosSelect.empty(); // Limpiar opciones previas
            otrosTitulosSelect.append('<option value="">Seleccione un título</option>'); // Opción predeterminada

            response.forEach(titulo => {
                const selected = titulo.id_formacion_ofrecida == otrosId ? 'selected' : '';
                otrosTitulosSelect.append(`<option value="${titulo.id_formacion_ofrecida}" ${selected}>${titulo.detalle}</option>`);
            });

            // Mostrar el modal después de cargar las opciones
            $('#editModalo').modal('show');
        });
    });

    // Manejo del formulario de edición
    $('#editFormo').on('submit', function (e) {
        e.preventDefault();
        $.post(`<?= base_url('NuevoController/editRecord5') ?>/${$('#editIdo').val()}`, $(this).serialize(), function (response) {
            location.reload();
        });
    });

    $('.btn-delete').on('click', function () {
        if (confirm('¿Estás seguro de eliminar este registro?')) {
            $.post(`<?= base_url('NuevoController/deleteRecord25') ?>/${$(this).data('id')}`, function () {
                location.reload();
            });
        }
    });
</script>


<!-- SCRIPT PARA INVESTIGACIÓN  -->
<script>
    $('.btn-detail6').on('click', function () {
        const id = $(this).data('id');

        // Mapeo de claves a nombres personalizados
        const columnNames = {
            'id_act_investigacion': 'ID',
            'id_investigacion': 'ID Investigación',
            'detalle_act_investigacion': 'Detalle',
            'id_detalle_investigacion': 'Cód. Investigacion',
            'fecha': 'fecha',
            // Añade aquí más claves y sus nombres personalizados según sea necesario
        };

        $.get(`<?= base_url('NuevoController/getDetailInvestigacion') ?>/${id}`, function (response) {
            const detailTableHead = $('#detailTableHead6');
            const detailTableBody = $('#detailTableBody6');

            detailTableHead.empty();
            detailTableBody.empty();

            // Crear encabezado de la tabla con nombres personalizados
            let headers = '<tr>';
            for (const key in columnNames) {
                if (response[key]) {
                    headers += `<th>${columnNames[key]}</th>`;
                }
            }
            headers += '</tr>';
            detailTableHead.append(headers);

            // Determinar la cantidad de filas a crear
            const numRows = response[Object.keys(response)[0]].length;

            // Crear filas con los valores del objeto
            for (let i = 0; i < numRows; i++) {
                let row = '<tr>';
                for (const key in columnNames) {
                    if (response[key]) {
                        row += `<td>${response[key][i]}</td>`;
                    }
                }
                row += '</tr>';
                detailTableBody.append(row);
            }

            $('#detailModal6').modal('show');
        });
    });
</script>

<script>
    
    // Obtener el listado de "otros títulos" al abrir el modal de agregar
    $('#addModali').on('show.bs.modal', function () {
        $.get('<?= base_url('NuevoController/cargarOtrosTitulos6') ?>', function (response) {
            const otrosTitulosSelect = $('#addOtros2i');
            otrosTitulosSelect.empty(); // Limpiar opciones previas
            otrosTitulosSelect.append('<option value="">Seleccione un título</option>'); // Opción predeterminada
            
            response.forEach(titulo => {
                otrosTitulosSelect.append(`<option value="${titulo.id_detalle_investigacion}">${titulo.detalle}</option>`);
            });
        });
    });

    $('#addFormi').on('submit', function (e) {
        e.preventDefault();
        $.post('<?= base_url('NuevoController/addRecord6') ?>', $(this).serialize(), function (response) {
            location.reload();
        });
    });

        
    // Cargar listado de "otros títulos" al abrir el modal de edición
    $('.btn-editi').on('click', function () {
        const idi = $(this).data('idi');
        const detallei = $(this).data('detallei');
        const fechai = $(this).data('fechai');
        const valoracioni = $(this).data('valoracioni');
        const otrosId = $(this).data('otrosi');

        // Asignar los valores al formulario
        $('#editIdi').val(idi);
        $('#editDetallei').val(detallei);
        $('#editFechai').val(fechai);
        $('#editValoracioni').val(valoracioni);

        // Obtener listado de "otros títulos" con la opción actual seleccionada
        $.get('<?= base_url('NuevoController/cargarOtrosTitulos6') ?>', function (response) {
            const otrosTitulosSelect = $('#editOtrosi');
            otrosTitulosSelect.empty(); // Limpiar opciones previas
            otrosTitulosSelect.append('<option value="">Seleccione un título</option>'); // Opción predeterminada

            response.forEach(titulo => {
                const selected = titulo.id_detalle_investigacion == otrosId ? 'selected' : '';
                otrosTitulosSelect.append(`<option value="${titulo.id_detalle_investigacion}" ${selected}>${titulo.detalle}</option>`);
            });

            // Mostrar el modal después de cargar las opciones
            $('#editModali').modal('show');
        });
    });

    // Manejo del formulario de edición
    $('#editFormi').on('submit', function (e) {
        e.preventDefault();
        $.post(`<?= base_url('NuevoController/editRecord6') ?>/${$('#editIdi').val()}`, $(this).serialize(), function (response) {
            location.reload();
        });
    });

    $('.btn-delete').on('click', function () {
        if (confirm('¿Estás seguro de eliminar este registro?')) {
            $.post(`<?= base_url('NuevoController/deleteRecord26') ?>/${$(this).data('id')}`, function () {
                location.reload();
            });
        }
    });
</script>

<!-- SCRIPT PARA OTROS ANTECEDENTES  -->
<script>
    $('.btn-detail7').on('click', function () {
        const id = $(this).data('id');

        // Mapeo de claves a nombres personalizados
        const columnNames = {
            'id_act_otros': 'ID',
            'id_detalle_ant': 'ID Otros Ant',
            'detalle_act_otros': 'Detalle',
            'id_detalle_otros_ant': 'Cód. Otros Antecedentes',
            'fecha': 'fecha',
            // Añade aquí más claves y sus nombres personalizados según sea necesario
        };

        $.get(`<?= base_url('NuevoController/getDetailOtros') ?>/${id}`, function (response) {
            const detailTableHead = $('#detailTableHead7');
            const detailTableBody = $('#detailTableBody7');

            detailTableHead.empty();
            detailTableBody.empty();

            // Crear encabezado de la tabla con nombres personalizados
            let headers = '<tr>';
            for (const key in columnNames) {
                if (response[key]) {
                    headers += `<th>${columnNames[key]}</th>`;
                }
            }
            headers += '</tr>';
            detailTableHead.append(headers);

            // Determinar la cantidad de filas a crear
            const numRows = response[Object.keys(response)[0]].length;

            // Crear filas con los valores del objeto
            for (let i = 0; i < numRows; i++) {
                let row = '<tr>';
                for (const key in columnNames) {
                    if (response[key]) {
                        row += `<td>${response[key][i]}</td>`;
                    }
                }
                row += '</tr>';
                detailTableBody.append(row);
            }

            $('#detailModal7').modal('show');
        });
    });
</script>
<script>
    
    // Obtener el listado de "otros títulos" al abrir el modal de agregar
    $('#addModaloa').on('show.bs.modal', function () {
        $.get('<?= base_url('NuevoController/cargarOtrosTitulos7') ?>', function (response) {
            const otrosTitulosSelect = $('#addOtros2oa');
            otrosTitulosSelect.empty(); // Limpiar opciones previas
            otrosTitulosSelect.append('<option value="">Seleccione un título</option>'); // Opción predeterminada
            
            response.forEach(titulo => {
                otrosTitulosSelect.append(`<option value="${titulo.id_detalle_otros_ant}">${titulo.detalle_otros_ant}</option>`);
            });
        });
    });

    $('#addFormoa').on('submit', function (e) {
        e.preventDefault();
        $.post('<?= base_url('NuevoController/addRecord7') ?>', $(this).serialize(), function (response) {
            location.reload();
        });
    });

        
    // Cargar listado de "otros títulos" al abrir el modal de edición
    $('.btn-editoa').on('click', function () {
        const idoa = $(this).data('idoa');
        const detalleoa = $(this).data('detalleoa');
        const fechaoa = $(this).data('fechaoa');
        const valoracionoa = $(this).data('valoracionoa');
        const otrosId = $(this).data('otrosoa');

        // Asignar los valores al formulario
        $('#editIdoa').val(idoa);
        $('#editDetalleoa').val(detalleoa);
        $('#editFechaoa').val(fechaoa);
        $('#editValoracionoa').val(valoracionoa);

        // Obtener listado de "otros títulos" con la opción actual seleccionada
        $.get('<?= base_url('NuevoController/cargarOtrosTitulos7') ?>', function (response) {
            const otrosTitulosSelect = $('#editOtrosoa');
            otrosTitulosSelect.empty(); // Limpiar opciones previas
            otrosTitulosSelect.append('<option value="">Seleccione un título</option>'); // Opción predeterminada

            response.forEach(titulo => {
                const selected = titulo.id_detalle_otros_ant == otrosId ? 'selected' : '';
                otrosTitulosSelect.append(`<option value="${titulo.id_detalle_otros_ant}" ${selected}>${titulo.detalle_otros_ant}</option>`);
            });

            // Mostrar el modal después de cargar las opciones
            $('#editModaloa').modal('show');
        });
    });

    // Manejo del formulario de edición
    $('#editFormoa').on('submit', function (e) {
        e.preventDefault();
        $.post(`<?= base_url('NuevoController/editRecord7') ?>/${$('#editIdoa').val()}`, $(this).serialize(), function (response) {
            location.reload();
        });
    });

    $('.btn-delete').on('click', function () {
        if (confirm('¿Estás seguro de eliminar este registro?')) {
            $.post(`<?= base_url('NuevoController/deleteRecord27') ?>/${$(this).data('id')}`, function () {
                location.reload();
            });
        }
    });
</script>


<!-- SCRIPT PARA ANT LABORALES -->
<script>
    $('.btn-detail8').on('click', function () {
        const id = $(this).data('id');

        // Mapeo de claves a nombres personalizados
        const columnNames = {
            'id_act_lab': 'ID',
            'id_ant_lab': 'ID Ant Lab',
            'detalle_act_lab': 'Detalle',
            'id_detalle_lab': 'Cód. Ant Laborales',
            'cantidad': 'cantidad',
            // Añade aquí más claves y sus nombres personalizados según sea necesario
        };

        $.get(`<?= base_url('NuevoController/getDetailLab') ?>/${id}`, function (response) {
            const detailTableHead = $('#detailTableHead8');
            const detailTableBody = $('#detailTableBody8');

            detailTableHead.empty();
            detailTableBody.empty();

            // Crear encabezado de la tabla con nombres personalizados
            let headers = '<tr>';
            for (const key in columnNames) {
                if (response[key]) {
                    headers += `<th>${columnNames[key]}</th>`;
                }
            }
            headers += '</tr>';
            detailTableHead.append(headers);

            // Determinar la cantidad de filas a crear
            const numRows = response[Object.keys(response)[0]].length;

            // Crear filas con los valores del objeto
            for (let i = 0; i < numRows; i++) {
                let row = '<tr>';
                for (const key in columnNames) {
                    if (response[key]) {
                        row += `<td>${response[key][i]}</td>`;
                    }
                }
                row += '</tr>';
                detailTableBody.append(row);
            }

            $('#detailModal8').modal('show');
        });
    });
</script>

<script>
     // Obtener el listado de "otros títulos" al abrir el modal de agregar
    $('#addModalal').on('show.bs.modal', function () {
        $.get('<?= base_url('NuevoController/cargarOtrosTitulos8') ?>', function (response) {
            const otrosTitulosSelect = $('#addOtros2al');
            otrosTitulosSelect.empty(); // Limpiar opciones previas
            otrosTitulosSelect.append('<option value="">Seleccione un título</option>'); // Opción predeterminada
            
            response.forEach(titulo => {
                otrosTitulosSelect.append(`<option value="${titulo.id_detalle_lab}">${titulo.detalle_ant_lab}</option>`);
            });
        });
    });

    $('#addFormal').on('submit', function (e) {
        e.preventDefault();
        $.post('<?= base_url('NuevoController/addRecord8') ?>', $(this).serialize(), function (response) {
            location.reload();
        });
    });

        
    // Cargar listado de "otros títulos" al abrir el modal de edición
    $('.btn-edital').on('click', function () {
        const idal = $(this).data('idal');
        const detalleal = $(this).data('detalleal');
        const cantidadal = $(this).data('cantidadal');
        const valoracional = $(this).data('valoracional');
        const otrosId = $(this).data('otrosal');

        // Asignar los valores al formulario
        $('#editIdal').val(idal);
        $('#editDetalleal').val(detalleal);
        $('#editCantidadal').val(cantidadal);
        $('#editValoracional').val(valoracional);

        // Obtener listado de "otros títulos" con la opción actual seleccionada
        $.get('<?= base_url('NuevoController/cargarOtrosTitulos8') ?>', function (response) {
            const otrosTitulosSelect = $('#editOtrosal');
            otrosTitulosSelect.empty(); // Limpiar opciones previas
            otrosTitulosSelect.append('<option value="">Seleccione un título</option>'); // Opción predeterminada

            response.forEach(titulo => {
                const selected = titulo.id_detalle_lab == otrosId ? 'selected' : '';
                otrosTitulosSelect.append(`<option value="${titulo.id_detalle_lab}" ${selected}>${titulo.detalle_ant_lab}</option>`);
            });

            // Mostrar el modal después de cargar las opciones
            $('#editModalal').modal('show');
        });
    });

    // Manejo del formulario de edición
    $('#editFormal').on('submit', function (e) {
        e.preventDefault();
        $.post(`<?= base_url('NuevoController/editRecord8') ?>/${$('#editIdal').val()}`, $(this).serialize(), function (response) {
            location.reload();
        });
    });

    $('.btn-delete').on('click', function () {
        if (confirm('¿Estás seguro de eliminar este registro?')) {
            $.post(`<?= base_url('NuevoController/deleteRecord28') ?>/${$(this).data('id')}`, function () {
                location.reload();
            });
        }
    });
</script>

