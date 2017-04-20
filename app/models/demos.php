<?php

class Demos extends Database
{
	public function __construct(){
		parent::__construct();
	}

	public function usuarios(){	
		return ORM::for_table('usuarios')->find_array();
	}
}

?>