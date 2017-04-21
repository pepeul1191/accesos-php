<?php

class Controller_Permiso extends Controller
{
	public static function guardar()
	{
		
	}

    public static function listar()
    {
    	$permisos = Controller::load_model('permisos');
		echo json_encode($permisos->listar());
    }

    public static function listar_asociados($rol_id)
    {
    		$permisos = Controller::load_model('permisos');
        	echo json_encode($permisos->listar_asociados($rol_id));
    }
}

?>