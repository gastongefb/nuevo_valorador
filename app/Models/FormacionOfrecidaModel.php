<?php

namespace App\Models;

use CodeIgniter\Model;

class FormacionOfrecidaModel extends Model
{
    //protected $table = 'materias';

    protected $primaryKey = 'id_formacion';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['id_valoracion','detalle_formacion','fecha','id_formacion_ofrecida'];

    protected $table = 'formacion_ofrecida';

    public function getValidacion()
    {
        return $this->findAll();
    }

    /*
    public function getDatosByCodigo($codigo)
    {
        return $this->where('puntaje', $codigo)->findAll();
    }
    */ 

    public function getCodigoByPuntajeCap($id_tit_ca)
    {
        $builder = $this->db->table($this->table);
        $builder->select('puntaje');
        $builder->where('id_detalle_capacitacion',$id_tit_ca);
        $query = $builder->get();
 
        return $query->getResultArray(); // Devuelve los resultados como un array asociativo
    }

    public function getCodigoById_formacion_ofrecida($codigo)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('id_valoracion', $codigo);
        $query = $builder->get();
 
        return $query->getResultArray(); // Devuelve los resultados como un array asociativo
    }

 

    
}