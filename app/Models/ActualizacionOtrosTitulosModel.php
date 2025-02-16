<?php

namespace App\Models;

use CodeIgniter\Model;

class ActualizacionOtrosTitulosModel extends Model
{
    //protected $table = 'materias';

    protected $primaryKey = 'id_act_otros_tit';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['id_otros_t','detalle_act_otros_tit','id_otros_titulos','fecha'];

    //protected $useSoftDelete = true;
    //protected $useTimestamps = true;
    //protected $dataFormat = 'datetime'; // date
    //protected $createdField = 'fecha_alta';
    //protected $updatedField = 'fecha_modifica';

    protected $table = 'actualizacion_otros_titulos';

    public function getValidacion()
    {
        return $this->findAll();
    }


    public function getval($id)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('id_otros_t', $id);
        $query = $builder->get();
 
        return $query->getResultArray(); // Devuelve los resultados como un array asociativo
    }
    
}