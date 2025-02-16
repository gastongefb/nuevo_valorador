<?php

namespace App\Models;

use CodeIgniter\Model;

class ActualizacionCapacitacionModel extends Model
{
    //protected $table = 'materias';

    protected $primaryKey = 'id_act_capacitacion';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['id_capacitacion','detalle_act_capacitacion','id_detalle_capacitacion','id_formacion_ofrecida','fecha'];

    //protected $useSoftDelete = true;
    //protected $useTimestamps = true;
    //protected $dataFormat = 'datetime'; // date
    //protected $createdField = 'fecha_alta';
    //protected $updatedField = 'fecha_modifica';

    protected $table = 'actualizacion_capacitacion';

    public function getValidacion()
    {
        return $this->findAll();
    }


    public function getCapacitacion($id)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('id_capacitacion', $id);
        $query = $builder->get();
 
        return $query->getResultArray(); // Devuelve los resultados como un array asociativo
    }
    
}