<?php

namespace App\Models;

use CodeIgniter\Model;

class ActualizacionOtrosAntModel extends Model
{
    //protected $table = 'materias';

    protected $primaryKey = 'id_act_otros';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['id_detalle_ant','detalle_act_otros','id_detalle_otros_ant','fecha'];

    //protected $useSoftDelete = true;
    //protected $useTimestamps = true;
    //protected $dataFormat = 'datetime'; // date
    //protected $createdField = 'fecha_alta';
    //protected $updatedField = 'fecha_modifica';

    protected $table = 'actualizacion_otros_antecedentes';

    public function getValidacion()
    {
        return $this->findAll();
    }


    public function getOtros($id)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('id_detalle_ant', $id);
        $query = $builder->get();
 
        return $query->getResultArray(); // Devuelve los resultados como un array asociativo
    }
    
}