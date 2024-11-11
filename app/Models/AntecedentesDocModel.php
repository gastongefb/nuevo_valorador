<?php

namespace App\Models;

use CodeIgniter\Model;

class AntecedentesDocModel extends Model
{
    //protected $table = 'materias';

    protected $primaryKey = 'id_ant_doc';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['id_valoracion','detalle_ant_doc','cantidad','id_detalle_doc'];

    protected $table = 'antecedentes_docentes';

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
        return $this->where('id_detalle_doc', $codigo)->findAll();
    }

    public function getDatosById_ant_doc($codigo)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('id_valoracion',$codigo);
        $query = $builder->get();
 
        return $query->getResultArray(); // Devuelve los resultados como un array asociativo
    }
}