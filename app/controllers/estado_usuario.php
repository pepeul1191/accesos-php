<?php

class Controller_Estado_Usuario extends Controller
{
    public static function listar()
    {
        $estado_usuarios = Controller::load_model('estado_usuarios');
        echo json_encode($estado_usuarios->listar());
    }
}

?>