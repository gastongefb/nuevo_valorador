<?php

namespace App\Models;

use CodeIgniter\Model;

class ValoracionActualizacionModel extends Model
{
    //protected $table = 'materias';

    protected $primaryKey = 'id_val_act';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['id_valoracion'];

    //protected $useSoftDelete = true;
    protected $useTimestamps = true;
    protected $dataFormat = 'datetime'; // date
    //protected $createdField = 'fecha_alta';
    protected $updatedField = 'fecha_modifica';

    protected $table = 'valoracion_actualizacion';


    public function getValidacion()
    {
        return $this->findAll();
    }

    
}