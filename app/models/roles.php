<?php

class Roles extends Database
{
	public function __construct()
	{
		parent::__construct();
	}

	public function crear($nombre)
	{
		$roles = ORM::for_table('roles')->create();
		$roles->set('nombre', $nombre);
		$roles->save();
		
		return $roles->id(); 
	}

	public function editar($id, $nombre)
	{
		$roles = ORM::for_table('roles')->where_equal('id', $id)->find_one();
		$roles->set('nombre', $nombre);
		$roles->save();
	}

	public function eliminar($id)
	{
		ORM::for_table('roles')->where_equal('id', $id)->find_one()->delete();
	}

	public function listar()
	{
		return ORM::for_table('roles')->select('id')->select('nombre')->find_array();
	}
}

?>