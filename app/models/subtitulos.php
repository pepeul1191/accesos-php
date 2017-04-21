<?php

class Subtitulos extends Database
{
	public function __construct(){
		parent::__construct();
	}

	public function crear($nombre, $modulo_id)
	{
		$subtitulos = ORM::for_table('subtitulos')->create();
		$subtitulos->set('nombre', $nombre);
		$subtitulos->set('modulo_id', $modulo_id);
		$subtitulos->save();
		
		return $subtitulos->id(); 
	}

	public function editar($id, $nombre, $modulo_id)
	{
		$subtitulos = ORM::for_table('subtitulos')->where_equal('id', $id);
		$subtitulos->set('nombre', $nombre);
		$subtitulos->set('modulo_id', $modulo_id);
		$subtitulos->save();
	}

	public function eliminar($id)
	{
		$subtitulos = ORM::for_table('subtitulos')->where_equal('id', $id);
		$subtitulos->delete();
	}

	public function listar($modulo_id){
		return ORM::for_table('subtitulos')->select('id')->select('nombre')->where('modulo_id', $modulo_id)->find_array();
	}
}

?>