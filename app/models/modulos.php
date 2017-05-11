<?php

class Modulos extends Database
{
	public function __construct(){
		parent::__construct();
	}

	public function crear($nombre, $url, $sistema_id, $icono = '')
	{
		$modulos = ORM::for_table('modulos')->create();
		$modulos->set('nombre', $nombre);
		$modulos->set('url', $url);
		$modulos->set('sistema_id', $sistema_id);
		$modulos->set('icono', $icono);
		$modulos->save();
		
		return $modulos->id(); 
	}

	public function editar($id, $nombre, $url, $icono = '')
	{
		$modulos = ORM::for_table('modulos')->where_equal('id', $id)->find_one();
		$modulos->set('nombre', $nombre);
		$modulos->set('url', $url);
		$modulos->set('icono', $icono);
		$modulos->save();
	}

	public function eliminar($id)
	{
		ORM::for_table('modulos')->where_equal('id', $id)->find_one()->delete();
	}

	public function listar($sistema_id){
		return ORM::for_table('modulos')->select('id')->select('url')->select('nombre')->where('sistema_id', $sistema_id)->find_array();
	}

	public function listar_menu($sistema){
		return ORM::for_table('items')->raw_query('
            SELECT M.url, M.nombre FROM 
            	sistemas S LEFT JOIN modulos M 
            	ON M.sistema_id = S.id 
            	WHERE S.nombre = :sistema', array('sistema' => $sistema))->find_array();
	}
}

?>