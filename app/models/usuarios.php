<?php

class Usuarios extends Database
{
	public function __construct(){
		parent::__construct();
	}

	public function validar($usuario, $contrasenia){
		return count(ORM::for_table('usuarios')->where(array('usuario' => $usuario, 'contrasenia' => $contrasenia))->find_result_set());
	}

	public function listar(){
		return ORM::for_table('usuarios')->raw_query('
            SELECT U.id AS id, U.usuario AS usuario, A.momento AS momento, U.correo AS correo FROM usuarios U INNER JOIN accesos A ON U.id = A.usuario_id GROUP BY U.usuario ORDER BY U.id', array())->find_array();
	}

	public function listar_permisos($sistema_id, $usuario_id){
		return ORM::for_table('usuarios')->raw_query('
	        SELECT T.id AS id, T.nombre AS nombre, (CASE WHEN (P.existe = 1) THEN 1 ELSE 0 END) AS existe, T.llave AS llave FROM
	        (
	            SELECT id, nombre, llave, 0 AS existe FROM permisos WHERE sistema_id = :sistema_id
	        ) T
	        LEFT JOIN
	        (
	            SELECT P.id, P.nombre,  P.llave, 1 AS existe  FROM permisos P 
	            INNER JOIN usuarios_permisos UP ON P.id = UP.permiso_id
	            WHERE UP.usuario_id = :usuario_id
	        ) P
	        ON T.id = P.id', array('sistema_id' => $sistema_id, 'usuario_id' => $usuario_id))->find_array();
	}

	public function listar_roles($sistema_id, $usuario_id){
		return ORM::for_table('usuarios')->raw_query('
			SELECT T.id AS id, T.nombre AS nombre, (CASE WHEN (P.existe = 1) THEN 1 ELSE 0 END) AS existe FROM
	        (
	            SELECT id, nombre, 0 AS existe FROM roles WHERE sistema_id = :sistema_id
	        ) T
	        LEFT JOIN
	        (
	            SELECT R.id, R.nombre, 1 AS existe  FROM roles R 
	            INNER JOIN usuarios_roles UR ON R.id = UR.rol_id
	            WHERE UR.usuario_id = :usuario_id
	        ) P
	        ON T.id = P.id', array('sistema_id' => $sistema_id, 'usuario_id' => $usuario_id))->find_array();
	}

	public function asociar_permiso($usuario_id, $permiso_id)
	{
		$usuarios_permisos = ORM::for_table('usuarios_permisos')->create();
		$usuarios_permisos->set('usuario_id', $usuario_id);
		$usuarios_permisos->set('permiso_id', $permiso_id);
		$usuarios_permisos->save();
	}

	public function desasociar_permiso($usuario_id, $permiso_id)
	{
		ORM::for_table('usuarios_permisos')->where_equal(array('usuario_id' =>$usuario_id, 'permiso_id' => $permiso_id))->find_one()->delete();
	}

	public function asociar_rol($usuario_id, $rol_id)
	{
		$usuarios_roles = ORM::for_table('usuarios_roles')->create();
		$usuarios_roles->set('usuario_id', $usuario_id);
		$usuarios_roles->set('rol_id', $rol_id);
		$usuarios_roles->save();
	}

	public function desasociar_rol($usuario_id, $rol_id)
	{
		ORM::for_table('usuarios_roles')->where_equal(array('usuario_id' =>$usuario_id, 'rol_id' => $rol_id))->find_one()->delete();
	}

	public function validar_usuario_repetido($usuario)
	{
		return count(ORM::for_table('usuarios')->where(array('usuario' => $usuario))->find_result_set());
	}

	public function validar_usuario_repetido_editado($usuario_id, $usuario)
	{
		return count(ORM::for_table('usuarios')->where(array('id' => $usuario_id,'usuario' => $usuario))->find_result_set());
	}

	public function validar_correo_repetido($correo)
	{
		return count(ORM::for_table('usuarios')->where(array('correo' => $correo))->find_result_set());
	}

	public function validar_correo_repetido_editado($usuario_id, $correo)
	{
		return count(ORM::for_table('usuarios')->where(array('id' => $usuario_id,'correo' => $correo))->find_result_set());
	}
}

?>