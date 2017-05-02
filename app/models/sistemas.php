<?php

class Sistemas extends Database
{
	public function __construct(){
		parent::__construct();
	}

	public function crear($nombre, $version, $repositorio)
	{
		$sistemas = ORM::for_table('sistemas')->create();
		$sistemas->set('nombre', $nombre);
		$sistemas->set('version', $version);
		$sistemas->set('repositorio', $repositorio);
		$sistemas->save();
		
		return $sistemas->id(); 
	}

	public function editar($id, $nombre, $version, $repositorio)
	{
		$sistemas = ORM::for_table('sistemas')->where_equal('id', $id)->find_one();
		$sistemas->set('nombre', $nombre);
		$sistemas->set('version', $version);
		$sistemas->set('repositorio', $repositorio);
		$sistemas->save();
	}

	public function eliminar($id)
	{
		ORM::for_table('sistemas')->where_equal('id', $id)->find_one()->delete();
	}

	public function listar(){
		return ORM::for_table('sistemas')->select('id')->select('nombre')->select('version')->select('repositorio')->find_array();
	}
}

?>