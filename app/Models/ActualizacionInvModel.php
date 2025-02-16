<?php

namespace App\Models;

use CodeIgniter\Model;

class ActualizacionInvModel extends Model
{
    //protected $table = 'materias';

    protected $primaryKey = 'id_act_investigacion';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['id_investigacion','detalle_act_investigacion','id_detalle_investigacion','fecha'];

    //protected $useSoftDelete = true;
    //protected $useTimestamps = true;
    //protected $dataFormat = 'datetime'; // date
    //protected $createdField = 'fecha_alta';
    //protected $updatedField = 'fecha_modifica';

    protected $table = 'actualizacion_investigacion';

    public function getValidacion()
    {
        return $this->findAll();
    }


    public function getInvestigacion($id)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('id_investigacion', $id);
        $query = $builder->get();
 
        return $query->getResultArray(); // Devuelve los resultados como un array asociativo
    }
    
}