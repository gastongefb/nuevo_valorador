<?php

namespace App\Controllers;

use App\Models\ValidacionModel;
use App\Models\MateriasModel;
use App\Models\ValoracionModel;
use App\Models\ValoracionPostgradoModel;
use App\Models\TitulosModel;
use App\Models\CondicionDocenteModel; 
use CodeIgniter\Controller;
use App\Models\TitulosPostgradoModel;
use App\Models\CapacitacionModel;
use App\Models\AntecedentesDocModel;
use App\Models\AntecedentesLabModel;

use App\Models\DetalleCapacitacionModel;
use App\Models\DetalleAntLabModel;
use App\Models\DetalleAntDocModel;
use App\Models\CarrerasModel;


class MateriasController extends BaseController
{

    // ESTO ES EL CONSTRUCTOR
    private $materiaModel;
    private $valoracionModel;
    private $vpModel;
    public function __construct()
    {
        $this->materiaModel = new MateriasModel();
        $this->valoracionModel = new ValidacionModel();
        $this->vpModel = new ValoracionPostgradoModel();
    }
     //

   

    
    public function index()
    {
        {
            $db = \Config\Database::connect();
    
            $sql = $db->table('validacion');
            $sql->select('id_validacion,dni,titulo,j1,j2,j3,id_validacion_condicion,nombre_materia');
            $sql->join('materias', 'id_materia_validacion = materias.id_materia')->where('dni', 27269774);
            $query = $sql->get();
            $resultado = $query->getResultArray();
            
    
            //echo $db->getLasTQuery(); //CON ESTO HAGO QUE SE VEA EN LA VISTA LA CONSULTA QUE ESTOY EJECUTANDO

    
            $data = ['titulo'=> 'Listado de Validaciones', 'validaciones'=>$resultado];
            return view('mostrarValidaciones', $data);
        }
    }

    
    //FUNCIÓN PARA MOSTRAR LAS MATERIAS
    public function mostrar_materias()
    {
        $db = \Config\Database::connect();

        $query = $db->table('materias')
        //->where('cuatrimestre', 1)
        //->where('id_materia <', 5)
        ->orderBy('nombre_materia', 'asc')
        ->get();
        $resultado = $query->getResultArray();// SI PONGO getResult() ME VA A DEVOLVER EL RESULTADO EN OBJETOS

        $data = ['titulo'=> 'Listado de Materias', 'materias'=>$resultado];
        return view('mostrarMaterias', $data);
    }

    //FUNCIÓN PARA CARGAR NUEVAS MATERIAS
    public function insertar_materia1()
    {

        $db = \Config\Database::connect();

    
            $sql = $db->table('carreras');
            //$sql->select('id_carrera,nombre_carrera');
            $query = $sql->get();
            $resultado = $query->getResultArray();
          
            $data = ['titulo'=> 'Listado de Validaciones', 'carreras'=>$resultado];
            //return view('mostrarValidaciones', $data);

        helper('form');
        return view('cargar_materia',$data);

    }

    public function insertar_materia2()
    {

        $n = ($_POST['nombre']);
        $c = ($_POST['cuatrimestre']);
        $cc = ($_POST['id_carrera']);
        //echo $var;

        $arreglo = [
        
            'nombre_materia'=> $n,
            'cuatrimestre'=> $c,
            'id_carrera_materia'=> $cc
        ];

        //echo $this->materiaModel->insert($arreglo); // DEVUELVE EL ID DEL REGISTRO INGRESADO
        echo $this->materiaModel->insert($arreglo ,false); //SI LO PONGO ASÍ ME DEVUELVE 1 SI INSERTO Y 0 SINO
        echo $this->materiaModel->getInsertID(); //CON ESTO OBTENGO EL ÚLTIMO ID INSERTADO

        return  redirect()->to(base_url().'');

        
    }

    //FUNCIÓN PARA ACTUALIZAR MATERIAS
    public function act()
    {
        return view('materias/search');
    }

    public function search()
    {
        $model = new MateriasModel();
        $term = $this->request->getGet('search'); // Use getGet instead of getVar for GET requests

        $data['materias'] = $model->searchMaterias($term);

        return view('materias/list', $data);
    }

    public function edit($id)
    {
        $car = new CarrerasModel();
        $data2['carrera'] = $car->traerCarreras();
        $model = new MateriasModel();
        $data['materia'] = $model->find($id);

        // Combina los arrays para pasarlos a la vista
        $data = array_merge($data, $data2);

        return view('materias/edit', $data);
    }

    public function update($id)
    {
        $model = new MateriasModel();

        $data = [
            'nombre_materia' => $this->request->getVar('nombre_materia'),
            'cuatrimestre'   => $this->request->getVar('cuatrimestre'),
            'id_carrera_materia' => $this->request->getVar('id_carrera'),
        ];
        
           log_message('debug', 'Datos a actualizar: ' . print_r($data, true)); // Registro de depuración

        if ($model->update($id, $data)) {
            // Obtener los datos actualizados de la materia
            $updatedData['materia'] = $model->find($id);

             // Obtener el ID de la carrera desde la materia actualizada
            $id_ca = $updatedData['materia']['id_carrera_materia'];
            $car = new CarrerasModel();
            $carreraData = $car->traerUnaCarrera($id_ca);

            // Registro de depuración para los datos de la carrera
            log_message('debug', 'Datos de la carrera: ' . print_r($carreraData, true));

            // Asegurarnos de que traerUnaCarrera devuelve un array asociativo con los datos de la carrera
            if ($carreraData && isset($carreraData['nombre_carrera'])) {
               $updatedData['materia']['nombre_carrera'] = $carreraData['nombre_carrera'];
            } 
            else{
                   $updatedData['materia']['nombre_carrera'] = 'Carrera no encontrada';
                }

          return view('materias/updated', $updatedData);
        } 
        else{
               return redirect()->back()->with('error', 'No se pudo actualizar la materia');
            }
    }
      

    public function insertar()
    {
        $arreglo = [
        
            'nombre_materia'=> "matematica III",
            'cuatrimestre'=> "2"
        ];

        //echo $this->materiaModel->insert($arreglo); // DEVUELVE EL ID DEL REGISTRO INGRESADO
        echo $this->materiaModel->insert($arreglo ,false); //SI LO PONGO ASÍ ME DEVUELVE 1 SI INSERTO Y 0 SINO
        echo $this->materiaModel->getInsertID(); //CON ESTO OBTENGO EL ÚLTIMO ID INSERTADO
    }

   
  

    public function actualizar()
    {
        $arreglo = [
        
            'nombre_materia'=> "matematica I",
            'cuatrimestre'=> "2"
        ];

        
        echo $this->materiaModel->update(5, $arreglo); //ACÁ NECESITO PASARLE EL ID DE LA MATERIA , EN ESTE CASO ES EL 11
        //echo $this->materiaModel->update([5,9], $arreglo);//SI QUIERO MOIFICAR VARIOS REGISTROS A LA VEZ, AGREGO UN ARREGLO CON LOS ID A MODIFICAR    
    }

    public function eliminar()
    {
               
        echo $this->materiaModel->delete(11); // RECORDAR QUE PARA ELIMINAR ES NECESARIO MODIFICAR LA PEOPIEDAD  $useSoftDeletes = false;
                                              // DEL MODELO Y COLOCARLA EN false. SI ESTÁ EN TRUE SOLO SE VA A GUARDAR LA FECHA DE ELIMINACIÓN,
                                              // PERO PARA ESTO VAMOS A TENER QUE TENER UN CAMPO fecha_de_eliminacion EN LA TABLA 
                                              //PARA ELIMINAR TAMBIÉN PODEMOS PASAR UN ARREGLO DE VARIOS ELEMENTOS [1,4,8]
                                              //SI HAGO EL SOFTDELETE LUEGO CUANDO EJECUTE EL findALL() NO ME VA MOSTRAR LOS REGISTROS ELIMINADOS, PARA 
                                              //PODER VER ESOS REGISTROS DEBO EJECUTAR withDleted->findAll(), SI QUIERO VER SOLO LOS ELIMINADOS
                                              //DEBO EJECUTAR onlyDeleted->findAll()
                                              //SI QUIERO ELIMINAR LOS ARCHIVOS ELIMINADOS CON softDeleted EJECUTO purgeDeleted() Y LOS VOY A ELIMINAR
                                              //EFECTIVAMENTE DE LA TABLA
    }

 

    public function nuevo()
    {
        helper('form');
        return view('nuevo');

    }

    public function guardar()
    {
        $var = ($_POST['codigo']);
        echo $var;
    }


 
   


}
