<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 //CARGA LA RUTA POR DEFECTO
//$routes->get('/', 'Home::index');
//$routes->get('/validacion', 'Validacion::index');
//$routes->get('/buscarporid/(:num)', 'Validacion::buscarporid/$1');
//$routes->get('/insertar', 'Validacion::insertar');
//$routes->get('/actualizar', 'Validacion::actualizar');
//$routes->get('/eliminar', 'Validacion::eliminar');

// para login
$routes->get('/', 'Home::index');
$routes->get('/inicio', 'Home::inicio');
$routes->post('/login', 'Home::login');
$routes->get('/salir', 'Home::salir');
//fin login

//RUTAS PATA MOSTRAR PLANES DE ESTUDIO
$routes->get('/mostrarPlanes', 'PlanesController::mostrarPlanes');
$routes->post('/mostrarPlanes3', 'PlanesController::mostrarPlanes3'); 

//RUTA PARA MOSTRAR LAS MATERIAS
$routes->get('/mostrar_materias', 'MateriasController::mostrar_materias');

//RUTAS PARA CARGAR UNA NUEVA MATERIA
$routes->get('/insertar_materia1', 'MateriasController::insertar_materia1');
$routes->post('/insertar_materia2', 'MateriasController::insertar_materia2');

//RUTAS PARA EDITAR MATERIAS
$routes->get('/materias', 'MateriasController::act');
$routes->get('/search', 'MateriasController::search');
$routes->get('/edit/(:num)', 'MateriasController::edit/$1');
$routes->post('/update/(:num)', 'MateriasController::update/$1');

//RUTAS PARA CARGAR NUEVA VALORACIÓN
$routes->get('cargar_valoracion', 'PersonController::paso1');
$routes->post('guardarTitulo', 'PersonController::guardarTitulo');
$routes->get('paso2', 'PersonController::paso2');
$routes->post('guardarPostgrado', 'PersonController::guardarPostgrado');
$routes->get('paso6', 'PersonController::paso6');
$routes->post('guardarOtrosTitulos', 'PersonController::guardarOtrosTitulos');
$routes->get('paso3', 'PersonController::paso3');
$routes->post('guardarCapacitacion', 'PersonController::guardarCapacitacion');
$routes->get('paso4', 'PersonController::paso4');
$routes->post('guardarAntDocentes', 'PersonController::guardarAntDocentes');
$routes->get('paso5', 'PersonController::paso5');
$routes->get('paso7', 'PersonController::paso7');
$routes->post('guardarOtrosAntDocentes', 'PersonController::guardarOtrosAntDocentes');
$routes->post('guardarAntLab', 'PersonController::guardarAntLab');
$routes->get('confirmacion', 'PersonController::confirmar');

//RUTAS PARA MOSTRAR UNA VALORACIÓN POR DOCENTE
$routes->get('/buscar_valoracion_por_docente', 'PersonController::buscar_valoracion_por_docente');
$routes->post('/buscar_valoracion_por_docente2', 'PersonController::buscar_valoracion_por_docente2');


//RUTAS PARA MOSTRAR TODAS LAS VALORACIONES POR MATERIA
$routes->get('/Mostrar_Valoraciones_Por_Materia', 'PersonController::Mostrar_Valoraciones_Por_Materia');
$routes->post('Mostrar_Valoraciones_Por_Materia3', 'PersonController::Mostrar_Valoraciones_Por_Materia3');

//RUTAS PARA MOSTRAR TODAS LAS VALORACIONES
$routes->get('/mostrar_valoraciones', 'PersonController::mostrar_valoraciones');
$routes->post('/mostrar_valoraciones', 'PersonController::mostrar_valoraciones');



$routes->get('/nuevo', 'Validacion::nuevo');

$routes->post('/guardar', 'Validacion::guardar');


//RUTAS PARA TRABAJAR CON DOCENTES
$routes->get('/buscar_docente', 'DocenteController::buscar_docente');
$routes->post('/buscar_docente2', 'DocenteController::buscar_docente2');

$routes->get('/Docente', 'DocenteController::index');
$routes->get('/Docente/create', 'DocenteController::create');
$routes->post('/Docente', 'DocenteController::store');
$routes->get('/Docente/(:num)', 'DocenteController::show/$1');
$routes->get('/Docente/(:num)/edit', 'DocenteController::edit/$1',[ 'as' => 'Docente.edit' ]); 
$routes->put('/Docente/:id', 'DocenteController::update');
$routes->post('/Docente/update/(:num)', 'DocenteController::update/$1',[ 'as' => 'Docente.update' ]); 
$routes->delete('/Docente/(:num)', 'DocenteController::destroy/$1',[ 'as' => 'Docente.destroy' ]); 



//$routes->delete('/Docente/:num', 'DocenteController::destroy');
//$routes->delete('/Docente/:id', 'DocenteController::destroy')->filter('authGuard');
/*$routes->get('/Docente', 'DocenteController::index');
$routes->get('/Docente/create', 'DocenteController::create');
$routes->post('/Docente', 'DocenteController::store');
$routes->get('/Docente/(:num)', 'DocenteController::show/$1');

$routes->get('/Docente/:id/edit', 'DocenteController::edit');
$routes->put('/Docente/:id', 'DocenteController::update');
$routes->delete('/Docente/(:num)', 'DocenteController::destroy/$1',[ 'as' => 'Docente.destroy' ]); */


// Rutas personalizadas
$routes->get('cargar_datos', 'NuevoController::cargar_datos');

// Rutas para guardar cada sección
$routes->post('guardarT', 'NuevoController::guardarT');
$routes->post('guardarOT', 'NuevoController::guardarOT');
$routes->post('guardarP', 'NuevoController::guardarP');
$routes->post('guardarA', 'NuevoController::guardarA');
$routes->post('guardarFR', 'NuevoController::guardarFR');
$routes->post('guardarFO', 'NuevoController::guardarFO');
$routes->post('guardarI', 'NuevoController::guardarI');
$routes->post('guardarOA', 'NuevoController::guardarOA');
$routes->post('guardarAL', 'NuevoController::guardarAL');

// Ruta para guardar los datos finales en la base de datos
$routes->get('guardarDatosFinales', 'NuevoController::guardarDatosFinales');


//
$routes->get('mostrar_valoraciones_porDocente_porMateria1', 'NuevoController::mostrar_valoraciones_porDocente_porMateria1');

//$routes->match(['get', 'post'], 'mostrar_valoraciones_porDocente_porMateria3', 'NuevoController::mostrar_valoraciones_porDocente_porMateria3');

$routes->post('mostrar_valoraciones_porDocente_porMateria3', 'NuevoController::mostrar_valoraciones_porDocente_porMateria3');
$routes->post('actualizarValoracion', 'NuevoController::actualizarValoracion');
$routes->post('actualizarOtrosTitulos', 'NuevoController::actualizarOtrosTitulos');
$routes->post('actualizarPosFormacion', 'NuevoController::actualizarPosFormacion');

$routes->post('update2', 'NuevoController::update2');






$routes->get('data', 'DataController::index2');
$routes->post('DataController/update', 'DataController::update');

$routes->get('data2', 'NuevoController::mostrar_valoraciones_porDocente_porMateria1');
$routes->post('DataController/update2', 'DataController::update2');


$routes->get('data', 'NuevoController::updateDynamic');
$routes->post('DataController/update', 'DataController::update');

$routes->post('NuevoController/updateDynamic', 'NuevoController::updateDynamic'); // Ruta para manejar la actualización dinámica

$routes->post('NuevoController/getSelectOptions', 'NuevoController::getSelectOptions');

$routes->post('NuevoController/deleteRecord', 'NuevoController::deleteRecord'); // Ruta para manejar la eliminación dinámica

$routes->post('NuevoController/agregarRegistro', 'NuevoController::agregarRegistro'); // Ruta para manejar la agregación dinámica

$routes->post('NuevoController/agregarRegistro2', 'NuevoController::agregarRegistro2'); // Ruta para manejar la agregación dinámica




//RUTAS PARA ACTUALIZAR
//RUTAS PARA TITULO
$routes->get('NuevoController/cargarOtrosTitulos0', 'NuevoController::cargarOtrosTitulos0');
$routes->get('NuevoController/cargarMaterias', 'NuevoController::cargarMaterias');
$routes->post('NuevoController/editRecord0/(:num)', 'NuevoController::editRecord0/$1');
$routes->post('NuevoController/deleteRecord20/(:num)', 'NuevoController::deleteRecord20/$1');
//RUTAS PARA FORMULARIO MODAL QUE MUESTRA EL DETALLE DE LOS ITEM EN LA OPCIÓN ACTUALIZAR
$routes->get('NuevoController/getDetail/(:num)', 'NuevoController::getDetail/$1');

//RUTAS PARA OTROS TÍTULOS
$routes->post('NuevoController/addRecord', 'NuevoController::addRecord');
$routes->get('NuevoController/cargarOtrosTitulos', 'NuevoController::cargarOtrosTitulos');
$routes->post('NuevoController/editRecord/(:num)', 'NuevoController::editRecord/$1');
$routes->post('NuevoController/deleteRecord2/(:num)', 'NuevoController::deleteRecord2/$1');
//RUTAS PARA FORMULARIO MODAL QUE MUESTRA EL DETALLE DE LOS ITEM EN LA OPCIÓN ACTUALIZAR
$routes->get('NuevoController/getDetail/(:num)', 'NuevoController::getDetail/$1');

//RUTAS PARA POSTGRADO
$routes->post('NuevoController/addRecord2', 'NuevoController::addRecord2');
$routes->get('NuevoController/cargarOtrosTitulos2', 'NuevoController::cargarOtrosTitulos2');
$routes->post('NuevoController/editRecord2/(:num)', 'NuevoController::editRecord2/$1');
$routes->post('NuevoController/deleteRecord22/(:num)', 'NuevoController::deleteRecord22/$1');
//RUTAS PARA FORMULARIO MODAL QUE MUESTRA EL DETALLE DE LOS ITEM EN LA OPCIÓN ACTUALIZAR
$routes->get('NuevoController/getDetailPostgrado/(:num)', 'NuevoController::getDetailPostgrado/$1');


//RUTAS PARA ANTIGUEDAD
$routes->post('NuevoController/addRecord3', 'NuevoController::addRecord3');
$routes->get('NuevoController/cargarOtrosTitulos3', 'NuevoController::cargarOtrosTitulos3');
$routes->post('NuevoController/editRecord3/(:num)', 'NuevoController::editRecord3/$1');
$routes->post('NuevoController/deleteRecord23/(:num)', 'NuevoController::deleteRecord23/$1');
//RUTAS PARA FORMULARIO MODAL QUE MUESTRA EL DETALLE DE LOS ITEM EN LA OPCIÓN ACTUALIZAR
$routes->get('NuevoController/getDetailAntiguedad/(:num)', 'NuevoController::getDetailAntiguedad/$1');

//RUTAS PARA CAPACITACIÓN
$routes->post('NuevoController/addRecord4', 'NuevoController::addRecord4');
$routes->get('NuevoController/cargarOtrosTitulos4', 'NuevoController::cargarOtrosTitulos4');
$routes->post('NuevoController/editRecord4/(:num)', 'NuevoController::editRecord4/$1');
$routes->post('NuevoController/deleteRecord24/(:num)', 'NuevoController::deleteRecord24/$1');
//RUTAS PARA FORMULARIO MODAL QUE MUESTRA EL DETALLE DE LOS ITEM EN LA OPCIÓN ACTUALIZAR
$routes->get('NuevoController/getDetailCapacitacion/(:num)', 'NuevoController::getDetailCapacitacion/$1');

//RUTAS PARA FORMACIÓN OFRECIDA
$routes->post('NuevoController/addRecord5', 'NuevoController::addRecord5');
$routes->get('NuevoController/cargarOtrosTitulos5', 'NuevoController::cargarOtrosTitulos5');
$routes->post('NuevoController/editRecord5/(:num)', 'NuevoController::editRecord5/$1');
$routes->post('NuevoController/deleteRecord25/(:num)', 'NuevoController::deleteRecord25/$1');
//RUTAS PARA FORMULARIO MODAL QUE MUESTRA EL DETALLE DE LOS ITEM EN LA OPCIÓN ACTUALIZAR
$routes->get('NuevoController/getDetailFormacionOfrecida/(:num)', 'NuevoController::getDetailFormacionOfrecida/$1');

//RUTAS PARA INVESTIGACIÓN
$routes->post('NuevoController/addRecord6', 'NuevoController::addRecord6');
$routes->get('NuevoController/cargarOtrosTitulos6', 'NuevoController::cargarOtrosTitulos6');
$routes->post('NuevoController/editRecord6/(:num)', 'NuevoController::editRecord6/$1');
$routes->post('NuevoController/deleteRecord26/(:num)', 'NuevoController::deleteRecord26/$1');
//RUTAS PARA FORMULARIO MODAL QUE MUESTRA EL DETALLE DE LOS ITEM EN LA OPCIÓN ACTUALIZAR
$routes->get('NuevoController/getDetailInvestigacion/(:num)', 'NuevoController::getDetailInvestigacion/$1');

//RUTAS PARA OTROS ANTECEDENTES
$routes->post('NuevoController/addRecord7', 'NuevoController::addRecord7');
$routes->get('NuevoController/cargarOtrosTitulos7', 'NuevoController::cargarOtrosTitulos7');
$routes->post('NuevoController/editRecord7/(:num)', 'NuevoController::editRecord7/$1');
$routes->post('NuevoController/deleteRecord27/(:num)', 'NuevoController::deleteRecord27/$1');
//RUTAS PARA FORMULARIO MODAL QUE MUESTRA EL DETALLE DE LOS ITEM EN LA OPCIÓN ACTUALIZAR
$routes->get('NuevoController/getDetailOtros/(:num)', 'NuevoController::getDetailOtros/$1');

//RUTAS PARA ANTECEDENTES LABORALES
$routes->post('NuevoController/addRecord8', 'NuevoController::addRecord8');
$routes->get('NuevoController/cargarOtrosTitulos8', 'NuevoController::cargarOtrosTitulos8');
$routes->post('NuevoController/editRecord8/(:num)', 'NuevoController::editRecord8/$1');
$routes->post('NuevoController/deleteRecord28/(:num)', 'NuevoController::deleteRecord28/$1');
//RUTAS PARA FORMULARIO MODAL QUE MUESTRA EL DETALLE DE LOS ITEM EN LA OPCIÓN ACTUALIZAR
$routes->get('NuevoController/getDetailLab/(:num)', 'NuevoController::getDetailLab/$1');




//$routes->get('pdf', 'PdfController::index'); // Ruta para mostrar la vista con la tabla de datos.
//RUTA PARA CREAR PDF DE TODAS LAS VALORACIONES
$routes->post('pdf/generatePdf', 'PdfController::generatePdf'); 
//RUTA PARA CREAR PDF DE LAS VALORACIONES POR MATERIA
$routes->post('pdf/generatePdfPorMateria', 'PdfController::generatePdfPorMateria');
//RUTA PARA CREA PDF DE VALORACIONES POR DOCENTE
$routes->post('pdf/generatePdfPorDocente', 'PdfController::generatePdfPorDocente');

//RUTAS PARA ENVIAR CORREOS
$routes->get('/correo', 'CorreoController::index');
$routes->post('/correo/enviar', 'CorreoController::enviarCorreo');

