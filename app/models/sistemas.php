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

	public function usuario($usuario_id)
	{
		return ORM::for_table('sistemas')->raw_query('
			SELECT T.id AS id, T.nombre AS nombre, (CASE WHEN (P.existe = 1) THEN 1 ELSE 0 END) AS existe FROM
			(
			    SELECT id, nombre, 0 AS existe FROM sistemas
			) T
			LEFT JOIN
			(
			    SELECT S.id, S.nombre, 1 AS existe FROM sistemas S
			    INNER JOIN usuarios_sistemas US ON US.sistema_id = S.id
			    WHERE US.usuario_id = :usuario_id
			) P
        ON T.id = P.id', array('usuario_id' => $usuario_id))->find_array();
	}

	public function asociar_usuario($usuario_id, $sistema_id)
	{
		$usuarios_sistemas = ORM::for_table('usuarios_sistemas')->create();
		$usuarios_sistemas->set('usuario_id', $usuario_id);
		$usuarios_sistemas->set('sistema_id', $sistema_id);
		$usuarios_sistemas->save();
	}

	public function desasociar_usuario($usuario_id, $sistema_id)
	{
		ORM::for_table('usuarios_sistemas')->where_equal(array('usuario_id' =>$usuario_id, 'sistema_id' => $sistema_id))->find_one()->delete();
	}
}

?>