<?php

namespace App\Models;

use CodeIgniter\Model;

class InvestigacionModel extends Model
{
    //protected $table = 'materias';

    protected $primaryKey = 'id_investigacion';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['id_valoracion','detalle_investigacion','fecha','id_detalle_investigacion'];

    //protected $useSoftDelete = true;
    protected $useTimestamps = true;
    protected $dataFormat = 'datetime'; // date
    protected $createdField = 'fecha_alta';
    protected $updatedField = 'fecha_modifica';

    protected $table = 'investigacion';

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
        return $this->where('id_detalle_capacitacion', $codigo)->findAll();
    }

    public function getCodigoById_detallae_inv($codigo)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('id_valoracion', $codigo);
        $query = $builder->get();
 
        return $query->getResultArray(); // Devuelve los resultados como un array asociativo
    }
}