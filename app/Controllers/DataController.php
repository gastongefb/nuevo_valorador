<?php

namespace App\Controllers;

use App\Models\DataModel;
use App\Models\ValoracionPostgradoModel;


class DataController extends BaseController
{
    public function index2()
    {
        $model = new DataModel();
        $data['records'] = $model->findAll(); // Trae todos los registros
        return view('data_view', $data);
    }

    public function update()
    {
        $model = new DataModel();
        $id = $this->request->getPost('id');
        $updatedData = [
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
        ];

        $model->update($id, $updatedData);

        // Retorna los datos actualizados en formato JSON
        return $this->response->setJSON(['status' => 'success', 'data' => $updatedData]);
    }

    public function update2()
    {
        $model = new ValoracionPostgradoModel();
        $id = $this->request->getPost('id');
        $updatedData = [
            'id_valoracion' => $this->request->getPost('id_va'),
            'detalle_valoracion_postgrado' => $this->request->getPost('detalle'),
            'fecha' => $this->request->getPost('fecha'),
            'id_titulo_postgrado' => $this->request->getPost('id_tit'),
        ];

        $model->update($id, $updatedData);

        // Retorna los datos actualizados en formato JSON
        return $this->response->setJSON(['status' => 'success', 'data' => $updatedData]);
    }
}
