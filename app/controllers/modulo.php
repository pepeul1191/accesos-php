<?php

class Controller_Modulo extends Controller
{
    public static function listar()
    {
        $modulos = Controller::load_model('modulos');
        echo json_encode($modulos->listar());
    }
}

?>