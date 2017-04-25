<?php

class Modulos extends Database
{
	public function __construct(){
		parent::__construct();
	}

	public function crear($nombre, $url, $icono = '')
	{
		$modulos = ORM::for_table('modulos')->create();
		$modulos->set('nombre', $nombre);
		$modulos->set('url', $url);
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
		$modulos = ORM::for_table('modulos')->where_equal('id', $id)->find_one()->delete();
	}

	public function listar(){
		return ORM::for_table('modulos')->select('id')->select('url')->select('nombre')->find_array();
	}
}

?>