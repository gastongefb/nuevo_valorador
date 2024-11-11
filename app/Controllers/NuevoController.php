<?php

namespace App\Controllers;

use App\Models\TitulosPostgradoModel;
use App\Models\OtrosTitulosModel;
use App\Models\CapacitacionModel;
use App\Models\ValoracionPostgradoModel;
use App\Models\ValoracionOtrosTitulosModel;
use App\Models\FormacionOfrecidaModel;
use App\Models\InvestigacionModel;

use App\Models\ValidacionModel;
use App\Models\MateriasModel;
use App\Models\TitulosModel;
use App\Models\DocenteModel;

use App\Models\AntecedentesDocModel;
use App\Models\AntecedentesLabModel;
use App\Models\OtrosAntecedentesDocModel;
use App\Models\DetalleAntDocModel;
use App\Models\DetalleCapacitacionModel;
use App\Models\DetalleFormacionOfrecidaModel;
use App\Models\DetalleInvestigacionModel;
use App\Models\DetalleOtrosAntDocModel;
use App\Models\DetalleAntLabModel;

use CodeIgniter\I18n\Time;

class NuevoController extends BaseController
{
    public function cargar_datos()
    {
        // Cargar datos existentes en caso de que ya haya información en la sesión
        $data4 = [
            'datos_titulos' => session()->get('datos_paso1') ?? [],
            'datos_otros_titulos' => session()->get('datos_otros_titulos') ?? [],
            'datos_postgrado' => session()->get('datos_postgrado') ?? [],
            'datos_antiguedad' => session()->get('datos_antiguedad') ?? [],
            'datos_fr' => session()->get('datos_fr') ?? [],
            'datos_fo' => session()->get('datos_fo') ?? [],
            'datos_i' => session()->get('datos_i') ?? [],
            'datos_oa' => session()->get('datos_oa') ?? [],
            'datos_al' => session()->get('datos_al') ?? [],
            
        ];

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

        $sql5 = $db->table('docente');
        //$sql->select('id_carrera,nombre_carrera');
        $query5 = $sql5->get();
        $resultado5 = $query5->getResultArray();

        $data5 = ['titulo'=> 'Listado de docentes', 'docente'=>$resultado5];
        


        //helper('form');
        //return view('cargarValoracion', $data+$data2+$data3);
        //return view('valoracion/cargar_titulo.php', $data+$data2+$data3);

        return view('cargar_datos', $data+$data2+$data3+$data4+$data5);  // Vista con las pestañas
    }

   
      public function guardarT()
      {
          $datos = $this->request->getPost();
  
          // Verificar los datos recibidos (puedes cambiar este proceso de verificación según tus necesidades)
          if (!$this->validarDatosTitulo($datos)) {
              return $this->response->setStatusCode(400, 'Datos de título inválidos');
          }
  
          // Guardar en la sesión
          $datosSesion = session()->get('datos_titulo') ?? [];
          $datosSesion = array_merge($datosSesion, $datos);
          session()->set('datos_titulo', $datosSesion);
  
          return $this->response->setStatusCode(200, 'Datos de título guardados');
      }
  
      // Función para guardar datos de otros títulos en la sesión
      public function guardarOT()
      {
          $datos = $this->request->getPost();
  
          // Verificar los datos recibidos
          if (!$this->validarDatosOtrosTitulos($datos)) {
              return $this->response->setStatusCode(400, 'Datos de otros títulos inválidos');
          }
  
          // Guardar en la sesión
          $datosSesion = session()->get('datos_otros_titulos') ?? [];
          $datosSesion = array_merge($datosSesion, $datos);
          session()->set('datos_otros_titulos', $datosSesion);
  
          return $this->response->setStatusCode(200, 'Datos de otros títulos guardados');
      }
  
      // Función para guardar datos de posgrado en la sesión
      public function guardarP()
      {
          $datos = $this->request->getPost();
  
          // Verificar los datos recibidos
          if (!$this->validarDatosPostgrado($datos)) {
              return $this->response->setStatusCode(400, 'Datos de posgrado inválidos');
          }
  
          // Guardar en la sesión
          $datosSesion = session()->get('datos_postgrado') ?? [];
          $datosSesion = array_merge($datosSesion, $datos);
          session()->set('datos_postgrado', $datosSesion);
  
          return $this->response->setStatusCode(200, 'Datos de posgrado guardados');
      }

      public function guardarA()
      {
          $datos = $this->request->getPost();
  
          // Verificar los datos recibidos
          if (!$this->validarDatosAntiguedad($datos)) {
              return $this->response->setStatusCode(400, 'Datos de antiguedad inválidos');
          }
  
          // Guardar en la sesión
          $datosSesion = session()->get('datos_antiguedad') ?? [];
          $datosSesion = array_merge($datosSesion, $datos);
          session()->set('datos_antiguedad', $datosSesion);
  
          return $this->response->setStatusCode(200, 'Datos de antiguedad guardados');
      }

      public function guardarFR()
      {
          $datos = $this->request->getPost();
  
          // Verificar los datos recibidos
          if (!$this->validarDatosFormacionRecibida($datos)) {
              return $this->response->setStatusCode(400, 'Datos de formación recibida inválidos');
          }
  
          // Guardar en la sesión
          $datosSesion = session()->get('datos_fr') ?? [];
          $datosSesion = array_merge($datosSesion, $datos);
          session()->set('datos_fr', $datosSesion);
  
          return $this->response->setStatusCode(200, 'Datos de formación recibida guardados');
      }

      public function guardarFO()
      {
          $datos = $this->request->getPost();
  
          // Verificar los datos recibidos
          if (!$this->validarDatosFormacionOfrecida($datos)) {
              return $this->response->setStatusCode(400, 'Datos de formación ofrecida inválidos');
          }
  
          // Guardar en la sesión
          $datosSesion = session()->get('datos_fo') ?? [];
          $datosSesion = array_merge($datosSesion, $datos);
          session()->set('datos_fo', $datosSesion);
  
          return $this->response->setStatusCode(200, 'Datos de formación ofrecida guardados');
      }

      public function guardarI()
      {
          $datos = $this->request->getPost();
  
          // Verificar los datos recibidos
          if (!$this->validarDatosInvestigacion($datos)) {
              return $this->response->setStatusCode(400, 'Datos de investigacion inválidos');
          }
  
          // Guardar en la sesión
          $datosSesion = session()->get('datos_i') ?? [];
          $datosSesion = array_merge($datosSesion, $datos);
          session()->set('datos_i', $datosSesion);
  
          return $this->response->setStatusCode(200, 'Datos de investigacion guardados');
      }

      public function guardarOA()
      {
          $datos = $this->request->getPost();
  
          // Verificar los datos recibidos
          if (!$this->validarDatosOtrosAntecedentes($datos)) {
              return $this->response->setStatusCode(400, 'Datos de otros antecedentes inválidos');
          }
  
          // Guardar en la sesión
          $datosSesion = session()->get('datos_oa') ?? [];
          $datosSesion = array_merge($datosSesion, $datos);
          session()->set('datos_oa', $datosSesion);
  
          return $this->response->setStatusCode(200, 'Datos de otros antecedentes guardados');
      }

      public function guardarAL()
      {
          $datos = $this->request->getPost();
  
          // Verificar los datos recibidos
          if (!$this->validarDatosAntecedentesLaborales($datos)) {
              return $this->response->setStatusCode(400, 'Datos de antecedentes laborales inválidos');
          }
  
          // Guardar en la sesión
          $datosSesion = session()->get('datos_al') ?? [];
          $datosSesion = array_merge($datosSesion, $datos);
          session()->set('datos_al', $datosSesion);
  
          return $this->response->setStatusCode(200, 'Datos de antecedentes laborales guardados');
      }
  
  
   
    public function guardarDatosFinales()
{
    
    // Obtener todos los datos de la sesión
    $datosTitulo = session()->get('datos_titulo');
    $datosOtrosTitulos = session()->get('datos_otros_titulos');
    $datosPostgrado = session()->get('datos_postgrado');
    $datosAntiguedad = session()->get('datos_antiguedad');
    $datosFormacionRecibida = session()->get('datos_fr');
    $datosFormacionOfrecida = session()->get('datos_fo');
    $datosInvestigacion = session()->get('datos_i');
    $datosOtrosAntecedentes = session()->get('datos_oa');
    $datosAntecedentesLaborales = session()->get('datos_al');

    // Verificar si los datos requeridos existen en la sesión
    if (empty($datosTitulo)) {
        return $this->response->setStatusCode(400, 'No hay datos de título para guardar.');
    }

    // Guardar los datos en la base de datos
    try {
        // Modelo de validación
        $modelValidacion = new \App\Models\ValidacionModel();
        // Insertar los datos en la tabla validacion
        $modelValidacion->insert($datosTitulo);
        // Obtener el último id_valoracion insertado
        $id_valoracion = $modelValidacion->getInsertID();

        // Modelo de otros títulos
        $modelOtrosTitulos = new \App\Models\ValoracionOtrosTitulosModel();
        // Modelo de postgrado
        $modelPostgrado = new \App\Models\ValoracionPostgradoModel();
        // Modelo de Antecedentes Docentes (Antiguedad)AntecedentesDocModel
        $modelAntiguedad = new \App\Models\AntecedentesDocModel();
        // Modelo de Capacitacion(Formación Recibida) CapacitacionModel 
        $modelFormacionRecibida = new \App\Models\CapacitacionModel();
        // Modelo de (Formación Ofrecida) FormacionOfrecidaModel 
        $modelFormacionOfrecida = new \App\Models\FormacionOfrecidaModel();
        // Modelo Investigacion
        $modelInvestigacion = new \App\Models\InvestigacionModel();
        // Modelo Otros Antecedentes
        $modelOtrosAntecedentes = new \App\Models\OtrosAntecedentesDocModel();
         // Modelo Antecedentes Laborales
         $modelAntecedentesLaborales = new \App\Models\AntecedentesLabModel();


        // Solo insertar otros títulos si hay datos
        if (!empty($datosOtrosTitulos) && !empty($datosOtrosTitulos['persons7'])) {
            foreach ($datosOtrosTitulos['persons7'] as $otrosTitulo) {
                if (is_array($otrosTitulo) && !empty($otrosTitulo['detalle_otros_titulos'])) {
                    $otrosTitulo['id_valoracion'] = $id_valoracion; // Agregar id_valoracion
                    $modelOtrosTitulos->insert($otrosTitulo);
                }
            }
        }

        // Solo insertar postgrado si hay datos
        if (!empty($datosPostgrado) && !empty($datosPostgrado['persons'])) {
            foreach ($datosPostgrado['persons'] as $postgrado) {
                if (is_array($postgrado) && !empty($postgrado['detalle_valoracion_postgrado'])) {
                    $postgrado['id_valoracion'] = $id_valoracion; // Agregar id_valoracion
                    $modelPostgrado->insert($postgrado);
                }
            }
        }

        // Solo insertar antecedentes docentes(antiguedad) si hay datos
        if (!empty($datosAntiguedad) && !empty($datosAntiguedad['persons3'])) {
            foreach ($datosAntiguedad['persons3'] as $antiguedad) {
                if (is_array($antiguedad) && !empty($antiguedad['detalle_ant_doc'])) {
                    $antiguedad['id_valoracion'] = $id_valoracion; // Agregar id_valoracion
                    $modelAntiguedad->insert($antiguedad);
                }
            }
        }

        // Solo insertar formación recibida(capacitación) si hay datos
        if (!empty($datosFormacionRecibida) && !empty($datosFormacionRecibida['persons4'])) {
            foreach ($datosFormacionRecibida['persons4'] as $fr) {
                if (is_array($fr) && !empty($fr['detalle_capacitacion'])) {
                    $fr['id_valoracion'] = $id_valoracion; // Agregar id_valoracion
                    $modelFormacionRecibida->insert($fr);
                }
            }
        }

        // Solo insertar formación ofrecida(formación ofrecida) si hay datos
        if (!empty($datosFormacionOfrecida) && !empty($datosFormacionOfrecida['persons5'])) {
            foreach ($datosFormacionOfrecida['persons5'] as $fo) {
                if (is_array($fo) && !empty($fo['detalle_formacion'])) {
                    $fo['id_valoracion'] = $id_valoracion; // Agregar id_valoracion
                    $modelFormacionOfrecida->insert($fo);
                }
            }
        }

          // Solo insertar investigacion si hay datos
          if (!empty($datosInvestigacion) && !empty($datosInvestigacion['persons6'])) {
            foreach ($datosInvestigacion['persons6'] as $i) {
                if (is_array($i) && !empty($i['detalle_investigacion'])) {
                    $i['id_valoracion'] = $id_valoracion; // Agregar id_valoracion
                    $modelInvestigacion->insert($i);
                }
            }
        }
        
          // Solo insertar otros antecedentes si hay datos
          if (!empty($datosOtrosAntecedentes) && !empty($datosOtrosAntecedentes['persons8'])) {
            foreach ($datosOtrosAntecedentes['persons8'] as $oa) {
                if (is_array($oa) && !empty($oa['detalle_otros_ant_doc'])) {
                    $oa['id_valoracion'] = $id_valoracion; // Agregar id_valoracion
                    $modelOtrosAntecedentes->insert($oa);
                }
            }
        }

        // Solo insertar antecedentes laborales
        if (!empty($datosAntecedentesLaborales) && !empty($datosAntecedentesLaborales['persons9'])) {
            foreach ($datosAntecedentesLaborales['persons9'] as $al) {
                if (is_array($al) && !empty($al['detalle_ant_lab'])) {
                    $al['id_valoracion'] = $id_valoracion; // Agregar id_valoracion
                    $modelAntecedentesLaborales->insert($al);
                }
            }
        }

        // Limpiar la sesión después de guardar los datos
        session()->remove(['datos_titulo', 'datos_otros_titulos', 'datos_postgrado','datos_antiguedad','datos_fr','datos_fo','datos_i','datos_oa','datos_al']);

        return $this->response->setStatusCode(200, 'Datos guardados exitosamente');
        //return view('cargar_datos');
    } catch (\Exception $e) {
        return $this->response->setStatusCode(500, 'Error al guardar los datos: ' . $e->getMessage());
    }
}
    // Funciones de validación (puedes personalizarlas según tu lógica de validación)
    private function validarDatosTitulo($datos)
    {
        // Lógica de validación de datos de título
        return true; // Cambia esto según tus necesidades
    }

    private function validarDatosOtrosTitulos($datos)
    {
        // Lógica de validación de datos de otros títulos
        return true; // Cambia esto según tus necesidades
    }

    private function validarDatosPostgrado($datos)
    {
        // Lógica de validación de datos de posgrado
        return true; // Cambia esto según tus necesidades
    }

    private function validarDatosAntiguedad($datos)
    {
        // Lógica de validación de datos de posgrado
        return true; // Cambia esto según tus necesidades
    }

    private function validarDatosFormacionRecibida($datos)
    {
        return true;
    }
    private function validarDatosFormacionOfrecida($datos)
    {
        return true;
    }

    private function validarDatosInvestigacion($datos)
    {
        return true;
    }
    
    private function validarDatosOtrosAntecedentes($datos)
    {
        return true;
    }

    private function validarDatosAntecedentesLaborales($datos)
    {
        return true;
    }


    public function mostrar_valoraciones_porDocente_porMateria1()
    {
        $db = \Config\Database::connect();


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

        $sql5 = $db->table('docente');
        //$sql->select('id_carrera,nombre_carrera');
        $query5 = $sql5->get();
        $resultado5 = $query5->getResultArray();

        $data5 = ['titulo'=> 'Listado de docentes', 'docente'=>$resultado5];
        


        //helper('form');
        //return view('cargarValoracion', $data+$data2+$data3);
        //return view('valoracion/cargar_titulo.php', $data+$data2+$data3);

        return view('mostrar_valoraciones_porDocente_porMateria2', $data2+$data3+$data5); 
      
    }

    public function mostrar_valoraciones_porDocente_porMateria3()
    {
            $db = \Config\Database::connect();

            $dni = $this->request->getPost('dni');
            $materia = $this->request->getPost('materia');

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
        //$registros = $validacionModel->findAll();

       //echo $dni;
       //echo $materia;
        $registros = $validacionModel->getValoracionDniMateria($dni,$materia);

        //print_r($registros);

        
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

            //PUNTAJE DE TÍTULOS POSTGRADO    
            //$valPos = new ValoracionPostgradoModel();
            $datosTabla1 = $valpos ->getCodigoById_valoracion($id_va);//ACÁ PUEDE TRAER VARIOS
            $tit = new TitulosPostgradoModel();
            // Recorrer el array de códigos y obtener los puntajes del modelo TitulosPostgradoModel
            foreach ($datosTabla1 as $t) {
            $titulo = $tit->find($t['id_titulo_postgrado']); // Suponiendo que el método find busca por la clave primaria
              if ($titulo) {
                  $puntajes[] = [
                    'detalle' => $t['detalle_valoracion_postgrado'],
                    'puntaje' => $titulo['puntaje']
                  ];
              }
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

            
             /*      
            //PUNTAJE DEL TÍTULO DE BASE
            $datosTabla2 = $tit->getDatosByCodigo($idTitulo);//ACÁ TRAE UN DATO
            $vv = $datosTabla2[0]['detalle_titulo']; 
            $vv2 = $datosTabla2[0]['puntaje']; 
        
            $suma = $suma + $vv2;
            */


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

            ];
        /* 
             // Ordenar por sexo y luego por edad
            usort($titulo, function($a, $b) {
            if ($a['titulo_det'] === $b['titulo_det']) {
                return $b['puntaje'] - $a['puntaje'];
            }
            return ($a['titulo_det'] === 'Docente') ? -1 : 1;
        });
        */
        usort($titulo, function($a, $b) {
            // Asignamos una prioridad a cada tipo de `titulo_det`.
            $prioridades = [
                'Docente' => 1,
                'Supletorio' => 2,
                'Habilitante' => 3
            ];
        
            // Comparamos primero por la prioridad de `titulo_det`.
            $prioridadA = $prioridades[$a['titulo_det']] ?? PHP_INT_MAX;
            $prioridadB = $prioridades[$b['titulo_det']] ?? PHP_INT_MAX;
        
            if ($prioridadA === $prioridadB) {
                // Si tienen la misma prioridad, ordenamos por `puntaje` de mayor a menor.
                return $b['puntaje'] - $a['puntaje'];
            }
            
            // Ordenamos por prioridad (menor prioridad primero).
            return $prioridadA - $prioridadB;
        });
          
        } 
       
        //PASAMOS LOS DATOS A LA VISTA  
        //return view('mostrarValoraciones', ['datosTabla1' => $titulo,]);
        

        return view('mostrar_valoraciones_porDocente_porMateria4', [
            'datosTabla1' => $titulo,
            'datosTabla2' => $puntajes,

        ]);
         /*
        
     */  

    }
    
}    

