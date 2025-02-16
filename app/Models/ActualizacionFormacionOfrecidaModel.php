<?php

namespace App\Models;

use CodeIgniter\Model;

class ActualizacionFormacionOfrecidaModel extends Model
{
    //protected $table = 'materias';

    protected $primaryKey = 'id_act_for_of';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['id_formacion','detalle_act_for_of','id_formacion_ofrecida','fecha'];

    //protected $useSoftDelete = true;
    //protected $useTimestamps = true;
    //protected $dataFormat = 'datetime'; // date
    //protected $createdField = 'fecha_alta';
    //protected $updatedField = 'fecha_modifica';

    protected $table = 'actualizacion_formacion_ofrecida';

    public function getValidacion()
    {
        return $this->findAll();
    }


    public function getFormacionOfrecida($id)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('id_formacion', $id);
        $query = $builder->get();
 
        return $query->getResultArray(); // Devuelve los resultados como un array asociativo
    }
    
}