<?php

namespace App\Models;

use CodeIgniter\Model;

class DetalleOtrosAntDocModel extends Model
{
    //protected $table = 'materias';

    protected $primaryKey = 'id_detalle_otros_ant';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['detalle_otros_ant','puntaje'];

    protected $table = 'detalle_otros_ant_doc';

    public function getValidacion()
    {
        return $this->findAll();
    }

   
    public function getDatosByCodigo($codigo)
    {
        return $this->where('id_detalle_ant', $codigo)->findAll();
    }

    public function getDatosById_ant_doc($codigo)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('id_valoracion',$codigo);
        $query = $builder->get();
 
        return $query->getResultArray(); // Devuelve los resultados como un array asociativo
    }
}