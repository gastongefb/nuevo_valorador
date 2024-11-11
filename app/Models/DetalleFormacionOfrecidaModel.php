<?php

namespace App\Models;

use CodeIgniter\Model;

class DetalleFormacionOfrecidaModel extends Model
{
    //protected $table = 'materias';

    protected $primaryKey = 'id_formacion_ofrecida';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['detalle','puntaje'];

    protected $table = 'detalle_formacion_ofrecida';

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