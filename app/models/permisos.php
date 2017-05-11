<?php

class Permisos extends Database
{
	public function __construct()
	{
		parent::__construct();
	}

	public function crear($sistema_id, $nombre, $llave)
	{
		$permisos = ORM::for_table('permisos')->create();
		$permisos->set('nombre', $nombre);
		$permisos->set('llave', $llave);
		$permisos->set('sistema_id', $sistema_id);
		$permisos->save();
		
		return $permisos->id(); 
	}

	public function editar($id, $nombre, $llave)
	{
		$permisos = ORM::for_table('permisos')->where_equal('id', $id)->find_one();
		$permisos->set('nombre', $nombre);
		$permisos->set('llave', $llave);
		$permisos->save();
	}

	public function eliminar($id)
	{
		ORM::for_table('permisos')->where_equal('id', $id)->find_one()->delete();
	}

	public function listar($sistema_id)
	{
		return ORM::for_table('permisos')->select('id')->select('nombre')->select('llave')->where('sistema_id', $sistema_id)->find_array();
	}

	public function listar_asociados($sistema_id, $rol_id)
	{
		return ORM::for_table('permisos')->raw_query('
            SELECT T.id AS id, T.nombre AS nombre, (CASE WHEN (P.existe = 1) THEN 1 ELSE 0 END) AS existe, T.llave AS llave FROM
        (
            SELECT id, nombre, llave, 0 AS existe FROM permisos WHERE sistema_id = :sistema_id
        ) T
        LEFT JOIN
        (
            SELECT P.id, P.nombre,  P.llave, 1 AS existe  FROM permisos P 
            INNER JOIN roles_permisos RP ON P.id = RP.permiso_id
            WHERE RP.rol_id = :rol_id
        ) P
        ON T.id = P.id', array('rol_id' => $rol_id, 'sistema_id' => $sistema_id))->find_array();
	}
}

?>