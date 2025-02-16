<?php

namespace App\Models;

use CodeIgniter\Model;

class ActualizacionAntLabModel extends Model
{
    //protected $table = 'materias';

    protected $primaryKey = 'id_act_lab';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['id_ant_lab','detalle_act_lab','id_detalle_lab','cantidad'];

    //protected $useSoftDelete = true;
    //protected $useTimestamps = true;
    //protected $dataFormat = 'datetime'; // date
    //protected $createdField = 'fecha_alta';
    //protected $updatedField = 'fecha_modifica';

    protected $table = 'actualizacion_antecedentes_laborales';

    public function getValidacion()
    {
        return $this->findAll();
    }


    public function getLab($id)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('id_ant_lab', $id);
        $query = $builder->get();
 
        return $query->getResultArray(); // Devuelve los resultados como un array asociativo
    }
    
}