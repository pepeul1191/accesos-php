<?php

class Controller_Index extends Controller
{
    public static function index()
    {
        //Flight::view()->assign('valor', $valor);
        Flight::view()->assign('partial', 'index/index.tpl');
        Flight::view()->display('layouts/site.tpl');
    }
}

?>