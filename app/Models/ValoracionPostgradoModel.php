<?php

namespace App\Models;

use CodeIgniter\Model;

class ValoracionPostgradoModel extends Model
{
    //protected $table = 'materias';

    protected $primaryKey = 'id_postgrado';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['id_valoracion','detalle_valoracion_postgrado','fecha','id_titulo_postgrado'];
    //protected $allowedFields = ['detalle_valoracion_postgrado', 'fecha', 'id_valoracion', 'id_titulo_postgrado'];

    //protected $useSoftDelete = true;
    protected $useTimestamps = true;
    protected $dataFormat = 'datetime'; // date
    protected $createdField = 'fecha_alta';
    protected $updatedField = 'fecha_modifica';

    //protected $deleteField = 'deleted_at'; //si trabajo con softdelete voy a tener que usar este campo

    protected $table = 'valoracion_postgrado';





    public function getValidacion()
    {
        return $this->findAll();
    }

    public function getUnaValidacion($d)
    {
        $db = \Config\Database::connect();
        $builder = $this->db->query("select * from validación where dni = $d");
        return $builder->getResult();
    }

    public function getCodigoById_valoracion($codigo)
   {
       $builder = $this->db->table($this->table);
       $builder->select('*');
       $builder->where('id_valoracion', $codigo);
       $query = $builder->get();

       return $query->getResultArray(); // Devuelve los resultados como un array asociativo
   }

   public function updatePostgrado($id,$datos)
   {
       // Usa el método update() de la clase base
       return $this->update($id,$datos); // Aquí $dni es el id y $data son los nuevos valores
   }
   
}