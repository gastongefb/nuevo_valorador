<?php

namespace App\Models;

use CodeIgniter\Model;

class ActualizacionAntDocModel extends Model
{
    //protected $table = 'materias';

    protected $primaryKey = 'id_act_ant_doc';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['id_ant_doc','detalle_act_ant_doc','cantidad','id_detalle_doc','fecha'];

    //protected $useSoftDelete = true;
    //protected $useTimestamps = true;
    //protected $dataFormat = 'datetime'; // date
    //protected $createdField = 'fecha_alta';
    //protected $updatedField = 'fecha_modifica';

    protected $table = 'actualizacion_antecedentes_docentes';

    public function getValidacion()
    {
        return $this->findAll();
    }


    public function getAntDoc($id)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('id_ant_doc', $id);
        $query = $builder->get();
 
        return $query->getResultArray(); // Devuelve los resultados como un array asociativo
    }
    
}