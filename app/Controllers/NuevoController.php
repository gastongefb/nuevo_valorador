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

use App\Models\ValoracionActualizacionModel;
use App\Models\ActualizacionOtrosTitulosModel;
use App\Models\ActualizacionDocenteModel;
use App\Models\ActualizacionPostgradoModel;
use App\Models\ActualizacionAntDocModel;
use App\Models\ActualizacionCapacitacionModel;
use App\Models\ActualizacionFormacionOfrecidaModel;
use App\Models\ActualizacionInvModel;
use App\Models\ActualizacionOtrosAntModel;
use App\Models\ActualizacionAntLabModel;

use CodeIgniter\Email\Email;

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

        //return $this->response->setStatusCode(200, 'Datos guardados exitosamente');

        $email = \Config\Services::email();
        $xc = $datosTitulo["dni"];
        $doc = new \App\Models\DocenteModel();
        $mail = $doc->getMail($xc);
        $xxx = $mail[0]["email"];
      
        $email->setFrom('valoracionisft@gmail.com', 'ISFT');
        $email->setTo($xxx);
        $email->setSubject("Valoración de antecedentes");
        $email->setMessage("Le enviamos este mail para notificarle que se ah efectuado una valoración sobre su carpeta de antecedentes");  
        
        if ($email->send()) {
            echo('Correo enviado correctamente.');
        } else {
            echo('Error al enviar el correo.');
        }
        

        return  redirect()->to(base_url('cargar_datos').'');

        
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

            $titu = new TitulosModel();

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
            
            //$t = $tit->getDatosByCodigo($idTitulo);
            //$titulo_det = $t[0]['detalle_titulo'];

            
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

            //ARREGLO PARA PODER OBTENER EL DETALLE OTROS TITULOS(docente de nivel superior,No docente de nivel superior,etc.)  
            $val_otros_t = new ValoracionOtrosTitulosModel();
            $datosTabla99 = $val_otros_t ->getCodigoById_valoracion($id_va);//ACÁ PUEDE TRAER VARIOS
            $otros_t = new OtrosTitulosModel();
            $datosTabla22 = []; 
            foreach ($datosTabla99 as $t) {
                $otros_titulo = $otros_t->find($t['id_otros_titulos']); // Suponiendo que el método find busca por la clave primaria
                  if ($otros_titulo) {
                       $datosTabla22[] = [
                        'id_otros_t' => $t['id_otros_t'],
                        'id_valoracion' => $t['id_valoracion'],
                        'detalle_otros_titulos' => $t['detalle_otros_titulos'],
                        'detalle_titulo' => $otros_titulo['detalle_otros_titulos'],
                        'fecha' => $t['fecha'],
                     ];
                     
                  }
                }

             //print_r($datosTabla9 );

            //PUNTAJE DE OTROS TÍTULOS    
            $val_otros_t = new ValoracionOtrosTitulosModel();
            $datosTabla8 = $val_otros_t ->getCodigoById_valoracion($id_va);//ACÁ PUEDE TRAER VARIOS
            $otros_t = new OtrosTitulosModel();
            // Recorrer el array de códigos y obtener los puntajes del modelo TitulosPostgradoModel
            foreach ($datosTabla8 as $t) {
            $otros_titulo = $otros_t->find($t['id_otros_titulos']); // Suponiendo que el método find busca por la clave primaria
              if ($otros_titulo) {
                    $puntajes8[] = [
                    'id_otros_titulos' => $t['id_otros_titulos'],
                    'detalle' => $t['detalle_otros_titulos'],
                    'puntaje' => $otros_titulo['puntaje'],
                    'fecha' => $t['fecha'],
                 ];
                 
              }
            }
            
            //print_r($puntajes8);
            
            //PUNTAJE DE TÍTULOS POSTGRADO    
            //$valPos = new ValoracionPostgradoModel();
            $datosTablap = $valpos->getCodigoById_valoracion($id_va);//ACÁ PUEDE TRAER VARIOS
            $tit = new TitulosPostgradoModel();
            // Recorrer el array de códigos y obtener los puntajes del modelo TitulosPostgradoModel
            //print_r($datosTabla1);
            foreach ($datosTablap as $t) {
            $titulo = $tit->find($t['id_titulo_postgrado']); // Suponiendo que el método find busca por la clave primaria
              if ($titulo) {
                  $puntajes[] = [
                    'detalle' => $t['detalle_valoracion_postgrado'],
                    'puntaje' => $titulo['puntaje'],
                    'fecha' => $t['fecha'],
                  ];
              }
            }

            $datosTablapp = $valpos->getCodigoById_valoracion($id_va);//ACÁ PUEDE TRAER VARIOS
            $tit = new TitulosPostgradoModel();
            // Recorrer el array de códigos y obtener los puntajes del modelo TitulosPostgradoModel
            //print_r($datosTabla1);
            $datosTabla33 = []; 
            foreach ($datosTablapp as $t) {
            $titulo = $tit->find($t['id_titulo_postgrado']); // Suponiendo que el método find busca por la clave primaria
              if ($titulo) {
                  $datosTabla33[] = [
                    'id_postgrado' => $t['id_postgrado'],
                    'id_valoracion' => $t['id_valoracion'],
                    'detalle_valoracion_postgrado' => $t['detalle_valoracion_postgrado'],
                    'detalle_postgrado' => $titulo['detalle_postgrado'],
                    'fecha' => $t['fecha'],
                  ];
              }
            }

            //print_r($datosTablap);

            //PUNTAJE ANTECEDENTES DOCENTES-ANTIGUEDAD            
            $datosTabla5 = $antDoc->getDatosById_ant_doc($id_va);//ACÁ PUEDE TRAER VARIOS
            $do = new DetalleAntDocModel();
            foreach ($datosTabla5 as $dc) {
               $detalle_do = $do->find($dc['id_detalle_doc']); // Suponiendo que el método find busca por la clave primaria
               $tot2 = $dc['cantidad'] * $detalle_do['puntaje'];//CALCULA EL PUNTAJE FINAL EN BASE A LA CANTIDAD DE AÑOS
               $suma = $suma + $tot2;
            }
            
            $datosTabla5 =  $antDoc->getDatosById_ant_doc($id_va);//ACÁ PUEDE TRAER VARIOS
            $do = new DetalleAntDocModel();
            $datosTabla44 = []; 
            foreach ($datosTabla5 as $dc) {
            $detalle_do = $do->find($dc['id_detalle_doc']); // Suponiendo que el método find busca por la clave primaria
              if ($detalle_do) {
                  $datosTabla44[] = [
                    'id_ant_doc' => $dc['id_ant_doc'],
                    'id_valoracion' => $dc['id_valoracion'],
                    'detalle_ant_doc' => $dc['detalle_ant_doc'],
                    'detalle_antecedente_doc' => $detalle_do['detalle_ant_doc'],
                    'cantidad' => $dc['cantidad'],
                  ];
              }
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
             
            //CALCULO DE DATOS PARA MOSTRAR DETALLES - CAPACITACIÓN
            $datosCap =  $cap->getCodigoById_detallae_cap($id_va);
            $ca = new DetalleCapacitacionModel();
            $datosTabla55 = []; 
            foreach ($datosCap as $dca) {
            $detalle_cap = $ca->find($dca['id_detalle_capacitacion']); // Suponiendo que el método find busca por la clave primaria
              if ($detalle_cap) {
                  $datosTabla55[] = [
                    'id_capacitacion' => $dca['id_capacitacion'],
                    'id_valoracion' => $dca['id_valoracion'],
                    'detalle_capacitacion' => $dca['detalle_capacitacion'],
                    'detalle' => $detalle_cap['detalle'],
                    'fecha' => $dca['fecha'],
                  ];
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
            
            //CALCULO DE DATOS PARA MOSTRAR DETALLES - FORMACIÓN OFRECIDA
            $f_o = new FormacionOfrecidaModel();
            $datosTabla_f_o = $f_o->getCodigoById_formacion_ofrecida($id_va);//ACÁ PUEDE TRAER VARIOS
            $detalle_for = new DetalleFormacionOfrecidaModel();
            // Recorrer el array de códigos y obtener los puntajes del modelo TitulosPostgradoModel
            $datosTabla66 = []; 
            foreach ($datosTabla_f_o as $dfo) {
                $detalle_fo = $detalle_for->find($dfo['id_formacion_ofrecida']); // Suponiendo que el método find busca por la clave primaria
                  if ($detalle_fo) {
                      $datosTabla66[] = [
                        'id_formacion' => $dfo['id_formacion'],
                        'id_valoracion' => $dfo['id_valoracion'],
                        'detalle_formacion' => $dfo['detalle_formacion'],
                        'detalle' => $detalle_fo['detalle'],
                        'fecha' => $dfo['fecha'],
                      ];
                  }
                  
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

            //CALCULO DE DATOS PARA MOSTRAR DETALLES - INVESTIGACIÓN
            $inv = new InvestigacionModel();
            $datosTabla_inv = $inv->getCodigoById_detallae_inv($id_va);//ACÁ PUEDE TRAER VARIOS
            $detalle_inv = new DetalleInvestigacionModel();
            // Recorrer el array de códigos y obtener los puntajes del modelo TitulosPostgradoModel
            $datosTabla77 = []; 
            foreach ($datosTabla_inv as $t) {
                $detalle_i = $detalle_inv->find($t['id_detalle_investigacion']); // Suponiendo que el método find busca por la clave primaria
                if ($detalle_i) {
                    $datosTabla77[] = [
                      'id_investigacion' => $t['id_investigacion'],
                      'id_valoracion' => $t['id_valoracion'],
                      'detalle_investigacion' => $t['detalle_investigacion'],
                      'detalle' => $detalle_i['detalle'],
                      'fecha' => $t['fecha'],
                    ];
                }
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
             
             //CALCULO DE DATOS PARA MOSTRAR DETALLES - OTROS ANTECEDENTES
             $oa = new OtrosAntecedentesDocModel();
             $datosTabla_oa = $oa->getDatosById_otros_ant($id_va);//ACÁ PUEDE TRAER VARIOS
             $detalle_oa = new DetalleOtrosAntDocModel();
             // Recorrer el array de códigos y obtener los puntajes del modelo TitulosPostgradoModel
             $datosTabla88 = []; 
             foreach ($datosTabla_oa as $t) {
                 $otra_oa = $detalle_oa->find($t['id_detalle_otros_ant']); // Suponiendo que el método find busca por la clave primaria
                 if ($otra_oa) {
                    $datosTabla88[] = [
                      'id_detalle_ant' => $t['id_detalle_ant'],
                      'id_valoracion' => $t['id_valoracion'],
                      'detalle_otros_ant_doc' => $t['detalle_otros_ant_doc'],
                      'detalle' => $otra_oa['detalle_otros_ant'],
                      'fecha' => $t['fecha'],
                    ];
                }
             } 
            


            //PUNTAJE DE ANTECEDENTES LABORALES
            $datosTabla4 = $antLab->getDatosById_detalle_lab($id_va);//ACÁ PUEDE TRAER 
            $dl = new DetalleAntLabModel();
            foreach ($datosTabla4 as $de) {
               $detalle_la = $dl->find($de['id_detalle_lab']); // Suponiendo que el método find busca por la clave primaria
               $tot7 = $de['cantidad'] * $detalle_la['puntaje'];//CALCULA EL PUNTAJE FINAL EN BASE A LA CANTIDAD DE AÑOS
               $suma = $suma + $tot7;
            }
            
            $datosTabla4 = $antLab->getDatosById_detalle_lab($id_va);//ACÁ PUEDE TRAER 
            $dl = new DetalleAntLabModel();
            $datosTabla99 = []; 
            foreach ($datosTabla4 as $de) {
                $otra_al = $dl->find($de['id_detalle_lab']); // Suponiendo que el método find busca por la clave primaria
                if ($otra_al) {
                   $datosTabla99[] = [
                     'id_ant_lab' => $de['id_ant_lab'],
                     'id_valoracion' => $de['id_valoracion'],
                     'detalle_ant_lab' => $de['detalle_ant_lab'],
                     'detalle' => $otra_al['detalle_ant_lab'],
                     'cantidad' => $de['cantidad'],
                   ];
               }
            }
            
            
             /*      
            //PUNTAJE DEL TÍTULO DE BASE
            $datosTabla2 = $tit->getDatosByCodigo($idTitulo);//ACÁ TRAE UN DATO
            $vv = $datosTabla2[0]['detalle_titulo']; 
            $vv2 = $datosTabla2[0]['puntaje']; 
        
            $suma = $suma + $vv2;
            */
            
            $do = $doc->getDatosDocentes($dni);
            $n = $do[0]['nombre'];
            $a = $do[0]['apellido'];
           
            $ti2 = $titu->getDatosTitulos($idTitulo);
            $titulo = $ti2[0]['detalle_titulo'];

            //ARMO UN ARREGLO CON TODOS LOS DATOS QUE NECESITO MOSTRAR
          
            $titulo15[] = [
                'id_valoracion' => $id_va,
                'dni' => $dni,
                'titulo' => $titulo,
                'j1' => $j1,
                'j2' => $j2,
                'j3' => $j3,
                'materia' => $materia,
                'condicion' => $materia,
                'puntaje' => $suma,
                'nombre' => $n,
                'apellido' => $a,
                //'titulo' => $titulo,

            ];
      
        
        } 
            
          return view('data_view3', [
            'datosTabla1' => $titulo15,
            'datosTabla2' => $datosTabla22,
            'datosTabla3' => $datosTabla33,
            'datosTabla4' => $datosTabla44,
            'datosTabla5' => $datosTabla55,
            'datosTabla6' => $datosTabla66,
            'datosTabla7' => $datosTabla77,
            'datosTabla8' => $datosTabla88,
            'datosTabla9' => $datosTabla99,
            //'datosTabla10' => $puntajes88,

        ]);
        
        

    }

    public function actualizarValoracion()
    {
        // Verifica si la solicitud es de tipo POST
        if ($this->request->getMethod() === 'post') {
            // Obtén los datos enviados desde el formulario
            $va = $this->request->getPost('id_va');
            $dni = $this->request->getPost('dni');
            $titulo_det = $this->request->getPost('titulo_det');
            $j1 = $this->request->getPost('j1');
            $j2 = $this->request->getPost('j2');
            $j3 = $this->request->getPost('j3');
            $materia = $this->request->getPost('materia');

            // Carga el modelo
            $valoracionModel = new ValidacionModel();

            // Prepara los datos para la actualización
            $data = [
                'dni' => $dni,
                'titulo_det' => $titulo_det,
                'j1' => $j1,
                'j2' => $j2,
                'j3' => $j3,
                'materia' => $materia
            ];

           // Verificar si la actualización fue exitosa
        if ($valoracionModel->updateValoracion($va, $data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Registro actualizado correctamente.']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Hubo un problema al actualizar el registro.']);
        }
    }

    return $this->response->setJSON(['status' => 'error', 'message' => 'Solicitud no válida.']);
    }


    // Función para actualizar los datos de la segunda tabla (otros títulos)
public function actualizarOtrosTitulos()
{
    // Cargar el modelo correspondiente
    $otrosTitulosModel = new ValoracionOtrosTitulosModel();

    // Obtener los datos enviados por el formulario AJAX
    $id_va = $this->request->getPost('id_va');
    $detalle = $this->request->getPost('detalle');
    $fecha = $this->request->getPost('fecha');
    $id_otros = $this->request->getPost('id_otros');
    $id = $this->request->getPost('id'); // Asumiendo que pasas un ID único de la fila

    // Validar los datos antes de actualizar (puedes agregar más validaciones según lo necesario)
    if (!$detalle || !$fecha || !$id_otros || !$id) {
        return $this->response->setJSON(['success' => false, 'message' => 'Todos los campos son obligatorios.']);
    }

    // Crear un array con los datos a actualizar
    $datos = [
        'id_valoracion' => $id_va,
        'detalle_otros_titulos' => $detalle,
        'fecha' => $fecha,
        'id_otros_titulos' => $id_otros
    ];

    // Llamar al modelo para actualizar los datos en la base de datos
    $updateSuccess = $otrosTitulosModel->updateOtrosTitulos($id, $datos);

    // Verificar si la actualización fue exitosa
    if ($updateSuccess) {
        return $this->response->setJSON(['success' => true, 'message' => 'Actualización exitosa']);
    } else {
        return $this->response->setJSON(['success' => false, 'message' => 'Error al actualizar']);
    }
}

    
    
    public function actualizarPosFormacion()
    {
        // Cargar el modelo correspondiente
        $postgrado = new ValoracionPostgradoModel();

        // Obtener los datos enviados por el formulario AJAX
        $id_va = $this->request->getPost('id_va');
        $detalle = $this->request->getPost('detalle');
        $fecha = $this->request->getPost('fecha');
        $id_otros = $this->request->getPost('id_tit');
        //$puntaje = $this->request->getPost('puntaje');
        $id = $this->request->getPost('id'); // Asumiendo que pasas un ID único de la fila

        /*
        //Validar los datos antes de actualizar (puedes agregar más validaciones según lo necesario)
        if (!$detalle || !$fecha || !$puntaje || !$id) {
            return $this->response->setJSON(['error' => 'Todos los campos son obligatorios.']);
        }
        */ 
        // Crear un array con los datos a actualizar
        $datos = [
            'id_valoracion' => $id_va,
            'detalle_valoracion_postgrado' => $detalle,
            'fecha' => $fecha,
            'id_titulo_postgrado' => $id_otros
            ];

        
            
        // Llamar al modelo para actualizar los datos en la base de datos
        $actualizado = $postgrado->updatePostgrado($id, $datos);

        if ($actualizado) {
            // Respuesta positiva
            return $this->response->setJSON(['success' => 'Datos actualizados correctamente.']);
            
        } else {
            // En caso de error
            return $this->response->setJSON(['error' => 'Hubo un problema al actualizar los datos.']);
        }
    }



    public function update2()
    {
        $model = new ValoracionPostgradoModel();
        $id = $this->request->getPost('id');
        $updatedData = [
            'id_valoracion' => $this->request->getPost('id_va'),
            'detalle_valoracion_postgrado' => $this->request->getPost('detalle'),
            'fecha' => $this->request->getPost('fecha'),
            'id_titulo_postgrado' => $this->request->getPost('id_tit'),
        ];

        $model->update($id, $updatedData);

        // Retorna los datos actualizados en formato JSON
        return $this->response->setJSON(['status' => 'success', 'data' => $updatedData]);
    }



    public function updateDynamic()
{
    $table = $this->request->getPost('table');
    $id = $this->request->getPost('id');
    $fields = $this->request->getPost();

    unset($fields['table'], $fields['id']); // Eliminar campos no relevantes

    $model = null;

    if ($table === 'table1') {
        $model = new ValoracionOtrosTitulosModel();
    } elseif ($table === 'table2') {
        $model = new ValoracionPostgradoModel();
    }elseif ($table === 'table3') {
        $model = new AntecedentesDocModel();
    }elseif ($table === 'table4') {
        $model = new CapacitacionModel();
    }elseif ($table === 'table5') {
        $model = new FormacionOfrecidaModel();
    }elseif ($table === 'table6') {
        $model = new InvestigacionModel();
    }elseif ($table === 'table7') {
        $model = new OtrosAntecedentesDocModel();
    }elseif ($table === 'table8') {
        $model = new AntecedentesLabModel();
    }

    if ($model) {
        $model->update($id, $fields);
        return $this->response->setJSON(['status' => 'success', 'data' => $fields]);
    }

    return $this->response->setJSON(['status' => 'error', 'message' => 'Invalid table']);
}


public function deleteRecord()
{
    $table = $this->request->getPost('table');
    $id = $this->request->getPost('id');

    $model = null;

    if ($table === 'table1') {
        $model = new ValoracionOtrosTitulosModel();
    } elseif ($table === 'table2') {
        $model = new ValoracionPostgradoModel();
    }elseif ($table === 'table3') {
        $model = new AntecedentesDocModel();
    }elseif ($table === 'table4') {
        $model = new CapacitacionModel();
    }elseif ($table === 'table5') {
        $model = new FormacionOfrecidaModel();
    }elseif ($table === 'table6') {
        $model = new InvestigacionModel();
    }elseif ($table === 'table7') {
        $model = new OtrosAntecedentesDocModel();
    }elseif ($table === 'table8') {
        $model = new AntecedentesLabModel();
    }

    if ($model && $model->delete($id)) {
        return $this->response->setJSON(['status' => 'success']);
    }

    return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to delete record']);
}


public function agregarRegistro()
    {
        if ($this->request->isAJAX()) {
            $data = $this->request->getPost();
            $model = new ValoracionOtrosTitulosModel();

            // Validar datos
            $validation = \Config\Services::validation();
            $validation->setRules([
                'detalle_otros_titulos' => 'required|max_length[255]',
                'fecha' => 'required|valid_date[Y-m-d]',
                'id_valoracion' => 'required|integer',
            ]);

            if (!$validation->run($data)) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'errors' => $validation->getErrors(),
                ]);
            }

            // Insertar datos en la base de datos
            $model->insert($data);

            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Registro agregado correctamente',
                'registro' => $model->find($model->insertID()), // Retornar el nuevo registro
            ]);
        }

        return $this->response->setStatusCode(400, 'Solicitud no válida');
    }

    public function agregarRegistro2()
    {
        if ($this->request->isAJAX()) {
            $data = $this->request->getPost();
            $model = new ValoracionPostgradoModel();

            
        }

            // Insertar datos en la base de datos
            $model->insert($data);

            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Registro agregado correctamente',
                'registro' => $model->find($model->insertID()), // Retornar el nuevo registro
            ]);
        

        return $this->response->setStatusCode(400, 'Solicitud no válida');
    }


//***************************************************************************************************** */
    //FUNCIONES PARA TITULOS
    public function cargarOtrosTitulos0()
    {
       $TitulosModel = new TitulosModel();
       $Titulos = $TitulosModel->findAll();

       $matModel = new MateriasModel();
       //$Materias = $matModel->findAll();
 

       // Enviar los datos a la vista
       return $this->response->setJSON($Titulos);
    }

    public function cargarMaterias()
    {
      $materiasModel = new MateriasModel();
      $materias = $materiasModel->findAll();
      return $this->response->setJSON($materias);
    }

    public function editRecord0($id)
    {
        
        $modelValoracion = new ValidacionModel();
        $modelActualizacion = new ActualizacionOtrosTitulosModel();
      
        // Obtener los datos del formulario
        $data = $this->request->getPost();
        log_message('debug', 'Datos recibidos en POST: ' . json_encode($data));

        //$matModel = new MateriasModel();
        //$m = $matModel->getNombreMateria2($data['materia']);
        //$mat = $m[0]['id_materia'];
            
        $valoracionData = [
        'dni' => $data['dni'],
        'j1' => $data['j1'],
        'j2' => $data['j2'],
        'j3' => $data['j3'],
        'id_titulo' => $data['titulo'],
        'id_materia_valoracion' => $data['materia'],
        ];

       // Intentar actualizar en valoracion_otros_titulos
       if (!$modelValoracion->update($id, $valoracionData)) {
          return $this->response->setJSON(['status' => 'error', 'message' => 'Error al actualizar el registro en valoracion_otros_titulos']);
         } else {
            return redirect()->to('/cargas_datos');

           }

     
    }


    public function deleteRecord20($id)
    {
        $model = new ValidacionModel();
        if ($model->delete($id)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Registro eliminado exitosamente']);
        }
        return $this->response->setJSON(['status' => 'error', 'message' => 'Error al eliminar el registro']);
    }

  
    
    public function getDetail0($id)
    {
        //$otrosTitulosModel = new ValoracionOtrosTitulosModel();
        //$record = $otrosTitulosModel->find($id);
        
        $mod = new ActualizacionOtrosTitulosModel();
        $rec = $mod->getval($id);
        
       
       
        // Convertir a un arreglo simple
        $simpleArray = [];
        foreach ($rec as $item) {
            foreach ($item as $key => $value) {
                $simpleArray[$key][] = $value;
            }
        }
            

         // convierto array asociativo en array simple
        //$simpleArray = $rec[0];
        //print_r($simpleArray);
        //exit;
        
        if ($simpleArray) {
            return $this->response->setJSON($simpleArray);
        } else {
            log_message('error', "Registro con ID {$id} no encontrado.");
            return $this->response->setJSON(['error' => "Registro con ID {$id} no encontrado."])->setStatusCode(404);
        }
       
    }    

//***************************************************************************************************** */
    //FUNCIONES PARA OTROS TITULOS
    public function cargarOtrosTitulos()
    {
       $otrosTitulosModel = new OtrosTitulosModel();
       $otrosTitulos = $otrosTitulosModel->findAll();
 
       // Enviar los datos a la vista
       return $this->response->setJSON($otrosTitulos);
    }

    public function addRecord()
    {
        //$mm = new ValoracionActualizacionModel();
        $modelValoracion = new ValoracionOtrosTitulosModel();
        $modelActualizacion = new ActualizacionOtrosTitulosModel();

        //obtenemos datos del formulario
        $data = $this->request->getPost();
       
    $valoracionData = [
        'detalle_otros_titulos' => $data['detalle_otros_titulos'],
        'fecha' => $data['fecha'],
        'id_valoracion' => $data['id_valoracion'],
        'id_otros_titulos' => $data['id_otros_titulos']
    ];

    if ($modelValoracion->insert($valoracionData)) {
        // Obtener el ID recién insertado
        $idOtrosT = $modelValoracion->insertID();

        // Insertar en la segunda tabla (actualizacion_otros_titulos)
        $actualizacionData = [
            'id_otros_t' => $idOtrosT,
            'detalle_act_otros_tit' => $data['detalle_otros_titulos'],
            'fecha' => $data['fecha']
        ];

        if ($modelActualizacion->insert($actualizacionData)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Registro agregado exitosamente']);
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Error al agregar en actualizacion_otros_titulos']);
        }
    }

    return $this->response->setJSON(['status' => 'error', 'message' => 'Error al agregar el registro en valoracion_otros_titulos']);
    }

    public function editRecord($id)
    {
        
        $modelValoracion = new ValoracionOtrosTitulosModel();
        $modelActualizacion = new ActualizacionOtrosTitulosModel();

        // Obtener los datos del formulario
        $data = $this->request->getPost();

        // Datos para actualizar en valoracion_otros_titulos
        $valoracionData = [
        'detalle_otros_titulos' => $data['detalle_otros_titulos'],
        'fecha' => $data['fecha'],
        'id_valoracion' => $data['id_valoracion'],
        'id_otros_titulos' => $data['id_otros_titulos']
        ];

       // Intentar actualizar en valoracion_otros_titulos
       if ($modelValoracion->update($id, $valoracionData)) {

           $hoy = getdate();
          // Datos para insertar en actualizacion_otros_titulos
          $actualizacionData = [
            'id_otros_t' => $id, // Usamos el mismo ID relacionado
            'detalle_act_otros_tit' => $data['detalle_otros_titulos'],
            'id_otros_titulos' => $data['id_otros_titulos'],
            'fecha' => date('Y-m-d H:i:s')
          ];

          // Insertar un nuevo registro en actualizacion_otros_titulos
          if ($modelActualizacion->insert($actualizacionData)) {
              return $this->response->setJSON(['status' => 'success', 'message' => 'Registro actualizado en valoracion_otros_titulos y almacenado en actualizacion_otros_titulos']);
          } else {
              return $this->response->setJSON(['status' => 'error', 'message' => 'Error al almacenar el registro en actualizacion_otros_titulos']);
              }
        }

      return $this->response->setJSON(['status' => 'error', 'message' => 'Error al actualizar el registro en valoracion_otros_titulos']);
    }


    public function deleteRecord2($id)
    {
        $model = new ValoracionOtrosTitulosModel();
        if ($model->delete($id)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Registro eliminado exitosamente']);
        }
        return $this->response->setJSON(['status' => 'error', 'message' => 'Error al eliminar el registro']);
    }

  
    
    public function getDetail($id)
    {
        //$otrosTitulosModel = new ValoracionOtrosTitulosModel();
        //$record = $otrosTitulosModel->find($id);
        
        $mod = new ActualizacionOtrosTitulosModel();
        $rec = $mod->getval($id);
        
       
       
        // Convertir a un arreglo simple
        $simpleArray = [];
        foreach ($rec as $item) {
            foreach ($item as $key => $value) {
                $simpleArray[$key][] = $value;
            }
        }
            

         // convierto array asociativo en array simple
        //$simpleArray = $rec[0];
        //print_r($simpleArray);
        //exit;
        
        if ($simpleArray) {
            return $this->response->setJSON($simpleArray);
        } else {
            log_message('error', "Registro con ID {$id} no encontrado.");
            return $this->response->setJSON(['error' => "Registro con ID {$id} no encontrado."])->setStatusCode(404);
        }
       
    }


//**************************************************************************************************** */


//************** FUNCIONES PARA POSTGRADO **************************************************************
    public function cargarOtrosTitulos2()
    {
       $otrosTitulosModel = new TitulosPostgradoModel();
       $otrosTitulos = $otrosTitulosModel->findAll();
 
       // Enviar los datos a la vista
       return $this->response->setJSON($otrosTitulos);
    }

    public function addRecord2()
    {
        $model = new ValoracionPostgradoModel();
        $data = $this->request->getPost();
        // Mapear el campo 'otros' a 'id_otros_titulos'
        $data['id_titulo_postgrado'] = $data['id_titulo_postgrado'];
        unset($data['otros']); // Opcional: elimina el campo 'otros' si no es necesario
        
        if ($model->insert($data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Registro agregado exitosamente']);
        }
        return $this->response->setJSON(['status' => 'error', 'message' => 'Error al agregar el registro']);
    }


    public function editRecord2($id)
    {
        $model = new ValoracionPostgradoModel();
        $modelActPos = new ActualizacionPostgradoModel();

        $data = $this->request->getPost();

       // Datos para actualizar en 
        $valoracionData = [
        'detalle_valoracion_postgrado' => $data['detalle_valoracion_postgrado'],
        'fecha' => $data['fecha'],
        'id_valoracion' => $data['id_valoracion'],
        'id_titulo_postgrado' => $data['id_titulo_postgrado']
        ];

       // Intentar actualizar en 
       if ($model->update($id, $valoracionData)) {

           $hoy = getdate();
          // Datos para insertar en actualizacion_postgrado
          $actualizacionData = [
            'id_postgrado' => $id, // Usamos el mismo ID relacionado
            'detalle_act_postgrado' => $data['detalle_valoracion_postgrado'],
            'id_titulo_postgrado' => $data['id_titulo_postgrado'],
            'fecha' => date('Y-m-d H:i:s')
          ];

          // Insertar un nuevo registro en actualizacion_postgrado
          if ($modelActPos->insert($actualizacionData)) {
              return $this->response->setJSON(['status' => 'success', 'message' => 'Registro actualizado en valoracion_otros_titulos y almacenado en actualizacion_otros_titulos']);
          } else {
              return $this->response->setJSON(['status' => 'error', 'message' => 'Error al almacenar el registro en actualizacion_otros_titulos']);
              }
        }

      return $this->response->setJSON(['status' => 'error', 'message' => 'Error al actualizar el registro en valoracion_otros_titulos']);
    }

    public function deleteRecord22($id)
    {
        $model = new ValoracionPostgradoModel();
        if ($model->delete($id)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Registro eliminado exitosamente']);
        }
        return $this->response->setJSON(['status' => 'error', 'message' => 'Error al eliminar el registro']);
    }
    
    public function getDetailPostgrado($id)
    {
        //$otrosTitulosModel = new ValoracionOtrosTitulosModel();
        //$record = $otrosTitulosModel->find($id);
        
        $mod = new ActualizacionPostgradoModel();
        $rec = $mod->getpos($id);
        
        // Convertir a un arreglo simple
        $simpleArray = [];
        foreach ($rec as $item) {
            foreach ($item as $key => $value) {
                $simpleArray[$key][] = $value;
            }
        }
            

         // convierto array asociativo en array simple
        //$simpleArray = $rec[0];
        //print_r($simpleArray);
        //exit;
        
        if ($simpleArray) {
            return $this->response->setJSON($simpleArray);
        } else {
            log_message('error', "Registro con ID {$id} no encontrado.");
            return $this->response->setJSON(['error' => "Registro con ID {$id} no encontrado."])->setStatusCode(404);
        }
       
    }



    //***** FUNCIONES PARA ANTIGUEDAD ***************************************************************************************

    public function cargarOtrosTitulos3()
    {
       $otrosTitulosModel = new DetalleAntDocModel();
       $otrosTitulos = $otrosTitulosModel->findAll();
 
       // Enviar los datos a la vista
       return $this->response->setJSON($otrosTitulos);
    }

    public function addRecord3()
    {
        $model = new AntecedentesDocModel();
        $data = $this->request->getPost();
        // Mapear el campo 'otros' a 'id_otros_titulos'
        $data['id_detalle_doc'] = $data['id_detalle_doc'];
        unset($data['otros']); // Opcional: elimina el campo 'otros' si no es necesario
        
        if ($model->insert($data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Registro agregado exitosamente']);
        }
        return $this->response->setJSON(['status' => 'error', 'message' => 'Error al agregar el registro']);
    }

    public function editRecord3($id)
    {
        $model = new AntecedentesDocModel();
        $modelActAnt = new ActualizacionAntDocModel();

        $data = $this->request->getPost();

       // Datos para actualizar en 
        $valoracionData = [
        'detalle_ant_doc' => $data['detalle_ant_doc'],
        'cantidad' => $data['cantidad'],
        'id_valoracion' => $data['id_valoracion'],
        'id_detalle_doc' => $data['id_detalle_doc']
        ];

       // Intentar actualizar en 
       if ($model->update($id, $valoracionData)) {

           $hoy = getdate();
          // Datos para insertar en actualizacion_postgrado
          $actualizacionData = [
            'id_ant_doc' => $id, // Usamos el mismo ID relacionado
            'detalle_act_ant_doc' => $data['detalle_ant_doc'],
            'cantidad' => $data['cantidad'],
            'id_detalle_doc' => $data['id_detalle_doc'],
            'fecha' => date('Y-m-d H:i:s')
          ];

          // Insertar un nuevo registro en actualizacion_postgrado
          if ($modelActAnt->insert($actualizacionData)) {
              return $this->response->setJSON(['status' => 'success', 'message' => 'Registro actualizado en valoracion_otros_titulos y almacenado en actualizacion_otros_titulos']);
          } else {
              return $this->response->setJSON(['status' => 'error', 'message' => 'Error al almacenar el registro en actualizacion_otros_titulos']);
              }
        }

      return $this->response->setJSON(['status' => 'error', 'message' => 'Error al actualizar el registro en valoracion_otros_titulos']);
    }



    public function deleteRecord23($id)
    {
        $model = new AntecedentesDocModel();
        if ($model->delete($id)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Registro eliminado exitosamente']);
        }
        return $this->response->setJSON(['status' => 'error', 'message' => 'Error al eliminar el registro']);
    }

    public function getDetailAntiguedad($id)
    {
        //$otrosTitulosModel = new ValoracionOtrosTitulosModel();
        //$record = $otrosTitulosModel->find($id);
        
        $mod = new ActualizacionAntDocModel();
        $rec = $mod->getAntDoc($id);
        
        // Convertir a un arreglo simple
        $simpleArray = [];
        foreach ($rec as $item) {
            foreach ($item as $key => $value) {
                $simpleArray[$key][] = $value;
            }
        }
            

         // convierto array asociativo en array simple
        //$simpleArray = $rec[0];
        //print_r($simpleArray);
        //exit;
        
        if ($simpleArray) {
            return $this->response->setJSON($simpleArray);
        } else {
            log_message('error', "Registro con ID {$id} no encontrado.");
            return $this->response->setJSON(['error' => "Registro con ID {$id} no encontrado."])->setStatusCode(404);
        }
       
    }
    

    //******************* FUNCIONES PARA CAPACITACIÓN *************************************************************************
    public function cargarOtrosTitulos4()
    {
       $otrosTitulosModel = new DetalleCapacitacionModel();
       $otrosTitulos = $otrosTitulosModel->findAll();
 
       // Enviar los datos a la vista
       return $this->response->setJSON($otrosTitulos);
    }

    public function addRecord4()
    {
        $model = new CapacitacionModel();
        $data = $this->request->getPost();
        // Mapear el campo 'otros' a 'id_otros_titulos'
        $data['id_detalle_capacitacion'] = $data['id_detalle_capacitacion'];
        unset($data['otros']); // Opcional: elimina el campo 'otros' si no es necesario
        
        if ($model->insert($data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Registro agregado exitosamente']);
        }
        return $this->response->setJSON(['status' => 'error', 'message' => 'Error al agregar el registro']);
    }

    public function editRecord4($id)
    {
        $model = new CapacitacionModel();
        $modelActCap = new ActualizacionCapacitacionModel();

        $data = $this->request->getPost();

       // Datos para actualizar en 
        $valoracionData = [
        'detalle_capacitacion' => $data['detalle_capacitacion'],
        'fecha' => $data['fecha'],
        'id_valoracion' => $data['id_valoracion'],
        'id_capacitacion' => $data['id_capacitacion'],
        'id_detalle_capacitacion' => $data['id_detalle_capacitacion']
        ];

       // Intentar actualizar en 
       if ($model->update($id, $valoracionData)) {

           $hoy = getdate();
          // Datos para insertar en actualizacion_postgrado
          $actualizacionData = [
            'id_capacitacion' => $id, // Usamos el mismo ID relacionado
            'detalle_act_capacitacion' => $data['detalle_capacitacion'],
            'id_detalle_capacitacion' => $data['id_detalle_capacitacion'],
            'fecha' => date('Y-m-d H:i:s')
          ];

          // Insertar un nuevo registro en actualizacion_postgrado
          if ($modelActCap->insert($actualizacionData)) {
              return $this->response->setJSON(['status' => 'success', 'message' => 'Registro actualizado en valoracion_otros_titulos y almacenado en actualizacion_otros_titulos']);
          } else {
              return $this->response->setJSON(['status' => 'error', 'message' => 'Error al almacenar el registro en actualizacion_otros_titulos']);
              }
        }

      return $this->response->setJSON(['status' => 'error', 'message' => 'Error al actualizar el registro en valoracion_otros_titulos']);
    }


    public function deleteRecord24($id)
    {
        $model = new CapacitacionModel();
        if ($model->delete($id)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Registro eliminado exitosamente']);
        }
        return $this->response->setJSON(['status' => 'error', 'message' => 'Error al eliminar el registro']);
    }

    public function getDetailCapacitacion($id)
    {
        //$otrosTitulosModel = new ValoracionOtrosTitulosModel();
        //$record = $otrosTitulosModel->find($id);
        
        $mod = new ActualizacionCapacitacionModel();
        $rec = $mod->getCapacitacion($id);
        
        // Convertir a un arreglo simple
        $simpleArray = [];
        foreach ($rec as $item) {
            foreach ($item as $key => $value) {
                $simpleArray[$key][] = $value;
            }
        }
            

         // convierto array asociativo en array simple
        //$simpleArray = $rec[0];
        //print_r($simpleArray);
        //exit;
        
        if ($simpleArray) {
            return $this->response->setJSON($simpleArray);
        } else {
            log_message('error', "Registro con ID {$id} no encontrado.");
            return $this->response->setJSON(['error' => "Registro con ID {$id} no encontrado."])->setStatusCode(404);
        }
       
    }


    //********** FUNCIONES PARA FORMACIÓN OFRECIDA************************************************************************
    public function cargarOtrosTitulos5()
    {
       $otrosTitulosModel = new DetalleFormacionOfrecidaModel();
       $otrosTitulos = $otrosTitulosModel->findAll();
 
       // Enviar los datos a la vista
       return $this->response->setJSON($otrosTitulos);
    }

    public function addRecord5()
    {
        $model = new FormacionOfrecidaModel();
        $data = $this->request->getPost();
        // Mapear el campo 'otros' a 'id_otros_titulos'
        $data['id_formacion_ofrecida'] = $data['id_formacion_ofrecida'];
        unset($data['otros']); // Opcional: elimina el campo 'otros' si no es necesario
        
        if ($model->insert($data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Registro agregado exitosamente']);
        }
        return $this->response->setJSON(['status' => 'error', 'message' => 'Error al agregar el registro']);
    }

    public function editRecord5($id)
    {
        $model = new FormacionOfrecidaModel();
        $modelActCap = new ActualizacionFormacionOfrecidaModel();

        $data = $this->request->getPost();

       // Datos para actualizar en 
        $valoracionData = [
        'detalle_formacion' => $data['detalle_formacion'],
        'fecha' => $data['fecha'],
        'id_valoracion' => $data['id_valoracion'],
        'id_formacion' => $data['id_formacion'],
        'id_formacion_ofrecida' => $data['id_formacion_ofrecida']
        ];

       // Intentar actualizar en 
       if ($model->update($id, $valoracionData)) {

           $hoy = getdate();
          // Datos para insertar en actualizacion_postgrado
          $actualizacionData = [
            'id_formacion' => $id, // Usamos el mismo ID relacionado
            'detalle_act_for_of' => $data['detalle_formacion'],
            'id_formacion_ofrecida' => $data['id_formacion_ofrecida'],
            'fecha' => date('Y-m-d H:i:s')
          ];

          // Insertar un nuevo registro en actualizacion_postgrado
          if ($modelActCap->insert($actualizacionData)) {
              return $this->response->setJSON(['status' => 'success', 'message' => 'Registro actualizado en valoracion_otros_titulos y almacenado en actualizacion_otros_titulos']);
          } else {
              return $this->response->setJSON(['status' => 'error', 'message' => 'Error al almacenar el registro en actualizacion_otros_titulos']);
              }
        }

      return $this->response->setJSON(['status' => 'error', 'message' => 'Error al actualizar el registro en valoracion_otros_titulos']);
    }

    public function deleteRecord25($id)
    {
        $model = new FormacionOfrecidaModel();
        if ($model->delete($id)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Registro eliminado exitosamente']);
        }
        return $this->response->setJSON(['status' => 'error', 'message' => 'Error al eliminar el registro']);
    }

    public function getDetailFormacionOfrecida($id)
    {
        //$otrosTitulosModel = new ValoracionOtrosTitulosModel();
        //$record = $otrosTitulosModel->find($id);
        
        $mod = new ActualizacionFormacionOfrecidaModel();
        $rec = $mod->getFormacionOfrecida($id);
        
        // Convertir a un arreglo simple
        $simpleArray = [];
        foreach ($rec as $item) {
            foreach ($item as $key => $value) {
                $simpleArray[$key][] = $value;
            }
        }
            

         // convierto array asociativo en array simple
        //$simpleArray = $rec[0];
        //print_r($simpleArray);
        //exit;
        
        if ($simpleArray) {
            return $this->response->setJSON($simpleArray);
        } else {
            log_message('error', "Registro con ID {$id} no encontrado.");
            return $this->response->setJSON(['error' => "Registro con ID {$id} no encontrado."])->setStatusCode(404);
        }
       
    }    

    //*********** FUNCIONES PARA INVESTIGACIÓN **************************************     
    public function cargarOtrosTitulos6()
    {
       $otrosTitulosModel = new DetalleInvestigacionModel();
       $otrosTitulos = $otrosTitulosModel->findAll();
 
       // Enviar los datos a la vista
       return $this->response->setJSON($otrosTitulos);
    }

    public function addRecord6()
    {
        $model = new InvestigacionModel();
        $data = $this->request->getPost();
        // Mapear el campo 'otros' a 'id_otros_titulos'
        $data['id_detalle_investigacion'] = $data['id_detalle_investigacion'];
        unset($data['otros']); // Opcional: elimina el campo 'otros' si no es necesario
        
        if ($model->insert($data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Registro agregado exitosamente']);
        }
        return $this->response->setJSON(['status' => 'error', 'message' => 'Error al agregar el registro']);
    }

    public function editRecord6($id)
    {
        $model = new InvestigacionModel();
        $modelActInv = new ActualizacionInvModel();

        $data = $this->request->getPost();

       // Datos para actualizar en 
        $valoracionData = [
        'detalle_investigacion' => $data['detalle_investigacion'],
        'fecha' => $data['fecha'],
        'id_valoracion' => $data['id_valoracion'],
        'id_investigacion' => $data['id_investigacion'],
        'id_detalle_investigacion' => $data['id_detalle_investigacion']
        ];

       // Intentar actualizar en 
       if ($model->update($id, $valoracionData)) {

           $hoy = getdate();
          // Datos para insertar en actualizacion_postgrado
          $actualizacionData = [
            'id_investigacion' => $id, // Usamos el mismo ID relacionado
            'detalle_act_investigacion' => $data['detalle_investigacion'],
            'id_detalle_investigacion' => $data['id_detalle_investigacion'],
            'fecha' => date('Y-m-d H:i:s')
          ];

          // Insertar un nuevo registro en actualizacion_postgrado
          if ($modelActInv->insert($actualizacionData)) {
              return $this->response->setJSON(['status' => 'success', 'message' => 'Registro actualizado en valoracion_otros_titulos y almacenado en actualizacion_otros_titulos']);
          } else {
              return $this->response->setJSON(['status' => 'error', 'message' => 'Error al almacenar el registro en actualizacion_otros_titulos']);
              }
        }

      return $this->response->setJSON(['status' => 'error', 'message' => 'Error al actualizar el registro en valoracion_otros_titulos']);
    }


    public function deleteRecord26($id)
    {
        $model = new InvestigacionModel();
        if ($model->delete($id)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Registro eliminado exitosamente']);
        }
        return $this->response->setJSON(['status' => 'error', 'message' => 'Error al eliminar el registro']);
    }

    public function getDetailInvestigacion($id)
    {
        //$otrosTitulosModel = new ValoracionOtrosTitulosModel();
        //$record = $otrosTitulosModel->find($id);
        
        $mod = new ActualizacionInvModel();
        $rec = $mod->getInvestigacion($id);
        
        // Convertir a un arreglo simple
        $simpleArray = [];
        foreach ($rec as $item) {
            foreach ($item as $key => $value) {
                $simpleArray[$key][] = $value;
            }
        }
            

         // convierto array asociativo en array simple
        //$simpleArray = $rec[0];
        //print_r($simpleArray);
        //exit;
        
        if ($simpleArray) {
            return $this->response->setJSON($simpleArray);
        } else {
            log_message('error', "Registro con ID {$id} no encontrado.");
            return $this->response->setJSON(['error' => "Registro con ID {$id} no encontrado."])->setStatusCode(404);
        }
       
    } 



    //*********** FUNCIONES PARA OTROS ANTECEDENTES ********************************************      
    public function cargarOtrosTitulos7()
    {
       $otrosTitulosModel = new DetalleOtrosAntDocModel();
       $otrosTitulos = $otrosTitulosModel->findAll();
 
       // Enviar los datos a la vista
       return $this->response->setJSON($otrosTitulos);
    }

    public function addRecord7()
    {
        $model = new OtrosAntecedentesDocModel();
        $data = $this->request->getPost();
        // Mapear el campo 'otros' a 'id_otros_titulos'
        $data['id_detalle_otros_ant'] = $data['id_detalle_otros_ant'];
        unset($data['otros']); // Opcional: elimina el campo 'otros' si no es necesario
        
        if ($model->insert($data)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Registro agregado exitosamente']);
        }
        return $this->response->setJSON(['status' => 'error', 'message' => 'Error al agregar el registro']);
    }

    public function editRecord7($id)
    {
        $model = new OtrosAntecedentesDocModel();
        $modelOtros = new ActualizacionOtrosAntModel();

        $data = $this->request->getPost();

       // Datos para actualizar en 
        $valoracionData = [
        'detalle_otros_ant_doc' => $data['detalle_otros_ant_doc'],
        'fecha' => $data['fecha'],
        'id_valoracion' => $data['id_valoracion'],
        'id_detalle_ant' => $data['id_detalle_ant'],
        'id_detalle_otros_ant' => $data['id_detalle_otros_ant']
        ];

       // Intentar actualizar en 
       if ($model->update($id, $valoracionData)) {

           $hoy = getdate();
          // Datos para insertar en actualizacion_postgrado
          $actualizacionData = [
            'id_detalle_ant' => $id, // Usamos el mismo ID relacionado
            'detalle_act_otros' => $data['detalle_otros_ant_doc'],
            'id_detalle_otros_ant' => $data['id_detalle_otros_ant'],
            'fecha' => date('Y-m-d H:i:s')
          ];

          // Insertar un nuevo registro en actualizacion_postgrado
          if ($modelOtros->insert($actualizacionData)) {
              return $this->response->setJSON(['status' => 'success', 'message' => 'Registro actualizado en valoracion_otros_titulos y almacenado en actualizacion_otros_titulos']);
          } else {
              return $this->response->setJSON(['status' => 'error', 'message' => 'Error al almacenar el registro en actualizacion_otros_titulos']);
              }
        }

      return $this->response->setJSON(['status' => 'error', 'message' => 'Error al actualizar el registro en valoracion_otros_titulos']);
    }

    public function deleteRecord27($id)
    {
        $model = new OtrosAntecedentesDocModel();
        if ($model->delete($id)) {
            return $this->response->setJSON(['status' => 'success', 'message' => 'Registro eliminado exitosamente']);
        }
        return $this->response->setJSON(['status' => 'error', 'message' => 'Error al eliminar el registro']);
    }

    public function getDetailOtros($id)
    {
        //$otrosTitulosModel = new ValoracionOtrosTitulosModel();
        //$record = $otrosTitulosModel->find($id);
        
        $mod = new ActualizacionOtrosAntModel();
        $rec = $mod->getOtros($id);
        
        // Convertir a un arreglo simple
        $simpleArray = [];
        foreach ($rec as $item) {
            foreach ($item as $key => $value) {
                $simpleArray[$key][] = $value;
            }
        }
            

         // convierto array asociativo en array simple
        //$simpleArray = $rec[0];
        //print_r($simpleArray);
        //exit;
        
        if ($simpleArray) {
            return $this->response->setJSON($simpleArray);
        } else {
            log_message('error', "Registro con ID {$id} no encontrado.");
            return $this->response->setJSON(['error' => "Registro con ID {$id} no encontrado."])->setStatusCode(404);
        }
       
    }


     //*********** FUNCIONES PARA ANT LABORALES *******************************************************************      
     public function cargarOtrosTitulos8()
     {
        $otrosTitulosModel = new DetalleAntLabModel();
        $otrosTitulos = $otrosTitulosModel->findAll();
  
        // Enviar los datos a la vista
        return $this->response->setJSON($otrosTitulos);
     }
 
     public function addRecord8()
     {
         $model = new AntecedentesLabModel();
         $data = $this->request->getPost();
         // Mapear el campo 'otros' a 'id_otros_titulos'
         $data['id_detalle_lab'] = $data['id_detalle_lab'];
         unset($data['otros']); // Opcional: elimina el campo 'otros' si no es necesario
         
         if ($model->insert($data)) {
             return $this->response->setJSON(['status' => 'success', 'message' => 'Registro agregado exitosamente']);
         }
         return $this->response->setJSON(['status' => 'error', 'message' => 'Error al agregar el registro']);
     }
 
     public function editRecord8($id)
    {
        $model = new AntecedentesLabModel();
        $modelLab = new ActualizacionAntLabModel();

        $data = $this->request->getPost();

       // Datos para actualizar en 
        $valoracionData = [
        'detalle_ant_lab' => $data['detalle_ant_lab'],
        'cantidad' => $data['cantidad'],
        'id_valoracion' => $data['id_valoracion'],
        'id_ant_lab' => $data['id_ant_lab'],
        'id_detalle_lab' => $data['id_detalle_lab']
        ];

       // Intentar actualizar en 
       if ($model->update($id, $valoracionData)) {

           $hoy = getdate();
          // Datos para insertar en actualizacion_postgrado
          $actualizacionData = [
            'id_ant_lab' => $id, // Usamos el mismo ID relacionado
            'detalle_act_lab' => $data['detalle_ant_lab'],
            'id_detalle_lab' => $data['id_detalle_lab'],
            'cantidad' => $data['cantidad']
          ];

          // Insertar un nuevo registro en actualizacion_postgrado
          if ($modelLab->insert($actualizacionData)) {
              return $this->response->setJSON(['status' => 'success', 'message' => 'Registro actualizado en valoracion_otros_titulos y almacenado en actualizacion_otros_titulos']);
          } else {
              return $this->response->setJSON(['status' => 'error', 'message' => 'Error al almacenar el registro en actualizacion_otros_titulos']);
              }
        }

      return $this->response->setJSON(['status' => 'error', 'message' => 'Error al actualizar el registro en valoracion_otros_titulos']);
    }
 
     public function deleteRecord28($id)
     {
         $model = new AntecedentesLabModel();
         
         if ($model->delete($id)) {
            return $this->response->setJSON(['success' => true]);
        } else {
            return $this->response->setJSON(['success' => false]);
        }
   }

     public function getDetailLab($id)
    {
        //$otrosTitulosModel = new ValoracionOtrosTitulosModel();
        //$record = $otrosTitulosModel->find($id);
        
        $mod = new ActualizacionAntLabModel();
        $rec = $mod->getLab($id);
        
        // Convertir a un arreglo simple
        $simpleArray = [];
        foreach ($rec as $item) {
            foreach ($item as $key => $value) {
                $simpleArray[$key][] = $value;
            }
        }
            

         // convierto array asociativo en array simple
        //$simpleArray = $rec[0];
        //print_r($simpleArray);
        //exit;
        
        if ($simpleArray) {
            return $this->response->setJSON($simpleArray);
        } else {
            log_message('error', "Registro con ID {$id} no encontrado.");
            return $this->response->setJSON(['error' => "Registro con ID {$id} no encontrado."])->setStatusCode(404);
        }
       
    }
 
    
    
}



