<?php

class Controller_Acceso extends Controller
{
    public static function crear($usuario_id) 
    {
        $accesos = Controller::load_model('accesos');
        $accesos->crear($usuario_id);
    }

    public static function listar_accesos($usuario_id)
    {
        $accesos = Controller::load_model('accesos');
        return $accesos->listar_accesos($usuario_id);
    }
}

?>