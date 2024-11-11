<?php

namespace App\Models;

use CodeIgniter\Model;

class CondicionDocenteModel extends Model
{
    //protected $table = 'materias';

    protected $primaryKey = 'id_condicion';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['detalle_condicion'];

    protected $table = 'condicion_docente';

    public function getDetalleConcidion($codigo)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('id_condicion', $codigo);
        $query = $builder->get();
 
        return $query->getResultArray(); // Devuelve los resultados como un array asociativo
    }
   
    
}