<?php

namespace App\Models\paginacion;

use CodeIgniter\Model;

class Model1 extends Model
{
    //protected $table = 'materias';

    protected $primaryKey = 'id_tabla1';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['nombre1','apellido1'];

    protected $table = 'tabla1';

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
}