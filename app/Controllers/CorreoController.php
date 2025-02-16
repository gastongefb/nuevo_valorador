<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\DocenteModel;
use CodeIgniter\Email\Email;

class CorreoController extends Controller
{
    public function index()
    {
        $model = new DocenteModel();
        $data['docentes'] = $model->findAll();
        return view('enviar', $data);
    }

    public function enviarCorreo()
    {
        $email = \Config\Services::email();

        // Obtiene los datos del formulario
        $docenteEmail = $this->request->getPost('mail');
        $asunto = $this->request->getPost('asunto');
        $mensaje = $this->request->getPost('mensaje');

        
        // Configuración del email
        $email->setFrom('valoracionisft@gmail.com', 'ISFT');
        $email->setTo($docenteEmail);
        $email->setSubject($asunto);
        $email->setMessage($mensaje);

       
        
        if ($email->send()) {
            return redirect()->to('/correo')->with('success', 'Correo enviado correctamente.');
        } else {
            return redirect()->to('/correo')->with('error', 'Error al enviar el correo.');
        }
        
    }
}
