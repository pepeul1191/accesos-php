<?php

class Usuarios extends Database
{
	public function __construct(){
		parent::__construct();
	}

	public function validar($usuario, $contrasenia){
		return count(ORM::for_table('usuarios')->where(array('usuario' => $usuario, 'contrasenia' => $contrasenia))->find_result_set());
	}
}

?>