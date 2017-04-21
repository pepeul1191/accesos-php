<?php

class Estado_Usuarios extends Database
{
	public function __construct(){
		parent::__construct();
	}

	public function listar(){
		return ORM::for_table('estado_usuarios')->select('id')->select('nombre')->find_array();
	}
}

?>