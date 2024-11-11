<?php

namespace App\Models;

use CodeIgniter\Model;

class DetalleAntLabModel extends Model
{
    //protected $table = 'materias';

    protected $primaryKey = 'id_detalle_lab';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['detalle_ant_lab','puntaje'];

    protected $table = 'detalle_ant_lab';

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

    public function getDatosByCodigo($codigo)
    {
        return $this->where('id_detalle_lab', $codigo)->findAll();
    }

    public function getCodigoByPuntajeAntLab($det_lab)
    {
        $builder = $this->db->table($this->table);
        $builder->select('puntaje');
        $builder->where('id_detalle_lab',$det_lab);
        $query = $builder->get();
 
        return $query->getResultArray(); // Devuelve los resultados como un array asociativo
    }
}