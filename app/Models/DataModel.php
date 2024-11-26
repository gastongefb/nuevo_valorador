<?php

namespace App\Models;

use CodeIgniter\Model;

class DataModel extends Model
{
    protected $table = 'records';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email'];
}
