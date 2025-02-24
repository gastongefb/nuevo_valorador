<?php

namespace App\Models;

use CodeIgniter\Model;

class TitulosModel extends Model
{
    //protected $table = 'materias';

    protected $primaryKey = 'id_titulo';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['detalle_titulo','puntaje'];

    protected $table = 'titulos';

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
    //$t = $tit->     getDatosByCodigo($idTitulo);
    public function getDatosTitulos($codigo)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('id_titulo',$codigo);
        $query = $builder->get();
 
        return $query->getResultArray(); // Devuelve los resultados como un array asociativo
    }

    public function getDatosByCodigo($idTitulo)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('id_titulo',$idTitulo);
        $query = $builder->get();
 
        return $query->getResultArray(); // Devuelve los resultados como un array asociativo
    }

    
   

 

    
}