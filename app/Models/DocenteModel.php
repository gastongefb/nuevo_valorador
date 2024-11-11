<?php

namespace App\Models;

use CodeIgniter\Model;

class DocenteModel extends Model
{
    protected $table = 'docente';
   // protected $allowedFields = ['name', 'surname', 'dni', 'email', 'state', 'username', 'password'];
    protected $allowedFields = ['nombre', 'apellido', 'dni', 'mail', 'estado', 'usuario', 'clave'];
   
    protected $primaryKey = 'id';

    protected $validationRules = [
       // 'nombre' => 'required|alpha_space|min_length[3]|max_length[200]',
       // 'apellido' => 'required|alpha_space|min_length[3]|max_length[200]',
      //  'dni' => 'required|exact_length[8]|is_unique[docente.dni,id,{id}]',
       // 'dni' => 'required|is_unique[docente.dni,id,{id}]',
      //  'mail' => 'required|max_length[254]|valid_email|is_unique[docente.mail,id,{id}]',
      //  'estado' => 'required|in_list[active,inactive]',
      //  'usuario' => 'required|alpha_numeric_space|min_length[3]|max_length[50]|is_unique[docente.usuario,id,{id}]',
       // 'clave' => 'required|min_length[8]|max_length[255]',
    ];

    protected $validationMessages = [
        'dni' => [
            'is_unique' => 'Este DNI ya existe en el sistema.',
        ],
        'mail' => [
            'is_unique' => ' Este email ya existe en el sistema.',
        ],
        'usuario' => [
            'is_unique' => 'Este usuario ya existe en el sistema.',
        ],
    ];

    public function getDocente($id_docente)
    {
        return $this->find($id_docente);
    }

    public function getDocentes()
    {
        return $this->findAll();
    }

    public function saveDocente(array $data)
    {
        $data = $this->hashPassword($data);

       // var_dump($data);
        //exit();
        return $this->save($data);
    }

    public function updateDocente($id,$data)
    {
       // $data = $this->hashPassword($data);
       //var_dump($data);
      // var_dump($id);
       // exit();
        //unset($data['id']);
        return $this->update($id,$data);
       
    }

    protected function hashPassword(array $data)
    {
        if (! isset($data['clave'])) {
            return $data;
        }
        
        $data['clave'] = password_hash($data['clave'], PASSWORD_DEFAULT);
       // unset($data['clave']);
        
        return $data;
    }
    public function deleteDocente($id_docente)
    {
       //  var_dump($id_docente);
        //exit();
        return $this->delete($id_docente);
    }

    public function getDatosDocentes($dni)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('dni', $dni);
        $query = $builder->get();
 
        return $query->getResultArray(); // Devuelve los resultados como un array asociativo
    }

    public function getDni($codigo)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->where('id', $codigo);
        $query = $builder->get();
 
        return $query->getResultArray(); // Devuelve los resultados como un array asociativo
    }

}