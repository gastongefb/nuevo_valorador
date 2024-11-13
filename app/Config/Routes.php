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
$routes->post('mostrar_valoraciones_porDocente_porMateria3', 'NuevoController::mostrar_valoraciones_porDocente_porMateria3');
$routes->post('actualizarValoracion', 'NuevoController::actualizarValoracion');
$routes->post('actualizarOtrosTitulos', 'NuevoController::actualizarOtrosTitulos');
$routes->post('actualizarPosFormacion', 'NuevoController::actualizarPosFormacion');