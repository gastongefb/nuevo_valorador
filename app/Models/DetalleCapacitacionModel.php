<?php

namespace App\Models;

use CodeIgniter\Model;

class DetalleCapacitacionModel extends Model
{
    //protected $table = 'materias';

    protected $primaryKey = 'id_detalle_capacitacion';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['detalle','puntaje'];

    protected $table = 'detalle_capacitacion';

    public function getValidacion()
    {
        return $this->findAll();
    }

    /*
    public function getDatosByCodigo($codigo)
    {
        return $this->where('puntaje', $codigo)->findAll();
    }
    */ 

    public function getCodigoByPuntajeCap($id_tit_ca)
    {
        $builder = $this->db->table($this->table);
        $builder->select('puntaje');
        $builder->where('id_detalle_capacitacion',$id_tit_ca);
        $query = $builder->get();
 
        return $query->getResultArray(); // Devuelve los resultados como un array asociativo
    }

 

    
}