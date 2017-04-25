<?php

class Items extends Database
{
	public function __construct()
	{
		parent::__construct();
	}

	public function crear($nombre, $url, $subtitulo_id)
	{
		$items = ORM::for_table('items')->create();
		$items->set('subtitulo_id', $subtitulo_id);
		$items->set('nombre', $nombre);
		$items->set('url', $url);
		$items->save();
		
		return $items->id(); 
	}

	public function editar($id, $nombre, $url)
	{
		$items = ORM::for_table('items')->where_equal('id', $id)->find_one();
		$items->set('nombre', $nombre);
		$items->set('url', $url);
		$items->save();
	}

	public function eliminar($id)
	{
		ORM::for_table('items')->where_equal('id', $id)->find_one()->delete();
	}

	public function menu($nombre_modulo)
	{
		return ORM::for_table('items')->raw_query('
            SELECT I.nombre AS item, I.url, S.nombre AS subtitulo FROM items I 
            INNER JOIN subtitulos S ON I.subtitulo_id = S.id
            INNER JOIN modulos M ON S.modulo_id = M.id
            WHERE M.nombre = :nombre', array('nombre' => $nombre_modulo))->find_array();
	}

	public function listar_todos()
	{
		return ORM::for_table('items')->raw_query('
            SELECT M.nombre AS modulo , M.icono AS icono,S.nombre AS subtitulo,
            GROUP_CONCAT(I.nombre || "::" || I.url, "||") AS items
            FROM items I 
            INNER JOIN subtitulos S ON I.subtitulo_id = S.id
            INNER JOIN modulos M ON S.modulo_id = M.id
            GROUP BY subtitulo
            ORDER BY modulo')->find_array();
	}

	public function listar($subtitulo_id)
	{
		return ORM::for_table('items')->select('id')->select('nombre')->select('url')->where('subtitulo_id', $subtitulo_id)->find_array();
	}
}

?>