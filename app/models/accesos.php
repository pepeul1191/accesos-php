<?php

class Accesos extends Database
{
	public function __construct()
	{
		parent::__construct();
	}

	public function crear($usuario_id)
	{
		$accesos = ORM::for_table('accesos')->create();
		$accesos->set('usuario_id', $usuario_id);
		$accesos->set('monento', 'DATETIME("now","localtime")');
		$accesos->save();
	}

	public function listar_accesos($usuario_id)
	{
		return ORM::for_table('accesos')->select('id')->select('momento')->where('usuario_id', $usuario_id)->find_array();
	}
}

?>