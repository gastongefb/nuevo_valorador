<?php

namespace App\Models\paginacion;

use CodeIgniter\Model;

class Model2 extends Model
{
    //protected $table = 'materias';

    protected $primaryKey = 'id_tabla2';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['nombre2','apellido2'];

    protected $table = 'tabla2';

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