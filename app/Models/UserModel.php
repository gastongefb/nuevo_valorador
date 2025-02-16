<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['username', 'password', 'email'];

    // Suponiendo que la tabla 'users' tiene columnas: id, username, password, email.
}