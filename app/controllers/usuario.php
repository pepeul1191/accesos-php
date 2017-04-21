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
}

?>