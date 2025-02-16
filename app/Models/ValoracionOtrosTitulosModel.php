<?php

namespace App\Models;

use CodeIgniter\Model;

class ValoracionOtrosTitulosModel extends Model
{
    //protected $table = 'materias';

    protected $primaryKey = 'id_otros_t';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['id_valoracion','detalle_otros_titulos','fecha','id_otros_titulos'];

    //protected $useSoftDelete = true;
    protected $useTimestamps = true;
    protected $dataFormat = 'datetime'; // date
    protected $createdField = 'fecha_alta';
    protected $updatedField = 'fecha_modifica';

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

   public function updateOtrosTitulos($id, $datos)
   {
       // Usa el método update() de la clase base
       return $this->update($id, $datos); // Aquí $dni es el id y $data son los nuevos valores
   }

    
}