<?php

class Controller_Usuario extends Controller
{
    public static function validar()
    {
		$usuarios = Controller::load_model('usuarios');
       $usuario = Flight::request()->query['usuario'];
       $contrasenia = Flight::request()->query['contrasenia'];
		$rpta = $usuarios->validar($usuario, $contrasenia);

		if($rpta == 1){

		}

        echo $rpta;
    }

    public static function listar()
    {
       $usuarios = Controller::load_model('usuarios');
        echo json_encode($usuarios->listar()); 
    }

    public static function listar_accesos($usuario_id)
    {
        $accesos_usuarios = Controller_Acceso::listar_accesos($usuario_id);
        echo json_encode($accesos_usuarios); 
    }
}

?>