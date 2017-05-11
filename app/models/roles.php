<?php

class Roles extends Database
{
	public function __construct()
	{
		parent::__construct();
	}

	public function crear($nombre, $sistema_id)
	{
		$roles = ORM::for_table('roles')->create();
		$roles->set('nombre', $nombre);
		$roles->set('sistema_id', $sistema_id);
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

	public function listar($sistema_id)
	{
		return ORM::for_table('roles')->select('id')->select('nombre')->where('sistema_id', $sistema_id)->find_array();
	}

	public function asociar_permiso($rol_id, $permiso_id)
	{
		$roles_permisos = ORM::for_table('roles_permisos')->create();
		$roles_permisos->set('rol_id', $rol_id);
		$roles_permisos->set('permiso_id', $permiso_id);
		$roles_permisos->save();
	}

	public function desasociar_permiso($rol_id, $permiso_id)
	{
		ORM::for_table('roles_permisos')->where_equal(array('rol_id' =>$rol_id, 'permiso_id' => $permiso_id))->find_one()->delete();
	}
}

?>