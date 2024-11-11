<?php

namespace App\Controllers;

use App\Models\Usuarios;
class Home extends BaseController
{
    public function index(): string
    {
        $mensaje =  session('mensaje');
        return view('login',["mensaje"=>$mensaje]);
    }

    public function inicio(){
        return view("inicio");
    }

    public function login(){
        $usuario = $this->request->getPost("usuario");
        $contrasena = $this ->request->getPost("contrasena");
        $Usuario= new Usuarios();
        /* cuando no existe la tabla usuario 
        $data = [
            'usuario'=>'carlos',
          //  'type'  => $datosUsuario[0]["type"]
            ];
            $session = session() ;
            $session->set($data);

return redirect()->to(base_url('/inicio'))->with('mensaje1','1');

        */
        $datosUsuario = $Usuario->obtenerUsuario(['nombre_usuario' =>$usuario]);
        if(count( $datosUsuario) > 0 && $contrasena == $datosUsuario[0]['contrasena'])
            //password_verify($contrasena, $datosUsuario[0]['contrasena']))
         if(count( $datosUsuario) > 0  )
            {
                
                $data = [
                            'usuario'=>$datosUsuario[0]['nombre_usuario'],
                          //  'type'  => $datosUsuario[0]["type"]
                ];
                $session = session() ;
                $session->set($data);
                
                return redirect()->to(base_url('/inicio'))->with('mensaje1','1');
        }else {
             return redirect()->to(base_url('/'))->with('mensaje','0');
        
        }    
    }
        
    //para salir de la sesion
    public function salir(){
        $session = session();
        $session-> destroy();

       return redirect()->to(base_url('/'));
    }
}
