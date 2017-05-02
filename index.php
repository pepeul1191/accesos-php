<?php

require 'app/vendor/autoload.php';

header('x-powered-by: PHP');

Configuration::init( realpath(dirname(__FILE__)) . '/app/', 'http://localhost:5001/', realpath(dirname(__FILE__) . '/db/' . 'db_accesos.db'));

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
Flight::route('GET /item/listar_todos', array('Controller_Item','listar_todos'));
Flight::route('GET /item/listar/@subtitulo_id', array('Controller_Item','listar'));
Flight::route('POST /item/guardar', array('Controller_Item','guardar'));
Flight::route('GET /modulo/listar', array('Controller_Modulo','listar'));
Flight::route('POST /modulo/guardar', array('Controller_Modulo','guardar'));
Flight::route('GET /subtitulo/listar/@modulo_id', array('Controller_Subtitulo','listar'));
Flight::route('POST /subtitulo/guardar', array('Controller_Subtitulo','guardar'));
Flight::route('GET /permiso/listar', array('Controller_Permiso','listar'));
Flight::route('GET /permiso/listar_asociados/@rol_id', array('Controller_Permiso','listar_asociados'));
Flight::route('POST /permiso/guardar', array('Controller_Permiso','guardar'));
Flight::route('GET /rol/listar', array('Controller_Rol','listar'));
Flight::route('POST /rol/guardar', array('Controller_Rol','guardar'));
Flight::route('POST /rol/ascociar_permisos', array('Controller_Rol','ascociar_permisos'));
Flight::route('GET /sistema/listar', array('Controller_Sistema','listar'));
Flight::route('POST /sistema/guardar', array('Controller_Sistema','guardar'));
Flight::route('GET /usuario/listar', array('Controller_Usuario','listar'));
Flight::route('GET /usuario/listar_accesos/@usuario_id', array('Controller_Usuario','listar_accesos'));
Flight::route('GET /usuario/listar_permisos/@usuario_id', array('Controller_Usuario','listar_permisos'));
Flight::route('GET /usuario/listar_roles/@usuario_id', array('Controller_Usuario','listar_roles'));
Flight::route('POST /usuario/asociar_permisos', array('Controller_Usuario','asociar_permisos'));
Flight::route('POST /usuario/asociar_roles', array('Controller_Usuario','asociar_roles'));
Flight::route('POST /usuario/validar', array('Controller_Usuario','validar'));
/*
Flight::map('notFound', function(){
	Flight::redirect('/error/404');
});
*/
Flight::start();

?>