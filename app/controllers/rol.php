<?php

class Controller_Rol extends Controller
{
	public static function guardar()
	{
		
	}

	public static function listar()
    {
    	$roles = Controller::load_model('roles');
		echo json_encode($roles->listar());
    }
}

?>