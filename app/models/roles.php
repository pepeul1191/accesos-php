<?php

class Roles extends Database
{
	public function __construct()
	{
		parent::__construct();
	}

	public function listar()
	{
		return ORM::for_table('permisos')->select('id')->select('nombre')->find_array();
	}
}

?>