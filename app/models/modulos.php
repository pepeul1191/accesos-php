<?php

class Modulos extends Database
{
	public function __construct(){
		parent::__construct();
	}

	public function listar(){
		return ORM::for_table('modulos')->select('id')->select('url')->select('nombre')->find_array();
	}
}

?>