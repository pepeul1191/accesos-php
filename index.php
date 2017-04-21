<?php

require 'app/vendor/autoload.php';

header('x-powered-by: PHP');

Configuration::init( realpath(dirname(__FILE__)) . '/app/', 'http://localhost/accesos/', realpath(dirname(__FILE__) . '/db/' . 'db_accesos.db'));

Flight::register('view', 'Smarty', array(), function($smarty){
    $smarty->template_dir = 'app/templates/';
    $smarty->compile_dir = 'app/templates_c/';
    $smarty->config_dir = 'app/config/';
    $smarty->cache_dir = 'app/cache/';
});

Flight::route('GET /', array('Controller_Index','index'));
Flight::route('GET /error/404', array('Controller_Error','error_404'));

#Flight::route('GET /demo', array('Controller_Demo','hello'));
#Flight::route('POST /demo/params/@id', array('Controller_Demo','parametros'));
Flight::route('GET /demo/db', array('Controller_Demo','listar_usuarios'));
#Flight::route('GET /demo/vista', array('Controller_Demo','vista'));
#Flight::route('GET /demo/partial/@valor', array('Controller_Demo','partial'));


# +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
Flight::route('GET /estado_usuario/listar', array('Controller_Estado_Usuario','listar'));

Flight::route('GET /item/listar/menu/@nombre_modulo', array('Controller_Item','menu'));

Flight::route('GET /modulo/listar', array('Controller_Modulo','listar'));

Flight::route('POST /usuario/validar', array('Controller_Usuario','validar'));

Flight::map('notFound', function(){
	Flight::redirect('/error/404');
});

Flight::start();

?>