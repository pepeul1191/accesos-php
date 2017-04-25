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

	public function editar($id, $nombre)
	{
		$subtitulos = ORM::for_table('subtitulos')->where_equal('id', $id)->find_one();
		$subtitulos->set('nombre', $nombre);
		$subtitulos->save();
	}

	public function eliminar($id)
	{
		ORM::for_table('subtitulos')->where_equal('id', $id)->find_one()->delete();
	}

	public function listar($modulo_id){
		return ORM::for_table('subtitulos')->select('id')->select('nombre')->where('modulo_id', $modulo_id)->find_array();
	}
}

?>