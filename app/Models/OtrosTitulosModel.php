<?php

namespace App\Models;

use CodeIgniter\Model;

class OtrosTitulosModel extends Model
{
    //protected $table = 'materias';

    protected $primaryKey = 'id_otros_titulos';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['detalle_otros_titulos','puntaje'];

    protected $table = 'otros_titulos';

    public function getValidacion()
    {
        return $this->findAll();
    }

    public function obtenerDatoRelacionadoPorDNI($dni)
    {
        // Consulta a la base de datos para obtener el dato relacionado basado en el DNI
        echo $dni;
        $query = $this->where('id_titulo_postgrado', $dni)
                      ->first(); // Obtiene el primer resultado

        // Verificar si se encontró un registro con el DNI dado
        if ($query) {
            // Si se encontró, devolver el valor del campo dato_relacionado
            return $query['puntaje'];
        } else {
            // Si no se encontró ningún registro con el DNI dado, devolver un valor por defecto o NULL
            return null;
        }
    }

    public function getCodigoByPuntaje($id_tit_post)
   {
       $builder = $this->db->table($this->table);
       $builder->select('puntaje');
       $builder->where('id_titulo_postgrado', $id_tit_post);
       $query = $builder->get();

       return $query->getResultArray(); // Devuelve los resultados como un array asociativo
   }

    
}