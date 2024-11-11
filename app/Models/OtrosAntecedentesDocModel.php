<?php

namespace App\Models;

use CodeIgniter\Model;

class OtrosAntecedentesDocModel extends Model
{
    //protected $table = 'materias';

    protected $primaryKey = 'id_detalle_ant';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['id_valoracion','detalle_otros_ant_doc','fecha','id_detalle_otros_ant'];

    protected $table = 'otros_antecedentes_docentes';

    public function getValidacion()
    {
        return $this->findAll();
    }

   
    public function getDatosByCodigo($codigo)
    {
        return $this->where('id_detalle_ant', $codigo)->findAll();
    }

    public function getDatosById_otros_ant($codigo)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('id_valoracion',$codigo);
        $query = $builder->get();
 
        return $query->getResultArray(); // Devuelve los resultados como un array asociativo
    }

    
}