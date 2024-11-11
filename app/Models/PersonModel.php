<?php
// app/Models/DynamicInputModel.php

namespace App\Models;

use CodeIgniter\Model;

class PersonModel extends Model
{
    protected $table = 'persons';
    protected $primaryKey = 'id';
    protected $allowedFields = ['dni', 'nombre', 'apellido', 'edad','nuevo_dato','opciones'];
}