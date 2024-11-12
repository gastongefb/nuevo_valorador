<?php

namespace App\Models;

use CodeIgniter\Model;

class ValidacionModel extends Model
{
    //protected $table = 'materias';

    protected $primaryKey = 'id_valoracion';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['dni', 'id_titulo','j1','j2','j3','id_materia_valoracion'];

    protected $table = 'valoracion';

    public function getValidacion()
    {
        return $this->findAll();
    }

    public function getUnaValidacion($d)
    {
        $db = \Config\Database::connect();
        $builder = $this->db->query("select * from validación where dni = $d");
        return $builder->getResult();
    }
    public function obtenerUltimoID()
    {
        return $this->insertID();
    }

    public function obtenerUltimoCampoDeseado()
    {
        $ultimoRegistro = $this->orderBy('id_valoracion', 'DESC')->first();
        return $ultimoRegistro ? $ultimoRegistro['id_valoracion'] : null;
    }

    public function etLastInsertedIdFromOtraTablag()
    {
    // Obtener la conexión a la base de datos
    $db = db_connect();

    // Verificar si la conexión es válida
    if ($db) {
        // Obtener el último ID insertado usando la conexión a la base de datos
        $query = $db->query('SELECT LAST_INSERT_ID() as last_id');
        $row = $query->getRow();
        
        // Verificar si se obtuvo alguna fila
        if ($row) {
            // Devolver el último ID insertado
            return $row->last_id;
        } else {
            // No se pudo obtener el último ID insertado, manejar el caso de error según sea necesario
            return -1; // Por ejemplo, devolvemos -1 como indicador de error
        }
    } else {
        // La conexión a la base de datos no es válida, manejar el caso de error según sea necesario
        return -1; // Por ejemplo, devolvemos -1 como indicador de error
    }
   }

   public function getCodigoByDni($dni)
   {
       $builder = $this->db->table($this->table);
       $builder->select('id_valoracion');
       $builder->where('dni',$dni);
       $query = $builder->get();

       return $query->getResultArray(); // Devuelve los resultados como un array asociativo
   }

   public function getCodigoByTitulo($dni)
   {
       $builder = $this->db->table($this->table);
       $builder->select('id_titulo');
       $builder->where('dni',$dni);
       $query = $builder->get();

       return $query->getResultArray(); // Devuelve los resultados como un array asociativo
   }

   public function getValidacionesPorMateria($dato)
   {
       $builder = $this->db->table($this->table);
       $builder->select('*');
       $builder->where('id_materia_valoracion',$dato);
       $query = $builder->get();

       return $query->getResultArray(); // Devuelve los resultados como un array asociativo
   }

   public function getValoracionDniMateria($dni, $id_materia)
   {
       $builder = $this->db->table($this->table);
       $builder->select('*');
       $builder->where('dni', $dni);
       $builder->where('id_materia_valoracion', $id_materia); // Ajuste en la clave para el segundo where
       $query = $builder->get();

       return $query->getResultArray(); // Devuelve los resultados como un array asociativo
   }

    public function updateValoracion($va, $data)
    {
        // Usa el método update() de la clase base
        return $this->update($va, $data); // Aquí $dni es el id y $data son los nuevos valores
    }
}


