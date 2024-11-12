<?php

namespace App\Models;

use CodeIgniter\Model;

class ValoracionOtrosTitulosModel extends Model
{
    //protected $table = 'materias';

    protected $primaryKey = 'id_otros_t';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['id_otros_titulos','detalle_otros_titulos','fecha','id_valoracion'];

    protected $table = 'valoracion_otros_titulos';

    public function getValidacion()
    {
        return $this->findAll();
    }

   

    public function getCodigoByPuntaje($id_tit_post)
   {
       $builder = $this->db->table($this->table);
       $builder->select('puntaje');
       $builder->where('id_otros_t', $id_tit_post);
       $query = $builder->get();

       return $query->getResultArray(); // Devuelve los resultados como un array asociativo
   }

   public function getCodigoById_valoracion($codigo)
   {
       $builder = $this->db->table($this->table);
       $builder->select('*');
       $builder->where('id_valoracion', $codigo);
       $query = $builder->get();

       return $query->getResultArray(); // Devuelve los resultados como un array asociativo
   }

   public function updateValoracion($va, $data)
   {
       // Usa el método update() de la clase base
       return $this->update($va, $data); // Aquí $dni es el id y $data son los nuevos valores
   }

    
}