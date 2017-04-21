<?php

class Permisos extends Database
{
	public function __construct()
	{
		parent::__construct();
	}

	public function listar()
	{
		return ORM::for_table('permisos')->select('id')->select('nombre')->select('llave')->find_array();
	}

	public function listar_asociados($rol_id)
	{
		return ORM::for_table('permisos')->raw_query('
            SELECT T.id AS id, T.nombre AS nombre, (CASE WHEN (P.existe = 1) THEN 1 ELSE 0 END) AS existe, T.llave AS llave FROM
        (
            SELECT id, nombre, llave, 0 AS existe FROM permisos
        ) T
        LEFT JOIN
        (
            SELECT P.id, P.nombre,  P.llave, 1 AS existe  FROM permisos P 
            INNER JOIN roles_permisos RP ON P.id = RP.permiso_id
            WHERE RP.rol_id = ?
        ) P
        ON T.id = P.id', array())->find_array();
	}
}

?>