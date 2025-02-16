<?php

namespace App\Models;

use CodeIgniter\Model;

class ActualizacionPostgradoModel extends Model
{
    //protected $table = 'materias';

    protected $primaryKey = 'id_act_postgrado';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['id_postgrado','detalle_act_postgrado','id_titulo_postgrado','fecha'];

    //protected $useSoftDelete = true;
    //protected $useTimestamps = true;
    //protected $dataFormat = 'datetime'; // date
    //protected $createdField = 'fecha_alta';
    //protected $updatedField = 'fecha_modifica';

    protected $table = 'actualizacion_postgrado';

    public function getValidacion()
    {
        return $this->findAll();
    }


    public function getpos($id)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('id_postgrado', $id);
        $query = $builder->get();
 
        return $query->getResultArray(); // Devuelve los resultados como un array asociativo
    }
    
}