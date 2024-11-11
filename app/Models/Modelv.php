<?php
// app/Models/DynamicInputModel.php

namespace App\Models;

use CodeIgniter\Model;

class Modelv extends Model
{
    protected $table      = 'dynamic_inputs_table';
    protected $primaryKey = 'id';
    protected $allowedFields = ['input_value'];
}
