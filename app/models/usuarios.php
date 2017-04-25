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
		return ORM::for_table('items')->raw_query('
            SELECT U.id AS id, U.usuario AS usuario, A.momento AS momento, U.correo AS correo FROM usuarios U INNER JOIN accesos A ON U.id = A.usuario_id GROUP BY U.usuario ORDER BY U.id', array())->find_array();
	}
}

?>