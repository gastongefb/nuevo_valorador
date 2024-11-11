<?php

namespace App\Controllers;

use App\Models\DocenteModel;

class DocenteController extends BaseController
{
    protected $DocenteModel;

    public function __construct()
    {
        $this->DocenteModel = new DocenteModel();
        $this->session = \Config\Services::session();
    }

    public function index()
    {
        $Docentes = $this->DocenteModel->getDocentes();
       // var_dump($Docentes);
        //exit;
        return view('Docente/DocenteIndex', compact('Docentes'));
    }

    public function create()
    {
        return view('Docente/DocenteCargar');
    }

    public function store()
    {
        $data = $this->request->getPost();
        $mensage=$this->DocenteModel->saveDocente($data);

        return redirect()->route('Docente');
        
    }

    public function show($id)
    {
        $Docente = $this->DocenteModel->getDocente($id);
        return view('Docente/DocenteShow', compact('Docente'));
    }

    public function edit($id)
    {
        $Docente = $this->DocenteModel->getDocente($id);
       return view('Docente/DocenteEdit', compact('Docente'));
    }

    public function update($id)
    {
        $data = $this->request->getPost();
        $this->DocenteModel->updateDocente($id, $data);
       // return redirect()->route('Docente');
    //    return redirect()->to('/Docente')->with('success', 'Docente actualizado correctamente');
        $this->session->setFlashdata('success', 'Docente actualizado correctamente');
    return redirect()->route('Docente');
    }
     


    public function destroy($id)
    {
       // var_dump($id);
        //exit();
        $this->DocenteModel->deleteDocente($id);
        //return redirect()->route('Docente.DocenteIndex');
        return redirect()->route('Docente');
    }
}