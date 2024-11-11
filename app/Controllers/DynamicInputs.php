<?php
// app/Controllers/DynamicInputs.php

namespace App\Controllers;

use App\Models\Modelv;
use CodeIgniter\Controller;

class DynamicInputs extends Controller
{
    public function index()
    {
        return view('dynamic_inputs');
    }

    public function save_data()
    {
        $model = new Modelv();

        $inputs = $this->request->getPost('dynamic_input');

        foreach ($inputs as $input) {
            $model->insert(['input_value' => $input]);
        }

        return redirect()->to(site_url('dynamicinputs'));
    }

    public function delete_group()
    {
        $groupId = $this->request->getPost('group_id');
        // Código para eliminar el grupo de inputs correspondiente al groupId en la base de datos
        // ...

        return $this->response->setJSON(['success' => true]);
    }
}
