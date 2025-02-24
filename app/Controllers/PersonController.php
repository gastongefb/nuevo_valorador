<?php
// app/Controllers/DynamicInputs.php

namespace App\Controllers;

use CodeIgniter\Controller;

namespace App\Controllers;

use App\Models\PersonModel;
use CodeIgniter\Controller;
use App\Models\ValoracionPostgradoModel;
use App\Models\ValidacionModel;
use App\Models\TitulosPostgradoModel;
use App\Models\CapacitacionModel;
use App\Models\AntecedentesDocModel;
use App\Models\AntecedentesLabModel;
use App\Models\TitulosModel;
use App\Models\DetalleCapacitacionModel;
use App\Models\DetalleAntLabModel;
use App\Models\DetalleAntDocModel;
use App\Models\MateriasModel;
use App\Models\CondicionDocenteModel;
use App\Models\DocenteModel;
use App\Models\ValoracionOtrosTitulosModel;
use App\Models\OtrosAntecedentesDocModel;
use App\Models\OtrosTitulosModel;  
use App\Models\DetalleOtrosAntDocModel;  
use App\Models\InvestigacionModel;  
use App\Models\FormacionOfrecidaModel;
use App\Models\DetalleFormacionOfrecidaModel;
use App\Models\DetalleInvestigacionModel;

       

use CodeIgniter\I18n\Time;

use App\Libraries\Pdf;

//PRUEBA DE PAGINACION
use App\Models\paginacion\Model1;
use App\Models\paginacion\Model2;


class PersonController extends Controller
{
    
    private $vpModel;
    //private $valModel;
    public function __construct()
    {
       $this->vpModel = new ValoracionPostgradoModel();
       //$this->valModel = new ValidacionModel();
    }


    //FUNCIÓN PARA CARGAR UNA NUEVA VALORACIÓN
    public function paso1()
    {
        $db = \Config\Database::connect();

    
        $sql = $db->table('titulos');
        //$sql->select('id_carrera,nombre_carrera');
        $query = $sql->get();
        $resultado = $query->getResultArray();

        $data = ['titulo'=> 'Listado de Títulos', 'titulos'=>$resultado];
        //return view('mostrarValidaciones', $data);

        $sql2 = $db->table('materias');
        //$sql->select('id_carrera,nombre_carrera');
        $query2 = $sql2->get();
        $resultado2 = $query2->getResultArray();

        $data2 = ['titulo'=> 'Listado de Materias', 'materias'=>$resultado2];
        //return view('mostrarValidaciones', $data);

        $sql3 = $db->table('condicion_docente');
        //$sql->select('id_carrera,nombre_carrera');
        $query3 = $sql3->get();
        $resultado3 = $query3->getResultArray();

        $data3 = ['titulo'=> 'Listado de Materias', 'condicion'=>$resultado3];
        


        helper('form');
        //return view('cargarValoracion', $data+$data2+$data3);
        return view('valoracion/cargar_titulo.php', $data+$data2+$data3);
    }

    public function guardarTitulo()
    {
        // Recuperar los datos del formulario
        $datos = $this->request->getPost();

        //print_r($datos);

        if (empty($datos)) {
            throw new \Exception("No se recibieron datos del formulario titulo");
        }

        // Comprobar si existen datos en la sesión
        $datosSesion = session()->get('datos_paso1') ?? [];

        // Fusionar los datos actuales con los existentes en la sesión
        $datosSesion = array_merge($datosSesion, $datos);

        // Guardar los datos en la sesión
        session()->set('datos_paso1', $datosSesion);

        return redirect()->to('paso2');
    }
    
    public function paso2()
    {
        return view('valoracion/cargar_titulo_postgrado');
    }

    public function guardarPostgrado()
    {
        // Recuperar los datos del formulario
        $datos = $this->request->getPost();

        print_r($datos);

        if (empty($datos)) {
            throw new \Exception("No se recibieron datos del formulario postgrado");
        }

        // Comprobar si existen datos en la sesión
        $datosSesion = session()->get('datos_paso2') ?? [];

        // Fusionar los datos actuales con los existentes en la sesión
        $datosSesion = array_merge($datosSesion, $datos);

        // Guardar los datos en la sesión
        session()->set('datos_paso2', $datosSesion);

        //return redirect()->to('paso3');
        return redirect()->to('paso6');
    }

    public function paso6()
    {
        return view('valoracion/otros_titulos');
    }

    public function guardarOtrosTitulos()
    {
        // Recuperar los datos del formulario
        $datos = $this->request->getPost();

        print_r($datos);

        if (empty($datos)) {
            throw new \Exception("No se recibieron datos del formulario postgrado");
        }

        // Comprobar si existen datos en la sesión
        $datosSesion = session()->get('datos_paso6') ?? [];

        // Fusionar los datos actuales con los existentes en la sesión
        $datosSesion = array_merge($datosSesion, $datos);

        // Guardar los datos en la sesión
        session()->set('datos_paso6', $datosSesion);

        return redirect()->to('paso3');
      

        
    }
    
    public function paso3()
    {
        return view('valoracion/cargar_capacitacion');
    }

    public function guardarCapacitacion()
    {
        // Recuperar los datos del formulario
        $datos = $this->request->getPost();

        // Comprobar si existen datos en la sesión
        $datosSesion = session()->get('datos_paso3') ?? [];

        // Fusionar los datos actuales con los existentes en la sesión
        $datosSesion = array_merge($datosSesion, $datos);

        // Guardar los datos en la sesión
        session()->set('datos_paso3', $datosSesion);

        return redirect()->to('paso4');
    }

   
    public function paso4()
    {
        return view('valoracion/cargar_ant_docentes');
    }

    public function guardarAntDocentes()
    {
        // Recuperar los datos del formulario
        $datos = $this->request->getPost();

        // Comprobar si existen datos en la sesión
        $datosSesion = session()->get('datos_paso4') ?? [];

        // Fusionar los datos actuales con los existentes en la sesión
        $datosSesion = array_merge($datosSesion, $datos);

        // Guardar los datos en la sesión
        session()->set('datos_paso4', $datosSesion);

        //return redirect()->to('paso5');
        return redirect()->to('paso7');
    }

    public function paso7()
    {
        return view('valoracion/cargar_otros_ant_docentes');
    }

    public function guardarOtrosAntDocentes()
    {
        // Recuperar los datos del formulario
        $datos = $this->request->getPost();

        // Comprobar si existen datos en la sesión
        $datosSesion = session()->get('datos_paso7') ?? [];

        // Fusionar los datos actuales con los existentes en la sesión
        $datosSesion = array_merge($datosSesion, $datos);

        // Guardar los datos en la sesión
        session()->set('datos_paso7', $datosSesion);

        //return redirect()->to('paso5');
        return redirect()->to('paso5');
    }
    
    public function paso5()
    {
        return view('valoracion/cargar_ant_laborales');
    }

    public function guardarAntLab()
    {
        // Recuperar los datos del formulario
        $datos = $this->request->getPost();

        // Comprobar si existen datos en la sesión
        $datosSesion = session()->get('datos_paso5') ?? [];

        // Fusionar los datos actuales con los existentes en la sesión
        $datosSesion = array_merge($datosSesion, $datos);

        // Guardar los datos en la sesión
        session()->set('datos_paso5', $datosSesion);

        //return redirect()->to('paso5');
        return redirect()->to('confirmacion');
    }

  
    public function confirmar()
    {
        // Recuperar los datos de la sesión
        $datosPaso1 = session()->get('datos_paso1');
        $datosPaso2 = session()->get('datos_paso2');
        $datosPaso3 = session()->get('datos_paso3');
        $datosPaso4 = session()->get('datos_paso4');
        $datosPaso5 = session()->get('datos_paso5');
        $datosPaso6 = session()->get('datos_paso6');
        $datosPaso7 = session()->get('datos_paso7');

        
      

        // Iterar sobre los datos de paso 1
    if ($datosPaso1) {
        //echo "Datos del Paso 1:<br>";
        foreach ($datosPaso1 as $key => $value) {
            //echo "$key: $value<br>";
        }
    } else {
        //echo "No hay datos en el Paso 1.<br>";
    }

    $val = new ValidacionModel();

    if ($datosPaso1) {
        $val->insert($datosPaso1);
    }

    $post = new TitulosPostgradoModel();

    
    $ult = $val->obtenerUltimoCampoDeseado();
    // Inicializar el id_valoracion que vamos a asignar
    $nuevoIdValoracion = $ult;// ? $ult + 1 : 1;
    //$nuevoIdValoracion++;

    // Iterar sobre los datos de paso 2 y añadir el nuevo campo
    if (isset($datosPaso2['persons']) && is_array($datosPaso2['persons'])) {
        //echo "Datos del Paso 2:<br>";
        foreach ($datosPaso2['persons'] as &$person) {
                        
            // Agregar el campo 'id_valoracion'
            $person['id_valoracion'] = $nuevoIdValoracion;
            //echo "Id Valoración: " . $person['id_valoracion'] . "<br><br>";
        }
        unset($person); // Romper la referencia
    } else {
        echo "No hay datos en el Paso 2.<br>";
    }

    // Iterar sobre los datos de paso 3 y añadir el nuevo campo
    if (isset($datosPaso3['persons2']) && is_array($datosPaso3['persons2'])) {
        //echo "Datos del Paso 3:<br>";
        foreach ($datosPaso3['persons2'] as &$person2) {
           
            
            // Agregar el campo 'id_valoracion'
            $person2['id_valoracion'] = $nuevoIdValoracion;
            //echo "Id Valoración: " . $person2['id_valoracion'] . "<br><br>";
        }
        unset($person2); // Romper la referencia
    } else {
        echo "No hay datos en el Paso 3.<br>";
    }

    // Iterar sobre los datos de paso 4 y añadir el nuevo campo
    if (isset($datosPaso4['persons3']) && is_array($datosPaso4['persons3'])) {
        //echo "Datos del Paso 4:<br>";
        foreach ($datosPaso4['persons3'] as &$person3) {
            
            
            // Agregar el campo 'id_valoracion'
            $person3['id_valoracion'] = $nuevoIdValoracion;
            //echo "Id Valoración: " . $person3['id_valoracion'] . "<br><br>";
        }
        unset($person3); // Romper la referencia
    } else {
        //echo "No hay datos en el Paso 4.<br>";
    }

    // Iterar sobre los datos de paso 5 y añadir el nuevo campo
    if (isset($datosPaso5['persons4']) && is_array($datosPaso5['persons4'])) {
        //echo "Datos del Paso 5:<br>";
        foreach ($datosPaso5['persons4'] as &$person4) {
                       
            // Agregar el campo 'id_valoracion'
            $person4['id_valoracion'] = $nuevoIdValoracion;
            //echo "Id Valoración: " . $person4['id_valoracion'] . "<br><br>";
        }
        unset($person4); // Romper la referencia
    } else {
        //echo "No hay datos en el Paso 5.<br>";
    }

    // Iterar sobre los datos de paso 6 y añadir el nuevo campo
    if (isset($datosPaso6['persons6']) && is_array($datosPaso6['persons6'])) {
        //echo "Datos del Paso 5:<br>";
        foreach ($datosPaso6['persons6'] as &$person6) {
                       
            // Agregar el campo 'id_valoracion'
            $person6['id_valoracion'] = $nuevoIdValoracion;
            //echo "Id Valoración: " . $person4['id_valoracion'] . "<br><br>";
        }
        unset($person6); // Romper la referencia
    } else {
        //echo "No hay datos en el Paso 5.<br>";
    }

     // Iterar sobre los datos de paso 7 y añadir el nuevo campo
     if (isset($datosPaso7['persons7']) && is_array($datosPaso7['persons7'])) {
        //echo "Datos del Paso 5:<br>";
        foreach ($datosPaso7['persons7'] as &$person7) {
                       
            // Agregar el campo 'id_valoracion'
            $person7['id_valoracion'] = $nuevoIdValoracion;
            //echo "Id Valoración: " . $person4['id_valoracion'] . "<br><br>";
        }
        unset($person7); // Romper la referencia
    } else {
        //echo "No hay datos en el Paso 5.<br>";
    }

        
        $valp = new ValoracionPostgradoModel();
        $cap = new CapacitacionModel();
        $ant_doc = new AntecedentesDocModel();
        $ant_lab = new AntecedentesLabModel();
        $otros_t = new ValoracionOtrosTitulosModel();
        $otros_ant_d = new OtrosAntecedentesDocModel();

        //echo"datos paso 6";
        //print_r($datosPaso6);
          // Preparar los datos para la inserción
        $datosParaInsertar = $datosPaso2['persons'] ?? [];
        $datosParaInsertar3 = $datosPaso3['persons2'] ?? [];
        $datosParaInsertar4 = $datosPaso4['persons3'] ?? [];
        $datosParaInsertar5 = $datosPaso5['persons4'] ?? [];
        $datosParaInsertar6 = $datosPaso6['persons6'] ?? [];
        $datosParaInsertar7 = $datosPaso7['persons7'] ?? [];
        


        //print_r($datosParaInsertar);
        
        if (!empty($datosParaInsertar)) {
         foreach ($datosParaInsertar as $dato) {
            $valp->insert($dato);
         }
            
        }
        
        //print_r($datosParaInsertar3);
        if (!empty($datosParaInsertar3)) {
            foreach ($datosParaInsertar3 as $dato3) {
               $cap->insert($dato3);
            }
           }

        if (!empty($datosParaInsertar4)) {
            foreach ($datosParaInsertar4 as $dato4) {
                $ant_doc->insert($dato4);
            }
           }   

        if (!empty($datosParaInsertar5)) {
            foreach ($datosParaInsertar5 as $dato5) {
                $ant_lab->insert($dato5);
            }
           }   
           
           //echo"datos para insertar";
           //print_r($datosParaInsertar6);   
        if (!empty($datosParaInsertar6)) {
            foreach ($datosParaInsertar6 as $dato6) {
                $otros_t->insert($dato6);
            }
           }    
        
        if (!empty($datosParaInsertar7)) {
            foreach ($datosParaInsertar7 as $dato7) {
                $otros_ant_d->insert($dato7);
            }
           }    
        // Borrar los datos de la sesión después de guardar en la base de datos
        session()->remove('datos_paso1');
        session()->remove('datos_paso2');
        session()->remove('datos_paso3');
        session()->remove('datos_paso4');
        session()->remove('datos_paso5');
        session()->remove('datos_paso6');
        session()->remove('datos_paso7');

        //return "Datos guardados correctamente.";
        return  redirect()->to(base_url().'');

    }

    //FUNCIÓN PARA BUSCAR VALORACIONES POR DOCENTE
    public function buscar_valoracion_por_docente()
    {
        return view('buscar_valoración');
    }

    public function buscar_valoracion_por_docente2()
    {
        

        // Obtén el DNI del input (por ejemplo, de un formulario)
        //$dni = $this->request->getPost('dni');
        
        // Obtén el DNI del input (por ejemplo, de un formulario)
        $request = service('request'); 
        $dni = $request->getPost('dni');

        
        $db = \Config\Database::connect();


        $validacionModel = new ValidacionModel();
        
        $mat = new MateriasModel();

        $tit = new TitulosModel();

        $con = new CondicionDocenteModel();

        $valpos = new ValoracionPostgradoModel();

        $Titulopostgrado = new TitulosPostgradoModel();
        $cap = new CapacitacionModel();
        $antLab = new AntecedentesLabModel();
        $antDoc = new AntecedentesDocModel();
        $otros_ant = new OtrosAntecedentesDocModel();

        
    // Obtener todos los registros de la tabla 'valoracion'
    $registros = $validacionModel->getValoracionDni($dni);

    if ((!empty($registros)) and (!empty($dni))){

    $fechaActual = Time::now(); //TRAE FECHA ACTUAL

    //ESTO LO HAGO PARA OBTERNER NOMBRE Y APELLIDO PARA MOSTRAR EN LA VISTA
    $docc = new DocenteModel();
    $dd = $docc->getDatosDocentes($dni);
    $nom = $dd[0]['nombre'];
    $ape = $dd[0]['apellido'];

     

    foreach ($registros as $registro) {
        $dni = $registro['dni'];
        $idTitulo = $registro['id_titulo'];
        $j1 = $registro['j1'];
        $j2 = $registro['j2'];
        $j3 = $registro['j3'];
        $idMateriaValoracion = $registro['id_materia_valoracion'];
        //$idCondicion = $registro['id_condicion'];
        $id_va = $registro['id_valoracion'];
        //echo $id_va;
        //echo" ";
        $tt = $mat->getNombreMateria($idMateriaValoracion);
        $materia = $tt[0]['nombre_materia'];
        
        $t = $tit->getDatosByCodigo($idTitulo);
        $titulo_det = $t[0]['detalle_titulo'];

        $fecha = $registro['fecha_alta'];
        // Formatear la fecha
        $fechaFormateada = date('d-m-Y', strtotime($fecha));

        $fecha2 = $registro['fecha_modifica'];
        // Formatear la fecha
        $fechaFormateada2 = date('d-m-Y', strtotime($fecha));

        
        //PASOS PARA ARMAR EL PUNTAJE
        $suma = 0;
         //PUNTAJE OTROS TITULOS
         $val_otros_t = new ValoracionOtrosTitulosModel();
         $datosTabla9 = $val_otros_t ->getCodigoById_valoracion($id_va);//ACÁ PUEDE TRAER VARIOS
         $otros_t = new OtrosTitulosModel();
         // Recorrer el array de códigos y obtener los puntajes del modelo TitulosPostgradoModel
         foreach ($datosTabla9 as $t) {
             $otros_titulo = $otros_t->find($t['id_otros_titulos']); // Suponiendo que el método find busca por la clave primaria
             $tot3 = $otros_titulo['puntaje'];
             $suma = $suma + $tot3;
         }

        //PUNTAJE POSTGRADO
        $val = $valpos->getCodigoById_valoracion($id_va);
        //$suma = 0;
        foreach($val as $vv) {
            $valor = $vv['id_titulo_postgrado'];
            $puntaje = $Titulopostgrado->getCodigoByPuntaje($valor);
            $suma=$suma + $puntaje[0]['puntaje']; 
        }

        //PUNTAJE ANTECEDENTES DOCENTES-ANTIGUEDAD            
        $datosTabla5 = $antDoc->getDatosById_ant_doc($id_va);//ACÁ PUEDE TRAER VARIOS
        $do = new DetalleAntDocModel();
        foreach ($datosTabla5 as $dc) {
           $detalle_do = $do->find($dc['id_detalle_doc']); // Suponiendo que el método find busca por la clave primaria
           $tot2 = $dc['cantidad'] * $detalle_do['puntaje'];//CALCULA EL PUNTAJE FINAL EN BASE A LA CANTIDAD DE AÑOS
           $suma = $suma + $tot2;
        }

        //PUNTAJE FORMACIÓN RECIBIDA
        $datos_capacitacion = $cap->getCodigoById_detallae_cap($id_va);
        $ca = new DetalleCapacitacionModel();
        foreach ($datos_capacitacion as $c) {
            $capacitacion = $ca->find($c['id_detalle_capacitacion']);
            //$suma = $suma + $capacitacion['puntaje'];

            $fechaGuardada = Time::parse($c['fecha']); //CONVIERTO LA FECHA EN UN OBJETO TIME
            $diferencia = $fechaGuardada->difference($fechaActual);
            $diferenciaAnios = $diferencia->getYears();
            $diferenciaMeses = $diferencia->getMonths();
            $diferenciaDias = $diferencia->getDays();//CALCULAR LA DIFERENCIA DE AÑOS
            if ($diferenciaAnios < 5 || ($diferenciaAnios == 5 && $diferenciaMeses == 0 && $diferenciaDias == 0)) {
              
                $suma = $suma + $capacitacion['puntaje'];
                //echo"entro por el si";
            }
            
        }

        //PUNTAJE FORMACIÓN OFRECIDA
        $f_o = new FormacionOfrecidaModel();
        $datosTabla_f_o = $f_o->getCodigoById_formacion_ofrecida($id_va);//ACÁ PUEDE TRAER VARIOS
        $detalle_for = new DetalleFormacionOfrecidaModel();
        // Recorrer el array de códigos y obtener los puntajes del modelo TitulosPostgradoModel
        foreach ($datosTabla_f_o as $t) {
            $otra_for = $detalle_for->find($t['id_formacion_ofrecida']); // Suponiendo que el método find busca por la clave primaria
            $tot4 = $otra_for['puntaje'];
            $suma = $suma + $tot4;
        }

        //PUNTAJE INVESTIGACIÓN
        $inv = new InvestigacionModel();
        $datosTabla_inv = $inv->getCodigoById_detallae_inv($id_va);//ACÁ PUEDE TRAER VARIOS
        $detalle_inv = new DetalleInvestigacionModel();
        // Recorrer el array de códigos y obtener los puntajes del modelo TitulosPostgradoModel
        foreach ($datosTabla_inv as $t) {
            $otra_inv = $detalle_inv->find($t['id_detalle_investigacion']); // Suponiendo que el método find busca por la clave primaria
            $tot5 = $otra_inv['puntaje'];
            $suma = $suma + $tot5;
        }

         //PUNTAJE OTROS ANTECEDENTES DOCENTES
         $oa = new OtrosAntecedentesDocModel();
         $datosTabla_oa = $oa->getDatosById_otros_ant($id_va);//ACÁ PUEDE TRAER VARIOS
         $detalle_oa = new DetalleOtrosAntDocModel();
         // Recorrer el array de códigos y obtener los puntajes del modelo TitulosPostgradoModel
         foreach ($datosTabla_oa as $t) {
             $otra_oa = $detalle_oa->find($t['id_detalle_otros_ant']); // Suponiendo que el método find busca por la clave primaria
             $tot6 = $otra_oa['puntaje'];
             $suma = $suma + $tot6;
         }

        //PUNTAJE DE ANTECEDENTES LABORALES
        $datosTabla4 = $antLab->getDatosById_detalle_lab($id_va);//ACÁ PUEDE TRAER 
        $dl = new DetalleAntLabModel();
        foreach ($datosTabla4 as $de) {
           $detalle_la = $dl->find($de['id_detalle_lab']); // Suponiendo que el método find busca por la clave primaria
           $tot7 = $de['cantidad'] * $detalle_la['puntaje'];//CALCULA EL PUNTAJE FINAL EN BASE A LA CANTIDAD DE AÑOS
           $suma = $suma + $tot7;
        }
              
        //PUNTAJE DEL TÍTULO DE BASE
        $datosTabla2 = $tit->getDatosByCodigo($idTitulo);//ACÁ TRAE UN DATO
        $vv = $datosTabla2[0]['detalle_titulo']; 
        $vv2 = $datosTabla2[0]['puntaje']; 
    
        $suma = $suma + $vv2;

        //ARMO UN ARREGLO CON TODOS LOS DATOS QUE NECESITO MOSTRAR
      
        $titulo[] = [
            'dni' => $dni,
            'titulo_det' => $titulo_det,
            'j1' => $j1,
            'j2' => $j2,
            'j3' => $j3,
            'materia' => $materia,
            'condicion' => $materia,
            'puntaje' => $suma,
            'fecha_alta' => $fechaFormateada,
            'fecha_modifica' => $fechaFormateada2,
            'nombre' => $nom,
            'apellido' => $ape,

        ];
    
        usort($titulo, function($a, $b) {
            // Definimos las prioridades en el orden correcto
            $prioridades = [
                'Docente' => 1,
                'Habilitante' => 2,
                'Supletorio' => 3
            ];
        
            // Normalizamos los títulos eliminando espacios en blanco
            $tituloA = trim($a['titulo_det']);
            $tituloB = trim($b['titulo_det']);
        
            // Asignamos prioridades según el título
            $prioridadA = $prioridades[$tituloA] ?? PHP_INT_MAX;
            $prioridadB = $prioridades[$tituloB] ?? PHP_INT_MAX;
        
            // Primero ordenamos por prioridad del título
            if ($prioridadA !== $prioridadB) {
                return $prioridadA - $prioridadB; // Menor prioridad va primero
            }
        
            // Si tienen la misma prioridad, ordenamos por puntaje (de mayor a menor)
            return $b['puntaje'] - $a['puntaje']; // Orden descendente por puntaje

      
     }); 
    } 
    //PASAMOS LOS DATOS A LA VISTA  
    //return view('resultado_busqueda_valoracion', ['datosTabla1' => $titulo,]);
    return view('mostrarValoracionesPorDocentes', ['datosTabla1' => $titulo,]);
            
    } 
       
    }

    //FUNCIÓN PARA BUSCAR VALORACIONES POR MATERIA
    public function Mostrar_Valoraciones_Por_Materia()
    {
        $db = \Config\Database::connect();

    
        $sql2 = $db->table('materias');
        //$sql->select('id_carrera,nombre_carrera');
        $query2 = $sql2->get();
        $resultado2 = $query2->getResultArray();

        $data2 = ['titulo'=> 'Listado de Materias', 'materias'=>$resultado2];
        //return view('mostrarValidaciones', $data);
      
        helper('form');
        //return view('cargarValoracion', $data+$data2+$data3);
        return view('Mostrar_Valoraciones_Por_Materia2', $data2);
    }

    public function Mostrar_Valoraciones_Por_Materia3()
    {
         // Recuperar los datos del formulario
         $datos = $this->request->getPost(); 

        //ACA TENGO QUE HACER ALGO PARECIDO A mostrar_valoraciones(), PERO PARA LA MATERIA PARTICULAR

        $db = \Config\Database::connect();


        $validacionModel = new ValidacionModel();
        
        $mat = new MateriasModel();

        $tit = new TitulosModel();

        $con = new CondicionDocenteModel();

        $valpos = new ValoracionPostgradoModel();

        $Titulopostgrado = new TitulosPostgradoModel();
        $cap = new CapacitacionModel();
        $antLab = new AntecedentesLabModel();
        $antDoc = new AntecedentesDocModel();
        $otros_ant = new OtrosAntecedentesDocModel();

    // Obtener todos los registros de la tabla 'valoracion'
    $registros = $validacionModel->getValidacionesPorMateria($datos);

    if ((!empty($registros)) and (!empty($datos))){

      $fechaActual = Time::now(); //TRAE FECHA ACTUAL

       foreach ($registros as $registro) {
        $dni = $registro['dni'];
        $idTitulo = $registro['id_titulo'];
        $j1 = $registro['j1'];
        $j2 = $registro['j2'];
        $j3 = $registro['j3'];
        $idMateriaValoracion = $registro['id_materia_valoracion'];
        //$idCondicion = $registro['id_condicion'];
        $id_va = $registro['id_valoracion'];
        //echo $id_va;
        //echo" ";
        $tt = $mat->getNombreMateria($idMateriaValoracion);
        $materia = $tt[0]['nombre_materia'];
        
        $t = $tit->getDatosByCodigo($idTitulo);
        $titulo_det = $t[0]['detalle_titulo'];

        $fecha = $registro['fecha_alta'];
        // Formatear la fecha
        $fechaFormateada = date('d-m-Y', strtotime($fecha));

        $fecha2 = $registro['fecha_modifica'];
        // Formatear la fecha
        $fechaFormateada2 = date('d-m-Y', strtotime($fecha));
        
        //PASOS PARA ARMAR EL PUNTAJE
        $suma = 0;
         //PUNTAJE OTROS TITULOS
         $val_otros_t = new ValoracionOtrosTitulosModel();
         $datosTabla9 = $val_otros_t ->getCodigoById_valoracion($id_va);//ACÁ PUEDE TRAER VARIOS
         $otros_t = new OtrosTitulosModel();
         // Recorrer el array de códigos y obtener los puntajes del modelo TitulosPostgradoModel
         foreach ($datosTabla9 as $t) {
             $otros_titulo = $otros_t->find($t['id_otros_titulos']); // Suponiendo que el método find busca por la clave primaria
             $tot3 = $otros_titulo['puntaje'];
             $suma = $suma + $tot3;
         }

        //PUNTAJE POSTGRADO
        $val = $valpos->getCodigoById_valoracion($id_va);
        //$suma = 0;
        foreach($val as $vv) {
            $valor = $vv['id_titulo_postgrado'];
            $puntaje = $Titulopostgrado->getCodigoByPuntaje($valor);
            $suma=$suma + $puntaje[0]['puntaje']; 
        }

        //PUNTAJE ANTECEDENTES DOCENTES-ANTIGUEDAD            
        $datosTabla5 = $antDoc->getDatosById_ant_doc($id_va);//ACÁ PUEDE TRAER VARIOS
        $do = new DetalleAntDocModel();
        foreach ($datosTabla5 as $dc) {
           $detalle_do = $do->find($dc['id_detalle_doc']); // Suponiendo que el método find busca por la clave primaria
           $tot2 = $dc['cantidad'] * $detalle_do['puntaje'];//CALCULA EL PUNTAJE FINAL EN BASE A LA CANTIDAD DE AÑOS
           $suma = $suma + $tot2;
        }

        //PUNTAJE FORMACIÓN RECIBIDA
        $datos_capacitacion = $cap->getCodigoById_detallae_cap($id_va);
        $ca = new DetalleCapacitacionModel();
        foreach ($datos_capacitacion as $c) {
            $capacitacion = $ca->find($c['id_detalle_capacitacion']);
            //$suma = $suma + $capacitacion['puntaje'];

            $fechaGuardada = Time::parse($c['fecha']); //CONVIERTO LA FECHA EN UN OBJETO TIME
            $diferencia = $fechaGuardada->difference($fechaActual);
            $diferenciaAnios = $diferencia->getYears();
            $diferenciaMeses = $diferencia->getMonths();
            $diferenciaDias = $diferencia->getDays();//CALCULAR LA DIFERENCIA DE AÑOS
            if ($diferenciaAnios < 5 || ($diferenciaAnios == 5 && $diferenciaMeses == 0 && $diferenciaDias == 0)) {
              
                $suma = $suma + $capacitacion['puntaje'];
                //echo"entro por el si";
            }
            
        }

        //PUNTAJE FORMACIÓN OFRECIDA
        $f_o = new FormacionOfrecidaModel();
        $datosTabla_f_o = $f_o->getCodigoById_formacion_ofrecida($id_va);//ACÁ PUEDE TRAER VARIOS
        $detalle_for = new DetalleFormacionOfrecidaModel();
        // Recorrer el array de códigos y obtener los puntajes del modelo TitulosPostgradoModel
        foreach ($datosTabla_f_o as $t) {
            $otra_for = $detalle_for->find($t['id_formacion_ofrecida']); // Suponiendo que el método find busca por la clave primaria
            $tot4 = $otra_for['puntaje'];
            $suma = $suma + $tot4;
        }

        //PUNTAJE INVESTIGACIÓN
        $inv = new InvestigacionModel();
        $datosTabla_inv = $inv->getCodigoById_detallae_inv($id_va);//ACÁ PUEDE TRAER VARIOS
        $detalle_inv = new DetalleInvestigacionModel();
        // Recorrer el array de códigos y obtener los puntajes del modelo TitulosPostgradoModel
        foreach ($datosTabla_inv as $t) {
            $otra_inv = $detalle_inv->find($t['id_detalle_investigacion']); // Suponiendo que el método find busca por la clave primaria
            $tot5 = $otra_inv['puntaje'];
            $suma = $suma + $tot5;
        }

         //PUNTAJE OTROS ANTECEDENTES DOCENTES
         $oa = new OtrosAntecedentesDocModel();
         $datosTabla_oa = $oa->getDatosById_otros_ant($id_va);//ACÁ PUEDE TRAER VARIOS
         $detalle_oa = new DetalleOtrosAntDocModel();
         // Recorrer el array de códigos y obtener los puntajes del modelo TitulosPostgradoModel
         foreach ($datosTabla_oa as $t) {
             $otra_oa = $detalle_oa->find($t['id_detalle_otros_ant']); // Suponiendo que el método find busca por la clave primaria
             $tot6 = $otra_oa['puntaje'];
             $suma = $suma + $tot6;
         }

        //PUNTAJE DE ANTECEDENTES LABORALES
        $datosTabla4 = $antLab->getDatosById_detalle_lab($id_va);//ACÁ PUEDE TRAER 
        $dl = new DetalleAntLabModel();
        foreach ($datosTabla4 as $de) {
           $detalle_la = $dl->find($de['id_detalle_lab']); // Suponiendo que el método find busca por la clave primaria
           $tot7 = $de['cantidad'] * $detalle_la['puntaje'];//CALCULA EL PUNTAJE FINAL EN BASE A LA CANTIDAD DE AÑOS
           $suma = $suma + $tot7;
        }
    
        //PUNTAJE DEL TÍTULO DE BASE
        $datosTabla2 = $tit->getDatosByCodigo($idTitulo);//ACÁ TRAE UN DATO
        $vv = $datosTabla2[0]['detalle_titulo']; 
        $vv2 = $datosTabla2[0]['puntaje']; 
    
        $suma = $suma + $vv2;

        //ARMO UN ARREGLO CON TODOS LOS DATOS QUE NECESITO MOSTRAR
      
        $titulo[] = [
            'dni' => $dni,
            'titulo_det' => $titulo_det,
            'j1' => $j1,
            'j2' => $j2,
            'j3' => $j3,
            'materia' => $materia,
            'condicion' => $materia,
            'puntaje' => $suma,
            'fecha_alta' => $fechaFormateada,
            'fecha_modifica' => $fechaFormateada2,

        ];
      //echo"$titulo_det";
      usort($titulo, function($a, $b) {
        // Definimos las prioridades en el orden correcto
        $prioridades = [
            'Docente' => 1,
            'Habilitante' => 2,
            'Supletorio' => 3
        ];
    
        // Normalizamos los títulos eliminando espacios en blanco
        $tituloA = trim($a['titulo_det']);
        $tituloB = trim($b['titulo_det']);
    
        // Asignamos prioridades según el título
        $prioridadA = $prioridades[$tituloA] ?? PHP_INT_MAX;
        $prioridadB = $prioridades[$tituloB] ?? PHP_INT_MAX;
    
        // Primero ordenamos por prioridad del título
        if ($prioridadA !== $prioridadB) {
            return $prioridadA - $prioridadB; // Menor prioridad va primero
        }
    
        // Si tienen la misma prioridad, ordenamos por puntaje (de mayor a menor)
        return $b['puntaje'] - $a['puntaje']; // Orden descendente por puntaje
       }); //LLAVES DE LA FUNCIÓN USORT

    } //DEL FOREACH

    //PASAMOS LOS DATOS A LA VISTA  
    return view('mostrarValoracionesPorMateria', ['datosTabla1' => $titulo,]);
            
    } //DEL IF
    
 }  


    //FUNCIÓN PARA MOSTRAR TODAS LAS VALORACIONES
    public function mostrar_valoraciones()
    {
            $db = \Config\Database::connect();


            $validacionModel = new ValidacionModel();
            
            $mat = new MateriasModel();

            $tit = new TitulosModel();

            //$con = new CondicionDocenteModel();

            $valpos = new ValoracionPostgradoModel();

            $Titulopostgrado = new TitulosPostgradoModel();
            $cap = new CapacitacionModel();
            $antLab = new AntecedentesLabModel();
            $antDoc = new AntecedentesDocModel();

            $doc = new DocenteModel();

            $fechaActual = Time::now(); //TRAE FECHA ACTUAL

        // Obtener todos los registros de la tabla 'valoracion'
        $registros = $validacionModel->findAll();

        //print_r($registros);
        //$titulo=[];
        // Iterar sobre los registros y trabajar con los valores
        foreach ($registros as $registro) {
            $dni = $registro['dni'];
            $idTitulo = $registro['id_titulo'];
            $j1 = $registro['j1'];
            $j2 = $registro['j2'];
            $j3 = $registro['j3'];
            $idMateriaValoracion = $registro['id_materia_valoracion'];
            //$idCondicion = $registro['id_condicion'];
            $id_va = $registro['id_valoracion'];
            //echo $id_va;
            //echo" ";
            $tt = $mat->getNombreMateria($idMateriaValoracion);
            $materia = $tt[0]['nombre_materia'];
            
            $t = $tit->getDatosByCodigo($idTitulo);
            $titulo_det = $t[0]['detalle_titulo'];

            $fecha = $registro['fecha_alta'];
            // Formatear la fecha
            $fechaFormateada = date('d-m-Y', strtotime($fecha));

            $fecha2 = $registro['fecha_modifica'];
            // Formatear la fecha
            $fechaFormateada2 = date('d-m-Y', strtotime($fecha));
            
            //PASOS PARA ARMAR EL PUNTAJE
            $suma = 0;
             //PUNTAJE OTROS TITULOS
             $val_otros_t = new ValoracionOtrosTitulosModel();
             $datosTabla9 = $val_otros_t ->getCodigoById_valoracion($id_va);//ACÁ PUEDE TRAER VARIOS
             $otros_t = new OtrosTitulosModel();
             // Recorrer el array de códigos y obtener los puntajes del modelo TitulosPostgradoModel
             foreach ($datosTabla9 as $t) {
                 $otros_titulo = $otros_t->find($t['id_otros_titulos']); // Suponiendo que el método find busca por la clave primaria
                 $tot3 = $otros_titulo['puntaje'];
                 $suma = $suma + $tot3;
             }

            //PUNTAJE POSTGRADO
            $val = $valpos->getCodigoById_valoracion($id_va);
            //$suma = 0;
            foreach($val as $vv) {
                $valor = $vv['id_titulo_postgrado'];
                $puntaje = $Titulopostgrado->getCodigoByPuntaje($valor);
                $suma=$suma + $puntaje[0]['puntaje']; 
            }

            //PUNTAJE ANTECEDENTES DOCENTES-ANTIGUEDAD            
            $datosTabla5 = $antDoc->getDatosById_ant_doc($id_va);//ACÁ PUEDE TRAER VARIOS
            $do = new DetalleAntDocModel();
            foreach ($datosTabla5 as $dc) {
               $detalle_do = $do->find($dc['id_detalle_doc']); // Suponiendo que el método find busca por la clave primaria
               $tot2 = $dc['cantidad'] * $detalle_do['puntaje'];//CALCULA EL PUNTAJE FINAL EN BASE A LA CANTIDAD DE AÑOS
               $suma = $suma + $tot2;
            }

            //PUNTAJE FORMACIÓN RECIBIDA
            $datos_capacitacion = $cap->getCodigoById_detallae_cap($id_va);
            $ca = new DetalleCapacitacionModel();
            foreach ($datos_capacitacion as $c) {
                $capacitacion = $ca->find($c['id_detalle_capacitacion']);
                //$suma = $suma + $capacitacion['puntaje'];

                $fechaGuardada = Time::parse($c['fecha']); //CONVIERTO LA FECHA EN UN OBJETO TIME
                $diferencia = $fechaGuardada->difference($fechaActual);
                $diferenciaAnios = $diferencia->getYears();
                $diferenciaMeses = $diferencia->getMonths();
                $diferenciaDias = $diferencia->getDays();//CALCULAR LA DIFERENCIA DE AÑOS
                if ($diferenciaAnios < 5 || ($diferenciaAnios == 5 && $diferenciaMeses == 0 && $diferenciaDias == 0)) {
                  
                    $suma = $suma + $capacitacion['puntaje'];
                    //echo"entro por el si";
                }
                
            }

            //PUNTAJE FORMACIÓN OFRECIDA
            $f_o = new FormacionOfrecidaModel();
            $datosTabla_f_o = $f_o->getCodigoById_formacion_ofrecida($id_va);//ACÁ PUEDE TRAER VARIOS
            $detalle_for = new DetalleFormacionOfrecidaModel();
            // Recorrer el array de códigos y obtener los puntajes del modelo TitulosPostgradoModel
            foreach ($datosTabla_f_o as $t) {
                $otra_for = $detalle_for->find($t['id_formacion_ofrecida']); // Suponiendo que el método find busca por la clave primaria
                $tot4 = $otra_for['puntaje'];
                $suma = $suma + $tot4;
            }

            //PUNTAJE INVESTIGACIÓN
            $inv = new InvestigacionModel();
            $datosTabla_inv = $inv->getCodigoById_detallae_inv($id_va);//ACÁ PUEDE TRAER VARIOS
            $detalle_inv = new DetalleInvestigacionModel();
            // Recorrer el array de códigos y obtener los puntajes del modelo TitulosPostgradoModel
            foreach ($datosTabla_inv as $t) {
                $otra_inv = $detalle_inv->find($t['id_detalle_investigacion']); // Suponiendo que el método find busca por la clave primaria
                $tot5 = $otra_inv['puntaje'];
                $suma = $suma + $tot5;
            }

             //PUNTAJE OTROS ANTECEDENTES DOCENTES
             $oa = new OtrosAntecedentesDocModel();
             $datosTabla_oa = $oa->getDatosById_otros_ant($id_va);//ACÁ PUEDE TRAER VARIOS
             $detalle_oa = new DetalleOtrosAntDocModel();
             // Recorrer el array de códigos y obtener los puntajes del modelo TitulosPostgradoModel
             foreach ($datosTabla_oa as $t) {
                 $otra_oa = $detalle_oa->find($t['id_detalle_otros_ant']); // Suponiendo que el método find busca por la clave primaria
                 $tot6 = $otra_oa['puntaje'];
                 $suma = $suma + $tot6;
             }

            //PUNTAJE DE ANTECEDENTES LABORALES
            $datosTabla4 = $antLab->getDatosById_detalle_lab($id_va);//ACÁ PUEDE TRAER 
            $dl = new DetalleAntLabModel();
            foreach ($datosTabla4 as $de) {
               $detalle_la = $dl->find($de['id_detalle_lab']); // Suponiendo que el método find busca por la clave primaria
               $tot7 = $de['cantidad'] * $detalle_la['puntaje'];//CALCULA EL PUNTAJE FINAL EN BASE A LA CANTIDAD DE AÑOS
               $suma = $suma + $tot7;
            }

            //PUNTAJE DEL TÍTULO DE BASE
            $datosTabla2 = $tit->getDatosByCodigo($idTitulo);//ACÁ TRAE UN DATO
            $vv = $datosTabla2[0]['detalle_titulo']; 
            $vv2 = $datosTabla2[0]['puntaje']; 
        
            $suma = $suma + $vv2;

            //ARMO UN ARREGLO CON TODOS LOS DATOS QUE NECESITO MOSTRAR
          
            $titulo[] = [
                'dni' => $dni,
                'titulo_det' => $titulo_det,
                'j1' => $j1,
                'j2' => $j2,
                'j3' => $j3,
                'materia' => $materia,
                'condicion' => $materia,
                'puntaje' => $suma,
                'fecha_alta' => $fechaFormateada,
                'fecha_modifica' => $fechaFormateada2,

            ];
      
            usort($titulo, function($a, $b) {
                // Definimos las prioridades en el orden correcto
                $prioridades = [
                    'Docente' => 1,
                    'Habilitante' => 2,
                    'Supletorio' => 3
                ];
            
                // Normalizamos los títulos eliminando espacios en blanco
                $tituloA = trim($a['titulo_det']);
                $tituloB = trim($b['titulo_det']);
            
                // Asignamos prioridades según el título
                $prioridadA = $prioridades[$tituloA] ?? PHP_INT_MAX;
                $prioridadB = $prioridades[$tituloB] ?? PHP_INT_MAX;
            
                // Primero ordenamos por prioridad del título
                if ($prioridadA !== $prioridadB) {
                    return $prioridadA - $prioridadB; // Menor prioridad va primero
                }
            
                // Si tienen la misma prioridad, ordenamos por puntaje (de mayor a menor)
                return $b['puntaje'] - $a['puntaje']; // Orden descendente por puntaje
        });
          
        } 
       
        //PASAMOS LOS DATOS A LA VISTA  
        return view('mostrarTodasValoraciones', ['datosTabla1' => $titulo,]);
        
    }

   

}

