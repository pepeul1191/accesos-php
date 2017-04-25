<?php

class Controller_Subtitulo extends Controller
{
	public static function guardar()
	{
		
	}

    public static function listar($modulo_id)
    {
        $subtitulos = Controller::load_model('subtitulos');
        echo json_encode($subtitulos->listar($modulo_id));
    }
}

?>