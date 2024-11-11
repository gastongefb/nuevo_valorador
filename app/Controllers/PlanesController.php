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

class PlanesController extends BaseController
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

    
    //FUNCIÓN PARA MOSTRAR LOS PLANES DE ESTUDIO
    public function mostrarPlanes()
    {

        $db = \Config\Database::connect();

    
            $sql = $db->table('carreras');
            //$sql->select('id_carrera,nombre_carrera');
            $query = $sql->get();
            $resultado = $query->getResultArray();
           
            $data = ['titulo'=> 'Listado de Validaciones', 'carreras'=>$resultado];
            //return view('mostrarValidaciones', $data);

        helper('form');
        return view('mostrarPlanes/mostrarPlanes2',$data);

    }

    public function mostrarPlanes3()
    {


        {
            $db = \Config\Database::connect();

            $var = ($_POST['id_carrera']);
            //echo $var;
            
            $sql = $db->table('materias m');
            $sql->select('m.*');
            $sql->where('id_carrera_materia', $var);
            $query = $sql->get();
            $resultado = $query->getResultArray();

            $sql = $db->table('carreras c');
            $sql->select('c.*');
            $sql->where('id_carrera',$var);
            $query = $sql->get();
            $resul = $query->getResultArray();


          
            $data = ['titulo'=> 'Listado de Validaciones', 'validaciones'=>$resultado];
            $data2 = ['titulo'=> 'Listado de Validaciones', 'validaciones2'=>$resul];
            return view('mostrarPlanes/mostrarPlanes4', $data + $data2);
            
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
