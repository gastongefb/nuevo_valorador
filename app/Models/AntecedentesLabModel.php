<?php

namespace App\Models;

use CodeIgniter\Model;

class AntecedentesLabModel extends Model
{
    //protected $table = 'materias';

    protected $primaryKey = 'id_ant_lab';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['id_valoracion','detalle_ant_lab','cantidad','id_detalle_lab'];

    protected $table = 'antecedentes_laborales';

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

    public function getDatosByCodigo($codigo)
    {
        return $this->where('id_detalle_lab', $codigo)->findAll();
    }

    public function getDatosById_detalle_lab($codigo)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('id_valoracion',$codigo);
        $query = $builder->get();
 
        return $query->getResultArray(); // Devuelve los resultados como un array asociativo
    }
}