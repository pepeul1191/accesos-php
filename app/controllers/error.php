<?php

class Controller_Error extends Controller
{
    public static function error_404()
    {
        Flight::view()->assign('partial', 'error/404.tpl');
        Flight::view()->display('layouts/blank.tpl');
    }
}

?>